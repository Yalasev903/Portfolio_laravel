FROM php:8.2-cli

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    sqlite3 libsqlite3-dev npm nodejs

# Устанавливаем PHP-расширения
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip

# Копируем Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /var/www

# Копируем проект
COPY . .

# Устанавливаем зависимости PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Устанавливаем зависимости для NPM и собираем ассеты (для Bootstrap, Vue и т.п.)
RUN npm install --legacy-peer-deps && npm run build

# Создаём .env, если отсутствует
RUN cp .env.example .env || true

# Генерируем ключ и чистим кэш
RUN php artisan key:generate --force && php artisan config:clear && php artisan config:cache

# Устанавливаем права на storage и bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache && chmod -R 775 storage bootstrap/cache

# Копируем entrypoint
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Открываем порт
ENV PORT=8080
EXPOSE 8080

# Запуск
ENTRYPOINT ["/entrypoint.sh"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
