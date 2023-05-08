#!/usr/bin/env bash
if [ ! -f /usr/bin/supervisord ]; then
  echo "installing supervisor"
  sudo amazon-linux-extras install -y epel
  sudo yum install -y supervisor
  sudo systemctl enable supervisord
  sudo systemctl start supervisord
else
  echo "supervisor already installed"
fi

sudo supervisorctl update all
