#!/usr/bin/env bash
# ============================================================================
# Mandate Engineering — Bare-Metal WordPress Deploy Script
#
# Assumes an Ubuntu/Debian server with a sudo user. Installs LAMP
# (Apache + MariaDB + PHP), downloads WordPress core, restores your
# wp-content + database, and configures the site.
#
# Usage:
#   1. Clone this repo on the server.
#   2. Edit wp-config.php with your DB credentials and domain.
#   3. sudo bash deploy.sh
# ============================================================================
set -euo pipefail

# --- Config ----------------------------------------------------------------
WP_VERSION="7.0.4"
WP_DIR="/var/www/mandateengineering.com"
WEB_USER="www-data"
DB_NAME="wordpress"
DB_USER="wordpress"
# Default from docker-compose; override via env: DB_PASSWORD=xxx bash deploy.sh
DB_PASSWORD="${DB_PASSWORD:-wordpress_password}"
DB_ROOT_PASSWORD="${DB_ROOT_PASSWORD:-root_password}"

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
REPO_DIR="${SCRIPT_DIR}"

if [[ $EUID -ne 0 ]]; then
    echo "Please run as root: sudo bash $0" >&2
    exit 1
fi

echo "==> Updating apt and installing LAMP stack..."
export DEBIAN_FRONTEND=noninteractive
apt-get update -y
apt-get install -y apache2 mariadb-server php php-mysql \
    php-gd php-curl php-zip php-xml php-mbstring php-intl libapache2-mod-php \
    curl unzip wget

echo "==> Creating web root..."
mkdir -p "${WP_DIR}"
chown -R "${WEB_USER}:${WEB_USER}" "${WP_DIR}"

echo "==> Downloading WordPress core ${WP_VERSION}..."
cd /tmp
if [[ ! -f "wordpress-${WP_VERSION}.tar.gz" ]]; then
    wget -q "https://wordpress.org/wordpress-${WP_VERSION}.tar.gz"
fi
tar -xzf "wordpress-${WP_VERSION}.tar.gz"
cp -r wordpress/. "${WP_DIR}/"

echo "==> Copying your wp-content (themes, plugins, uploads)..."
cp -r "${REPO_DIR}/wp-content/." "${WP_DIR}/wp-content/"

echo "==> Copying wp-config.php..."
cp "${REPO_DIR}/wp-config.php" "${WP_DIR}/wp-config.php"
chown "${WEB_USER}:${WEB_USER}" "${WP_DIR}/wp-config.php"

echo "==> Copying .htaccess..."
cp "${REPO_DIR}/.htaccess" "${WP_DIR}/.htaccess"

echo "==> Starting MariaDB and importing database..."
systemctl enable mariadb apache2 >/dev/null 2>&1 || true
systemctl start mariadb >/dev/null 2>&1 || true

# Create DB + user if they don't already exist.
mariadb -u root <<SQL
CREATE DATABASE IF NOT EXISTS \`${DB_NAME}\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS '${DB_USER}'@'localhost' IDENTIFIED BY '${DB_PASSWORD}';
GRANT ALL PRIVILEGES ON \`${DB_NAME}\`.* TO '${DB_USER}'@'localhost';
FLUSH PRIVILEGES;
SQL

# Restore the dump. The dump contains the same database name.
mariadb -u root "${DB_NAME}" < "${REPO_DIR}/wordpress.sql"
echo "==> Database imported."

echo "==> Configuring Apache vhost..."
cat > /etc/apache2/sites-available/mandateengineering.com.conf <<APACHE
<VirtualHost *:80>
    ServerName mandateengineering.com
    ServerAlias www.mandateengineering.com
    DocumentRoot ${WP_DIR}

    <Directory ${WP_DIR}>
        AllowOverride All
        Require all granted
    </Directory>

    <IfModule mod_rewrite.c>
        RewriteEngine On
    </IfModule>

    ErrorLog \${APACHE_LOG_DIR}/mandateengineering-error.log
    CustomLog \${APACHE_LOG_DIR}/mandateengineering-access.log combined
</VirtualHost>
APACHE

a2enmod rewrite >/dev/null 2>&1 || true
a2dissite 000-default >/dev/null 2>&1 || true
a2ensite mandateengineering.com >/dev/null 2>&1 || true
systemctl reload apache2

echo "==> Setting file permissions..."
find "${WP_DIR}" -type d -exec chmod 755 {} \;
find "${WP_DIR}" -type f -exec chmod 644 {} \;

echo ""
echo "=== DEPLOY COMPLETE ==="
echo "Web root:    ${WP_DIR}"
echo "Site URL:    http://mandateengineering.com  (edit WP_HOME/WP_SITEURL in wp-config.php if different)"
echo "DB name:     ${DB_NAME}"
echo "DB user:     ${DB_USER}"
echo "Next steps:"
echo "  1. Point your domain DNS A record at this server's IP."
echo "  2. If using a different domain, update WP_HOME/WP_SITEURL in ${WP_DIR}/wp-config.php"
echo "     (also consider updating wp_options siteurl/home via SQL)."
echo "  3. Log in at /wp-admin with your existing credentials."
