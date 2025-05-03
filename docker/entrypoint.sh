#!/bin/bash

cd /var/www

# Копируем .env, если отсутствует
[ ! -f .env ] && cp .env.example .env

# Генерация ключа, если пустой
if ! grep -q "^APP_KEY=" .env || [ -z "$(grep ^APP_KEY= .env | cut -d '=' -f2)" ]; then
    php artisan key:generate
fi

# Удалим предыдущие кэши
php artisan config:clear || true
php artisan cache:clear || true

# Применим миграции с флагом --force
php artisan migrate --force || true

# Кэшируем конфигурацию
php artisan config:cache || true

# Запускаем php-fpm
php-fpm --nodaemonize --fpm-config /usr/local/etc/php-fpm.conf
