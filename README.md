# Laravel Todo

### Laravel Todoのプロジェクトをクローンする。

```
git clone git@github.com:JunNagashima/Laravel_todo.git
```

### MAMP のルートフォルダの設定を変更する

#### 手順
1. MAMP の設定(Preferences)を開く
2. Serverタブを開く
3. Document rootをクローンしたLaravelプロジェクトのpublicディレクトリを選択する
`例:Desctop\Laravel_todo\public`

### MAMP の起動

### phpMyAdminにログインしてDBを作成する

データベースは`laravel_todo`で作成する。

### Laravelの.envファイルを作成し下記を記入
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:scPZ/q66ahgbSZMUTfU1n8R8UMTLHzHeVDN15luDLoU=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=laravel_todo
DB_USERNAME=root
DB_PASSWORD=root
DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```

### migrateコマンドを入力する
```
php artisan migrate
```
正常に終了したらphpMyAdminでテーブルが作成されているか確認する。

### テストデータのインサート
```
php artisan db:seed
```
先程作成したテーブル(todoテーブル)にデータが入ってるかphpMyAdminで確認する。

### Laravelプロジェクトを開く

1. MAMPのWebStartからwebページを開く
2. ページの右上のMyWebsiteボタンを押す

