# Используем PHP с нужными расширениями
FROM php:8.2-cli

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip git curl \
    sqlite3 libsqlite3-dev npm \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip gd

# Установка Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /var/www

# Копируем файлы проекта
COPY . .

# Установка зависимостей Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN npm install && npm run build

# Генерация ключа приложения (если нет APP_KEY)
RUN cp .env.example .env || true && php artisan config:clear && php artisan key:generate

# Порт, ожидаемый Railway
ENV PORT=8080
EXPOSE ${PORT}

# Команда запуска Laravel на Railway
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
