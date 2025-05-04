#!/bin/bash

echo "⏳ Waiting for DB..."
sleep 5

echo "📦 Running migrations and seeders..."
php artisan migrate --force
php artisan db:seed --force

echo "🚀 Starting Supervisor (nginx + php-fpm)..."
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
