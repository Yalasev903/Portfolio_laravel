#!/bin/bash

# Копируем .env если не существует
[ ! -f .env ] && cp .env.example .env

# Генерация ключа приложения
php artisan key:generate --force

# Миграции
php artisan migrate --force

# Кеширование конфигов
php artisan config:cache

# Запуск php-fpm и nginx
php-fpm -D
nginx -g "daemon off;"
