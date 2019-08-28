<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class AdminTalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

       User::create([
            'id'   => 2,
            'first_name'    => 'Subadmin',
            'email'   => 'Subadmin@gmail.com',
            'password' => Hash::make('Subadmin'),
            'role'  => 1,
            'remember_token' =>  str_random(10),
      
        'id'   => 1,
            'first_name'    => 'Admin',
            'email'   => 'Admin@gmail.com',
            'password' => Hash::make('Admin'),
            'role'  => 0,
            'remember_token' =>  str_random(10),


    ]);
    }
}
