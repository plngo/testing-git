#!/usr/bin/env bash

# will be executed in the document root as webapp user
#cd /var/app/current
#source .platform/load-env-vars.sh
# php artisan migrate:refresh --seed --force > storage/logs/artisan-migrate.log
# php artisan migrate  --force > storage/logs/artisan-migrate.log
#php artisan migrate --force > storage/logs/artisan-migrate.log

# Update seeders line by line
# php artisan db:seed --class=RoutesPermissionsSeeder --force > storage/logs/artisan-seeders.log
# php artisan db:seed --class=InsuranceCompaniesPermissionsSeeder --force > storage/logs/artisan-seeders.log
# php artisan db:seed --class=CancellationReasonPermissionsSeeder --force > storage/logs/artisan-seeders.log
# php artisan db:seed --class=ViaPermissionsSeeder --force > storage/logs/artisan-seeders.log
# php artisan db:seed --class=ClearanceFeesPermissionsSeeder --force > storage/logs/artisan-seeders.log
# php artisan db:seed --class=CancellationFeesPermissionsSeeder --force > storage/logs/artisan-seeders.log
# php artisan db:seed --class=ParentCategorySeeder --force > storage/logs/artisan-seeders.log
# php artisan db:seed --class=SectionSeeder --force > storage/logs/artisan-seeders.log
# php artisan db:seed --class=KitchenSeeder --force > storage/logs/artisan-seeders.log
# php artisan db:seed --class=KitchenApiSetting --force > storage/logs/artisan-seeders.log
# Custom Commands

# php artisan update:kitchen_id  > storage/logs/artisan-command.log
# php artisan update:kitchen_name  > storage/logs/artisan-command.log
# php artisan update:start_end_work_time  > storage/logs/artisan-command.log

# php artisan update:kitchen_id  > storage/logs/artisan-command.log
# php artisan update:kitchen_name  > storage/logs/artisan-command.log
# php artisan update:start_end_work_time  > storage/logs/artisan-command.log

#Version = 1.7

# if [ prodVersion ==  1.7 ]
# then
 # Update seeders line by line
 # php artisan db:seed --class=KitchenSeeder --force > storage/logs/artisan-seeders.log

 # Custom Commands
 # php artisan update:kitchen_id  > storage/logs/artisan-command.log
#  php artisan check:mobile  > storage/logs/artisan-command.log
#  php artisan points:update  > storage/logs/artisan-command.log
# fi

sudo sysctl -p
sudo systemctl restart php-fpm.service
