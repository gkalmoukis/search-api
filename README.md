# search-api

## Get started

### Install dependencies

Get composer dependecies in project root directory.

```
composer install
```

### Set the environment

Create a copy of environment example file `.env.example` into `.env`.

```
cp .env.example .env
```

Then generate `APP_KEY` by running the `php artisan key:generate` command.


Next, modify the `.env` file 

```diff
+ APP_NAME="Application Name"
+ APP_URL=http://localhost:8000
```

### Create database

Create a new blank database. Connect to MySQL with your credentials e.g.

```
mysql -u <user> -p
create database <database name>;
```

Add database connection credentials in the `.env` file

```diff
+ DB_DATABASE=<database name>
+ DB_USERNAME=<user>
+ DB_PASSWORD=<password>
```

Then migrate database schema into yours with `migrate` command.
```
php artisan migrate
```

### Seed data

To seed dummy data you can use `php artisan db:seed` command.

To import data from excel you can use `php artisan api:import` command.

### Serve application

#### Local development enviroment

In developement enviroment use the `serve` artisan command.
```
php artisan serve
```