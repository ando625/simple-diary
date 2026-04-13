FROM php:8.4-fpm

# 必要なツール（PostgreSQL用の部品など）をインストール
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    && docker-php-ext-install pdo_pgsql

# Composerをインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# php.ini をコピー
COPY php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html

# プログラムを全部コンテナの中にコピーする
COPY . .

# ライブラリ（vendorフォルダ）をインストールする
RUN composer install --no-dev --optimize-autoloader

# フォルダの持ち主をサーバー（www-data）に変更する
RUN chown -R www-data:www-data /var/www/html

# 本番サーバーを起動する命令
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=80