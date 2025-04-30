# Используем PHP-образ с нужными расширениями
FROM php:8.2-fpm

# Установка зависимостей PHP и системных пакетов
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    npm \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip gd

# Установка Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Установка рабочей директории
WORKDIR /var/www

# Копируем всё
COPY . .

# Установка зависимостей Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Установка фронтенда
RUN npm install && npm run build

# Открываем порт
ENV PORT=8000
EXPOSE ${PORT}

# Запуск Laravel с генерацией ключа, сессиями, миграцией и запуском сервера
CMD php artisan key:generate --force && \
    php artisan session:table && \
    php artisan migrate --force && \
    php artisan config:cache && \
    php artisan serve --host=0.0.0.0 --port=${PORT}
