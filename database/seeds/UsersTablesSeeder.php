<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\user_detail;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for($i=1;$i<=50;$i++)
    	 {
          user_detail::create([
            'first_name' => str_random(6),
            'last_name' => str_random(6),
            'email' => strtolower(str_random(6)).'@gmail.com',
            'password' => Hash::make('password'),
            'gender'=>'Female',
            'active'=>1,
            
        ]);
     }
    }
}
