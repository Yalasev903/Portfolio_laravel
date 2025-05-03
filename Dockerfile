# Laravel base
FROM php:8.2-fpm

# Установим зависимости
RUN apt-get update && apt-get install -y \
    nginx \
    libzip-dev \
    zip unzip git curl npm nodejs sqlite3 libsqlite3-dev \
    libpng-dev libonig-dev libxml2-dev libcurl4-openssl-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath zip gd

# Установим Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Создаем рабочую директорию
WORKDIR /var/www

# Копируем проект
COPY . .

# Устанавливаем зависимости
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN npm install && npm run build

# Копируем .env, если он не существует
RUN [ ! -f .env ] && cp .env.example .env || true

# Генерация ключа и кеш конфигурации
RUN php artisan config:clear && php artisan key:generate --force

# Применяем миграции
RUN php artisan migrate --force || true

# Настройки nginx
RUN echo "server {
    listen 80;
    index index.php index.html;
    root /var/www/public;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
    }

    location ~ /\.ht {
        deny all;
    }
}" > /etc/nginx/sites-enabled/default

# Удалим дефолтный файл, если он есть
RUN rm -f /etc/nginx/sites-enabled/default.conf

# Указываем порт
EXPOSE 80

# Запускаем Supervisor-подобный процесс — nginx и php-fpm
CMD service nginx start && php-fpm
