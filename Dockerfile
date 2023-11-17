# ステージ1：Node.js v18.15.0でフロントエンドのアセットをビルド
FROM node:18.15.0 as node-builder

COPY . /app
WORKDIR /app
RUN npm install
RUN npm run build

# ステージ2：PHP 8.1とApacheを使用
FROM php:8.1-apache

# 必要なPHP拡張機能のインストール
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Apacheの設定
RUN a2enmod rewrite headers
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf
RUN sed -i 's#/var/www/html#/var/www/html/public#g' /etc/apache2/sites-available/000-default.conf

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# アプリケーションのコピーとComposer依存関係のインストール
COPY --from=node-builder /app /var/www/html
RUN composer install --no-dev --optimize-autoloader

# パーミッションの設定
RUN chown -R www-data:www-data /var/www/html

# ポートのエクスポーズ
EXPOSE 8080
