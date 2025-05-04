#!/bin/bash

echo "⏳ Waiting for DB on $DB_HOST:$DB_PORT..."

for i in {1..30}; do
    nc -z -v -w1 $DB_HOST $DB_PORT && break
    echo "Waiting... ($i)"
    sleep 1
done

echo "📦 Running migrations..."
php artisan migrate --force

echo "🌱 Seeding..."
php artisan db:seed --force

echo "🚀 Starting Laravel (php-fpm + nginx)..."
php-fpm &
nginx -g "daemon off;"
