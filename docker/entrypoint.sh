#!/bin/bash

cd /var/www

# Копируем .env, если отсутствует
[ ! -f .env ] && cp .env.example .env

# Генерируем APP_KEY, если не установлен
if ! grep -q "^APP_KEY=" .env || [ -z "$(grep ^APP_KEY= .env | cut -d '=' -f2)" ]; then
    php artisan key:generate
fi

# Миграции и кеш
php artisan migrate --force || true
php artisan config:cache || true

# Старт php-fpm
php-fpm --nodaemonize --fpm-config /usr/local/etc/php-fpm.conf
