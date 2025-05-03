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

# Рабочая директория
WORKDIR /var/www

# Копируем все файлы проекта
COPY . .

# Установка зависимостей Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Установка Node-зависимостей и сборка фронта
RUN npm install && npm run build

# Подставляем .env если отсутствует
RUN cp .env.example .env || true

# Генерируем APP_KEY и очищаем кэш
RUN php artisan key:generate --force && php artisan config:clear

# Указываем Railway-порт
ENV PORT=8080
EXPOSE 8080

# Запускаем миграции и стартуем сервер
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080
