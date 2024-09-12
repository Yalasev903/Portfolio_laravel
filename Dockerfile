# Используем официальный образ PHP с поддержкой Composer
FROM php:8.2-fpm

# Устанавливаем системные зависимости
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /var/www

# Копируем файлы приложения
COPY . .

# Устанавливаем зависимости PHP и Node.js
RUN composer install --optimize-autoloader --no-dev
RUN npm install && npm run production

# Настраиваем права доступа
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/storage

# Генерация ключа приложения Laravel
# RUN php artisan key:generate

# Копируем конфигурацию Nginx
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

# Открываем порт 8080
EXPOSE 8080

# Запускаем Nginx и PHP-FPM
CMD service nginx start && php-fpm
