# chat_demo

## install

### ソースコードのクローン

```
git clone git@github.com:atofuzi/chat-demo.git
```

### プロジェクトルートディレクトリに移動

```
cd chat-demo
```

### docker 用の env ファイルのコピー

```
cp .env.docker .env
```

### コンテナビルド・起動 & パッケージインストール

```
make setup
```

### フロントエンドの env コピー

```
cp frontend/.env.example frontend/.env
```

### フロントエンドの env の設定

php artisan passport:install が make setup により実行される。

```
Encryption keys generated successfully.
Personal access client created successfully.
Client ID: Z
Client secret: XXXXXXXXXXXXXXXX
Password grant client created successfully.
Client ID: Y
Client secret: XXXXXXXXXXXXXXXX
```

client_id, client_secret の値を.env に記入

```
VUE_APP_AUTH_GRANT_TYPE=password
VUE_APP_AUTH_CLIENT_ID=Y
VUE_APP_AUTH_CLIENT_SECRET=XXXXXXXXXXXXXXXX

BASE_URL=http://localhost:8007
VUE_APP_API_URL=http://localhost:8007/api/v1

```

### コンテナ再起動

```
make restart
```
