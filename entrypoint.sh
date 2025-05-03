#!/bin/bash

# Подождать БД (можно использовать sleep 5 для Railway)
echo "⏳ Waiting for DB..."
sleep 5

# Выполнить миграции
echo "📦 Running migrations..."
php artisan migrate --force

# ✅ Запуск сидеров
php artisan db:seed --force

# Запустить Laravel
echo "🚀 Starting Laravel server..."
exec "$@"
