Laravel Multi Auth
Laravel: 5.7
Author: Devendra Rajput
Author Homepage: https://devrajput.in

This project is just create admin, user and associate side (multi auth), which is totaly isolated from laravel normal auth.

On top of that, you can use multiple authentication types, simultaneously, so you can be logged in as an user, an admin and an associate without conflicts!

Version Guidance

Laravel 5.7.9

Installation.

1. Clone this repository inside your server root directory
2. Rename .env.example to .env and change database configuration as per your environment.
3. composer install
4. migrate  database table using command php artisan migrate
5. Seed admin database table using command php artisan db:seed


First Admin
Obviously, first time you need at least one admin to login.
We already created a default admin. 

Register new User
To register new use you need to go to https://localhost:8000/user/create.

Register new Associate
To register new associate you need to go to https://localhost:8000/associate/create.

License
This project inherits the licensing of its parent framework, Laravel, and as such is open-sourced software licensed under the MIT license