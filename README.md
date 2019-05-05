Laravel Multi Auth
Laravel: 5.7
Author: Devendra Rajput
Author Homepage: https://devrajput.in

This project is just create admin, user and associate side (multi auth), which is totaly isolated from laravel normal auth.

On top of that, you can use multiple authentication types, simultaneously, so you can be logged in as an user, an admin and an associate without conflicts!

Version Guidance

Laravel 5.7.9
MySql

Installation.

1. Clone this repository on your server
2. Rename .env.example to .env and change database configuration as per your environment
3. Open terminal and go to project root directory and then run this command "composer install"
4. After it migrate  database table using the command "php artisan migrate"
5. Seed admin database table using command "php artisan db:seed"
6. To run laravel inbuild server, run the command "php artisan serve"

After installation, go to http://127.0.0.1:8000
The home page will look like this



License
This project inherits the licensing of its parent framework, Laravel, and as such is open-sourced software licensed under the MIT license