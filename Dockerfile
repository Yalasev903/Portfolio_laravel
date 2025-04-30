FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev libzip-dev zip unzip git curl npm sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip gd

COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# Копируем .env.example как .env для artisan
RUN cp .env.example .env

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN npm install && npm run build

ENV PORT=8000
EXPOSE ${PORT}

CMD php artisan key:generate --force && \
    php artisan migrate --force && \
    php artisan config:cache && \
    php artisan serve --host=0.0.0.0 --port=${PORT}
