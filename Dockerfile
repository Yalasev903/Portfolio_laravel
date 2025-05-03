# Используем PHP CLI (без FPM)
FROM php:8.2-cli

# Устанавливаем необходимые пакеты
RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    sqlite3 libsqlite3-dev npm nodejs

# Устанавливаем PHP расширения
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip

# Устанавливаем Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Переходим в рабочую директорию и копируем проект
WORKDIR /var/www
COPY . .

# Устанавливаем зависимости Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN npm install && npm run build

# Подставляем .env если отсутствует
RUN [ ! -f .env ] && cp .env.example .env || true

# Генерируем ключ и очищаем конфиг
RUN php artisan config:clear && php artisan key:generate --force

# Правильный порт для Railway
ENV PORT=8080
EXPOSE ${PORT}

# Финальная команда запуска с логом
CMD echo "🎯 Starting Laravel on port ${PORT}..." && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=${PORT}
