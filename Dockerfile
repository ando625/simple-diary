FROM php:8.4-fpm

# 必要なツール（PostgreSQL用の部品など）をインストール
# 1行ずつ：パッケージリスト更新、PostgreSQL接続用ライブラリ、解凍ツール、インストール実行
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    && docker-php-ext-install pdo_pgsql

# Composer（Laravelを連れてくる魔法の杖）をインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 【追加】作成した php.ini をコンテナの中にコピーして設定を反映させる
COPY php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html

# 【追加分】フォルダの持ち主をサーバー（www-data）に変更する
# これをやらないと、Render上で「ログが書けない！」と怒られることがある
RUN chown -R www-data:www-data /var/www/html

# 【追加分】本番サーバーを起動する命令
# コンテナが立ち上がった瞬間に、このコマンドが自動で実行されます
CMD php artisan serve --host=0.0.0.0 --port=80