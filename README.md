# Todo List with mySql

## Introduction

This a simple todo list application.

### Dependencies

- PHP `^v8.1`
- Composer `^v2`
- Node.js

## Installing

```
git clone https://github.com/ezehkingsleyuchenna/todo-with-mysql
composer install
```

### Environment file

- **Create `.env` file in the root folder**

- **Copy `.env` data from `.env.example`**

### Generate App key

```
php artisan key:generate
```

### Database

- **Create `todo_with_mysql` database in phpMyAdmin**

### Migrate tables

```
php artisan migrate
```

### NPM

```
npm install
```

### Run Application

```
npm run dev
```

# Deploy Application

```
npm run build
```

### Make changes to .env 
- APP_NAME="Application Name"
- APP_ENV=production
- APP_DEBUG=false
- APP_URL=domain
- DB_USERNAME=db username
- DB_PASSWORD=db server password

## License

licensed under the [MIT license](https://opensource.org/licenses/MIT).
