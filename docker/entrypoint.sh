#!/bin/bash

# Копируем .env, если он отсутствует
[ ! -f .env ] && cp .env.example .env

# Показываем APP_KEY (но не перезаписываем)
php artisan key:generate --show

# Выполняем миграции и кешируем конфиг
php artisan migrate --force
php artisan config:cache

# Запускаем php-fpm и nginx
php-fpm -F
nginx -g "daemon off;"
