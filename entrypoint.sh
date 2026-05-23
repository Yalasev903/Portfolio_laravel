#!/bin/sh
set -e

if [ ! -f .env ]; then
    cp .env.example .env
fi

if [ ! -d vendor ]; then
    composer install --no-interaction --prefer-dist
fi

if [ ! -d node_modules ]; then
    npm install --legacy-peer-deps
fi

if [ ! -d public/build ]; then
    npm run build
fi

if ! grep -q '^APP_KEY=base64:' .env; then
    php artisan key:generate --force
fi

php artisan storage:link --force

echo "Waiting for DB on ${DB_HOST}:${DB_PORT}..."

i=1
while [ "$i" -le 30 ]; do
    nc -z -w1 "$DB_HOST" "$DB_PORT" && break
    echo "Waiting... ($i)"
    i=$((i + 1))
    sleep 1
done

echo "Running migrations..."
php artisan migrate --force

echo "Running seeders..."
php artisan db:seed --force

exec "$@"
