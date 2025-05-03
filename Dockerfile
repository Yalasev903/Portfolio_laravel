FROM php:8.2-cli

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev sqlite3 libsqlite3-dev npm nodejs

# Установка PHP-расширений
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip

# Установка Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /var/www

# Копируем проект
COPY . .

# Установка зависимостей
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN npm install && npm run build

# Копируем .env при отсутствии
RUN [ ! -f .env ] && cp .env.example .env || true

# Генерация ключа, миграции, кеш
RUN php artisan config:clear && php artisan key:generate --force
RUN php artisan migrate --force || true

# Установка порта для Railway
ENV PORT=8000
EXPOSE ${PORT}

# Запуск Laravel сервера
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
