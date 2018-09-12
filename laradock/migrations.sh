#!/bin/bash
set -eu -o pipefail

# From env
# DB_1_NAME
# DB_2_NAME
# MYSQL_HOST
# MYSQL_PASSWORD

echo "CREATE DATABASE IF NOT EXISTS chat;" | mysql -h 'localhost' -p'root'

# optionally you can run your migrations here too
cd /var/www/laravel-chat
php artisan migrate
composer install
npm install
