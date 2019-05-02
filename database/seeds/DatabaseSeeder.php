<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Associate;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AssociatesTableSeeder::class);
    }
}


class AdminsTableSeeder extends Seeder {

    public function run()
    {        
        Admin::truncate();

        Admin::create([
        	'name' => 'Devendra Rajput',
            'email' => 'devrajput.developer@gmail.com',
            'email_verified_at' => currentDateTime(),   // currentDateTime() is a helper function defined in app\helpers.php
            'password' => bcrypt('12345'),
            'remember_token' => null
        ]);
    }

}

class UsersTableSeeder extends Seeder {

    public function run()
    {        
        User::truncate();

        User::create([
        	'name' => 'Devendra Rajput',
            'email' => 'devrajput.developer@gmail.com',
            'email_verified_at' => currentDateTime(),   // currentDateTime() is a helper function defined in app\helpers.php
            'password' => bcrypt('12345'),
            'remember_token' => null
        ]);
    }
}

class AssociatesTableSeeder extends Seeder {

    public function run()
    {        
        Associate::truncate();

        Associate::create([
        	'name' => 'Devendra Rajput',
            'email' => 'devrajput.developer@gmail.com',
            'email_verified_at' => currentDateTime(),   // currentDateTime() is a helper function defined in app\helpers.php
            'password' => bcrypt('12345'),
            'remember_token' => null
        ]);
    }
}