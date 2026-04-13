
# 📔 シンプルな日記帳

Laravel12とDockerを使用して作成した、シンプルで使いやすい日記投稿アプリケーションです。

## 🚀 機能
* 日記の投稿・一覧表示
* データベース（PostgreSQL）への保存

## 🛠 使用技術 (魔法の道具箱)
* **Backend**: PHP 8.4 / Laravel 12
* **Database**: PostgreSQL
* **Infrastructure**: Docker / Docker Compose
* **Deployment**: Render (Web Service & Managed Postgres)

## 📦 セットアップ方法 (ローカル開発環境)

1. リポジトリをクローンします
   ```bash
   git clone git@github.com:ando625/simple-diary.git
   ```

2. フォルダに移動してコンテナを起動します
   ```bash
   cd simple-diary
   docker-compose up -d
   ```

3. ライブラリをインストールします
   ```bash
   docker-compose exec app composer install
   ```

## 🌐 デプロイ先
Renderを使用してインターネット上に公開しています。
[あなたのRenderのURLをここに貼る]
```

