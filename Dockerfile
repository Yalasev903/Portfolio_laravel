FROM php:8.2-fpm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev libzip-dev \
    zip unzip git curl npm sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip gd

# Установка Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /var/www

# Копируем проект
COPY . .

# Копируем скрипт запуска
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Установка PHP-зависимостей
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Сборка фронтенда
RUN npm install && npm run build

# Проброс порта Railway
ENV PORT=80
EXPOSE ${PORT}

# Запуск Laravel
CMD ["/entrypoint.sh"]
