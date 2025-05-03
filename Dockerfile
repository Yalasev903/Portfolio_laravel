FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev sqlite3 libsqlite3-dev npm nodejs

RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip

COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN npm install && npm run build

# Подставим .env, если отсутствует
RUN [ ! -f .env ] && cp .env.example .env || true

RUN php artisan config:clear && php artisan key:generate --force

ENV PORT=8000
EXPOSE ${PORT}

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT}
