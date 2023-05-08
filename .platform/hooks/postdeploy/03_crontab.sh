#!/usr/bin/env bash

# Crontab list
read -r -d '' CRONS <<'EOF'
*/1 * * * * cd /var/app/current/ && bash -c 'source .platform/load-env-vars.sh && php artisan schedule:run >> storage/logs/cron.log 2>&1'
EOF
echo '///////////////////////////// deploy crontab ////////////////////////////'

# Make sure webapp home is defined
sudo mkdir -p /home/webapp
sudo chown -R webapp:webapp /home/webapp

# Update crontab list
sudo -u webapp bash -c "echo \"${CRONS}\" | crontab"
