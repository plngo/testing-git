#!/usr/bin/env bash
# shellcheck disable=SC2046
export $(cat /opt/elasticbeanstalk/deployment/custom_env_var | xargs -0 )
