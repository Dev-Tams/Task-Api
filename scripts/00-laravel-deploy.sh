#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Caching config/routes..."
php artisan optimize

echo "Running migrations..."
php artisan migrate --force

