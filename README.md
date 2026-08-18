# Mandate Engineering — WordPress Site Package

Complete deployable WordPress site for the Mandate Engineering corporate website.

## What's inside

| Item | Purpose |
|------|---------|
| `wp-content/` | All themes (incl. `mandate-engineering`), plugins, and uploads |
| `wordpress.sql` | Full database dump (MariaDB) |
| `wp-config.php` | WordPress config template for bare metal (edit credentials) |
| `.htaccess` | Apache rewrite rules |
| `deploy.sh` | One-shot bare-metal (LAMP) deployment script |
| `docker-compose.yml` | Original Docker Compose stack for reference |

## Prerequisites on the server

- Ubuntu/Debian server (or any LAMP-compatible distro)
- `sudo` root access
- Git, or simply `scp` this folder up

## Quick start (bare metal, no Docker)

```bash
# On the server
git clone <this-repo-url> mandate-engineering
cd mandate-engineering

# 1. Edit the database credentials + domain in wp-config.php
nano wp-config.php

# 2. Run the deployment script
sudo DB_PASSWORD='your-db-password' bash deploy.sh
```

That installs Apache + MariaDB + PHP, downloads WordPress core 7.0.4, copies
your theme/plugins/uploads, imports `wordpress.sql`, and creates the vhost.

## Manual install (alternative)

1. Install a LAMP stack (Apache, MariaDB, PHP 8.x) on the server.
2. Download WordPress core:
   ```bash
   wget https://wordpress.org/latest.tar.gz && tar -xzf latest.tar.gz
   ```
3. Copy this repo's `wp-content/` into `wordpress/wp-content/`.
4. Copy `wp-config.php` into the WordPress root and set your DB credentials
   and domain (`WP_HOME` / `WP_SITEURL`).
5. Copy `.htaccess` into the WordPress root.
6. Create the database and import the dump:
   ```bash
   mysql -u root -p -e "CREATE DATABASE wordpress CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
   mysql -u root -p wordpress < wordpress.sql
   ```
7. Point Apache at the WordPress folder with `AllowOverride All`.

## If your domain differs from `mandateengineering.com`

The dump stores the site URL in `wp_options` (`siteurl` and `home`). After
importing, run:

```bash
mysql -u root -p wordpress -e "
UPDATE wp_options SET option_value='http://your-domain.com' WHERE option_name IN ('siteurl','home');"
```

Then also update `WP_HOME` / `WP_SITEURL` in `wp-config.php`.

## Original Docker setup (for reference)

The original local environment uses Docker Compose (`docker-compose.yml`)
with MariaDB + WordPress. The theme is bind-mounted from the local folder.
This package was exported from that stack (DB dump + wp-content) so the
site can move to a server without Docker.
