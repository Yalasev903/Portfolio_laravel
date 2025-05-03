FROM php:8.2-fpm

# Установка зависимостей системы
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev libzip-dev zip unzip git curl npm sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip gd

# Установка Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /var/www

# Копируем Laravel проект
COPY . .

# Установка PHP-зависимостей Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Установка Node зависимостей и сборка
RUN npm install && npm run build

# Railway требует указать порт
ENV PORT=80
EXPOSE ${PORT}

# Запуск Laravel
CMD bash -c '\
    if [ ! -f .env ]; then cp .env.example .env; fi && \
    if ! grep -q "^APP_KEY=" .env || [ -z "$(grep ^APP_KEY= .env | cut -d "=" -f2)" ]; then \
        php artisan key:generate; \
    fi && \
    php artisan config:clear && \
    php artisan cache:clear && \
    php artisan migrate --force || true && \
    php artisan config:cache && \
    php-fpm --nodaemonize --fpm-config /usr/local/etc/php-fpm.conf'
