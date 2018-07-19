## About this project

This application is an Admin Panel that permits a user who is logged in as Administrative user to manage records of companies and their employees. 

## How to run this application

1 Create a mysql database named `company`
2 In the root folder of the application, run the command
```
php artisan migrate --seed
```
This will run the migration files which will create the necessary tables and seed the users table with an admin user whose email is `admin@admin.com` and password `password`.

The migration command also assigns a role called `Admin` to the administrative user which can distinguish the administrative user from other users in the application. 
