FROM php:8.2-cli

# Устанавливаем зависимости вручную
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev \
    unzip git curl zip libsqlite3-dev \
    libzip-dev pkg-config npm \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip gd

# Установка Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /var/www

# Копируем проект
COPY . .

# Установка зависимостей Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Сборка ассетов (если используешь Vite)
RUN npm install && npm run build

# Копируем .env если отсутствует
RUN cp .env.example .env || true

# Генерация APP_KEY
RUN php artisan config:clear && php artisan key:generate --force

# Railway требует переменную PORT (по умолчанию 8080)
ENV PORT=8080
EXPOSE ${PORT}

# Laravel встроенный сервер
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
