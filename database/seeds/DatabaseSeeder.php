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
    }
}


class AdminsTableSeeder extends Seeder {

    public function run()
    {        
        Admin::truncate();

        Admin::create([
            'uid' => \Uuid::generate(),
        	'name' => 'Devendra Rajput',
            'email' => 'devrajput.developer@gmail.com',
            'phone' => '0123456789',
            'password' => bcrypt('12345'),
            'remember_token' => null
        ]);
    }

}