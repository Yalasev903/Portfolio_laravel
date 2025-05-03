# Используем PHP с FPM
FROM php:8.2-fpm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev \
    libzip-dev zip unzip git curl npm sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip gd

# Установка Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /var/www

# Копируем проект
COPY . .

# Устанавливаем PHP и JS зависимости
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN npm install && npm run build

# Генерация .env и ключа
RUN cp .env.example .env || true
RUN php artisan config:clear && php artisan key:generate --force

# Пробрасываем порт (Railway сам подставит)
EXPOSE 9000

# Laravel работает через php-fpm — запускаем его
CMD ["php-fpm"]
