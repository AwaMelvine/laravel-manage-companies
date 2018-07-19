## About this project

This application is an Admin Panel that permits a user who is logged in as Administrative user to manage records of companies and their employees. 

## How to run this application
1. Clone this repository
```
git clone https://github.com/AwaMelvine/laravel-manage-companies.git
```
2. Creat a MySQL database and give it  a name say `company`
3. Create a `.env` file in the root of your application and replace the username, password and database fields with your corresponding MySQL database details

4. In the root folder of the application, run the command
```
php artisan migrate --seed
```
This will run the migration files which will create the necessary tables and seed the users table with an admin user whose email is `admin@admin.com` and password `password`.

The migration command also assigns a role called `Admin` to the administrative user which can distinguish the administrative user from other users in the application. 
