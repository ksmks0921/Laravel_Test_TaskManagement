<h1 align="center">Laravel Test</h1>

## Introduction
I am Alexander Mamaril, senior Laravel developer with over 7 years' experience. I have completed Skill Test.

>Create a very simple Laravel web application for task management:

>- Create task (info to save: task name, priority, timestamps)
Edit task
>- Delete task
>- Reorder tasks with drag and drop in the browser. Priority should automatically be updated based on this. #1 priority goes at top, #2 next down and so on.
Tasks should be saved to a mysql table.

>BONUS POINT: add project functionality to the tasks. User should be able to select a project from a dropdown and only view tasks associated with that project.

>You will be graded on how well-written & readable your code is, if it works, and if you did it the Laravel way.

>Include any instructions on how to set up & deploy the web application in your Readme.md file in the project directory (delete the default readme).

>Zip up the folder with your web application when you are finished and upload it here."


## Installation

To install this Test Project:

You can install this test laravel project with these **3 simple steps**:

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

Once done, run the Server with the following command:

```php
php artisan serve
```

Verify the deployment by navigating to your server address in
your preferred browser.

```sh
http://127.0.0.1:8000
```

