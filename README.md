<h1 align="center">Laravel Test</h1>

## Introduction
I am Alexander Mamaril, senior Laravel developer with over 7 years' experience.


## Installation

To install this Test App:

You can install Surrf with these **3 simple steps**:

### 1. Create a New Database

We'll need to utilize a MySQL database during the installation. For the following stage, you'll need to create a new database and preserve the credentials.

### 2. Copy the `.env.example` file

We need to specify our Environment variables for our application. You will see a file named `.env.example`, you will need to duplicate that file and rename it to `.env`.

Then, open up the `.env` file and update your *DB_DATABASE*, *DB_USERNAME*, and *DB_PASSWORD* in the appropriate fields. You will also want to update the *APP_URL* to the URL of your application.

```bash
APP_URL=http://localhost/tasks

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```



### 5. Run Migrations and Seeds

We must migrate our database schema into our database, which we can accomplish by running the following command:

```php
php artisan migrate
```

Finally, we will need to seed our database with the following command:

```php
php artisan db:seed
```

That's it! You will now be able to visit your URL and see your Surrf application up and running. 🎉




## Support Wave

