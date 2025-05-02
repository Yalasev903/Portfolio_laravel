#!/bin/bash

cd /var/www

# Копируем .env, если отсутствует
[ ! -f .env ] && cp .env.example .env

# Генерируем APP_KEY, если не установлен
if ! grep -q "APP_KEY=base64" .env; then
    php artisan key:generate --force
fi

# Выполняем миграции и кешируем конфиг
php artisan migrate --force || true
php artisan config:cache || true

# Запускаем php-fpm и nginx
php-fpm --nodaemonize --fpm-config /usr/local/etc/php-fpm.conf &
nginx -g "daemon off;"
