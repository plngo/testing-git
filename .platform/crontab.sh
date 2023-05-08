#!/usr/bin/env bash

# Crontab list

read -r -d '' CRONS <<'EOF'
* * * * * cd /var/app/current/ && bash -c 'sudo source .platform/load-env-vars.sh && sudo php artisan schedule:run > /var/app/current/storage/logs/scheduler.log 2>&1'
EOF


# Make sure webapp home is defined
sudo mkdir -p /home/webapp
sudo chown -R webapp:webapp /home/webapp

# Update crontab list
bash -c "echo \"${CRONS}\" | crontab"
