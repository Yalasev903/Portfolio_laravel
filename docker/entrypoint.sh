#!/bin/bash

cd /var/www

# Копируем .env, если отсутствует
[ ! -f .env ] && cp .env.example .env

# Генерация APP_KEY, если не задан
if ! grep -q "^APP_KEY=" .env || [ -z "$(grep ^APP_KEY= .env | cut -d '=' -f2)" ]; then
    php artisan key:generate
fi

# Очистка и кеш
php artisan config:clear || true
php artisan cache:clear || true

# ВАЖНО: миграции с флагом --force
php artisan migrate --force || true

# Конфигурация кеш
php artisan config:cache || true

# Запуск php-fpm
php-fpm --nodaemonize --fpm-config /usr/local/etc/php-fpm.conf
