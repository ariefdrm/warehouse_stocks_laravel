# =========================
# Stage 1: PHP Dependencies
# =========================
FROM docker.io/library/composer:2 AS php_deps
WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

COPY . .
RUN composer dump-autoload --optimize


# =========================
# Stage 2: Frontend Build
# =========================
FROM docker.io/library/node:20-alpine AS frontend
WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY resources resources
COPY vite.config.* .
RUN npm run build


# =========================
# Stage 3: Runtime
# =========================
FROM docker.io/library/php:8.3-fpm-alpine

RUN apk add --no-cache \
    libpng \
    libzip \
    oniguruma \
    icu \
    && docker-php-ext-install \
    pdo_mysql mbstring zip intl bcmath gd

WORKDIR /var/www

# Copy Laravel app
COPY --from=php_deps /app /var/www

# Copy compiled frontend assets only
COPY --from=frontend /app/public/build /var/www/public/build

RUN chown -R www-data:www-data storage bootstrap/cache
USER www-data

EXPOSE 9000
CMD ["php-fpm"]

