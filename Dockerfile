FROM php:8.2-fpm

# Установка необходимых расширений PHP и системных пакетов
RUN apt-get update && apt-get install -y \
    nginx \
    libpng-dev libonig-dev libxml2-dev libzip-dev \
    zip unzip git curl npm sqlite3 libsqlite3-dev \
    supervisor \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip gd

# Установка Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Копируем проект
WORKDIR /var/www
COPY . .

# Копируем .env
RUN cp .env.example .env

# Установка зависимостей
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN npm install && npm run build

# Копируем конфиги nginx и entrypoint
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh


# Открываем порт
EXPOSE 80

# Запускаем через entrypoint
CMD ["/entrypoint.sh"]
