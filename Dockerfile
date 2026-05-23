FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    sqlite3 libsqlite3-dev nodejs npm netcat-openbsd \
    && rm -rf /var/lib/apt/lists/*

RUN groupmod -o -g 1000 www-data \
    && usermod -o -u 1000 -g 1000 www-data

RUN docker-php-ext-install \
    pdo pdo_mysql pdo_sqlite \
    mbstring exif pcntl bcmath zip

COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist --no-scripts

COPY package.json package-lock.json ./
RUN npm install --legacy-peer-deps

COPY . .

RUN npm run build

RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 9000

COPY entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]
