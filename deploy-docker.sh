#!/usr/bin/env bash
# ============================================================================
# Mandate Engineering — Docker Deploy Script (run ON THE SERVER)
#
# Usage:
#   bash deploy-docker.sh [PUBLIC_IP]
#   e.g. bash deploy-docker.sh 203.0.113.10
#   If no IP is given, it tries to auto-detect via ifconfig.me.
# ============================================================================
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "${SCRIPT_DIR}"

IP="${1:-}"
if [[ -z "${IP}" ]]; then
    echo "==> Detecting public IP..."
    IP="$(curl -s4 ifconfig.me || curl -s4 ifconfig.co || true)"
fi
if [[ -z "${IP}" ]]; then
    echo "ERROR: could not detect public IP. Pass it as an argument:" >&2
    echo "  bash deploy-docker.sh <YOUR_PUBLIC_IP>" >&2
    exit 1
fi
echo "==> Using site URL: http://${IP}"

# Write .env used by docker-compose.server.yml
cat > .env <<EOF
SERVER_IP=${IP}
EOF

echo "==> Freeing port 80 (stopping any competing web server / container)..."
systemctl stop apache2 2>/dev/null || true
pkill -9 apache2 2>/dev/null || true
pkill -9 docker-proxy 2>/dev/null || true
sleep 1

echo "==> Removing old containers on this compose file..."
docker compose -f docker-compose.server.yml down -v 2>/dev/null || true

echo "==> Starting stack (first start imports wordpress.sql)..."
docker compose -f docker-compose.server.yml up -d

echo "==> Waiting for MariaDB to accept the DB import..."
for i in $(seq 1 30); do
    if docker exec mandate-db mariadb -uwordpress -pwordpress_password -e "SELECT 1" wordpress >/dev/null 2>&1; then
        break
    fi
    sleep 2
done

echo "==> Ensuring siteurl/home point to http://${IP}..."
docker exec mandate-db mariadb -uwordpress -pwordpress_password wordpress -e \
    "UPDATE wp_options SET option_value='http://${IP}' WHERE option_name IN ('siteurl','home');" \
    || true

echo "==> Verifying..."
sleep 5
docker compose -f docker-compose.server.yml ps

echo ""
echo "=== DEPLOY COMPLETE ==="
echo "Site: http://${IP}"
echo "Admin: http://${IP}/wp-admin  (use your existing local credentials)"
echo "Logs: docker compose -f docker-compose.server.yml logs -f"
