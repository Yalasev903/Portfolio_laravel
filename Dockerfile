FROM php:8.2-fpm

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    sqlite3 libsqlite3-dev nginx npm nodejs supervisor

# Устанавливаем PHP-расширения
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip

# Копируем Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /var/www

# Копируем проект
COPY . .

# Composer и Vite
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN npm install --legacy-peer-deps && npm run build

# Копируем nginx конфиг
COPY nginx.conf /etc/nginx/nginx.conf

# Копируем supervisor конфиг
COPY supervisor.conf /etc/supervisor/conf.d/supervisord.conf

# Права и ключ
RUN cp .env.example .env || true
RUN php artisan key:generate --force
RUN php artisan config:clear && php artisan config:cache
RUN chmod -R 775 storage bootstrap/cache && chown -R www-data:www-data storage bootstrap/cache

# Открываем порт
EXPOSE 8080

# Копируем энтрипоинт
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
