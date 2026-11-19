
# 📔 シンプルな日記帳

Laravel 13とDockerを使用して作成した、シンプルで使いやすい日記投稿アプリケーションです。

## 🚀 機能
* 日記の投稿・一覧表示
* データベース（PostgreSQL）への保存

## 🛠 使用技術 (魔法の道具箱)
* **Backend**: PHP 8.5 / Laravel 13
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
[https://simple-diary-hb9t.onrender.com]

---

## バージョンアップと脆弱性チェック

### 依存パッケージの更新（2026年11月）

Laravel 13 のまま、Laravel 本体（13.4.0 → 13.42.0）と関連パッケージを、脆弱性の修正が入った版に更新しました。あわせて composer.json の PHP の指定を ^8.3 から ^8.4 にそろえています（Dockerfile は以前から PHP 8.4）。

| 対象 | 変更前 | 変更後 | セキュリティ修正の期限 |
|---|---|---|---|
| PHP | 8.4（composer.json は ^8.3） | 8.4 | 2028-12-31 |
| Laravel | 13.4.0 | 13.42.0 | 2028-03-17 |

- 期限の出典: [PHP Supported Versions](https://www.php.net/supported-versions.php) / [Laravel Release Notes](https://laravel.com/docs/13.x/releases)
- `composer audit` で検出された脆弱性は、更新前の48件から0件になりました

### PHP 8.5 への更新（2026年11月）

PHP 8.4 のバグ修正が 2026-12-31 で終わるため、PHP 8.5 に更新しました（Docker・composer.json・CI）。

| 対象 | 変更前 | 変更後 | バグ修正の期限 | セキュリティ修正の期限 |
|---|---|---|---|---|
| PHP | 8.4 | 8.5 | 2027-12-31 | 2029-12-31 |

- 期限の出典: [PHP Supported Versions](https://www.php.net/supported-versions.php)
- Laravel 13 は PHP 8.3〜8.5 に対応しています（[Laravel Release Notes](https://laravel.com/docs/13.x/releases)）

### 脆弱性チェックの方法

アプリのコンテナの中（`docker-compose exec app`）で次のコマンドを実行すると、依存パッケージに既知の脆弱性やマルウェアがないか確認できます（マルウェアの確認には新しい Composer が必要です。2.8 では確認されず、2.11 では確認されることを確かめています）。

```bash
composer audit
```

### 自動チェック

| 仕組み | 内容 |
|---|---|
| GitHub Actions（`.github/workflows/composer-audit.yml`） | `main` への push・PR・毎週月曜に `composer audit` を実行し、問題があれば失敗にする |
| Dependabot（`.github/dependabot.yml`） | composer と Dockerfile の更新を毎週チェックし、更新があれば PR を作る |
