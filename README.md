## Installation

Please find installation steps of projects is as follow

```bash
composer install
```

```bash
php artisan migrate
```

```bash
php artisan db:seed 
```


After complete installations please update following files to start project

## Usage

In folder you will find .env file just update following details with correct database details

```bash
DB_CONNECTION=mysql
DB_HOST= ###
DB_PORT=3306
DB_DATABASE= ###
DB_USERNAME= ###
DB_PASSWORD= ###
```

Please now fire following command after changes done

```bash
php artisan config:cache
```

Please use following command to run server

```bash
php artisan serve
```

Please now visit following url in browser

[http://127.0.0.1:8000](http://127.0.0.1:8000)


## Done