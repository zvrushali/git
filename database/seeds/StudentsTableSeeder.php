<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Student;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Student::create([
            'first_name'    => 'Vrushali',
            'last_name'   => 'Zodpe',
            'email'=>'Vrushali@gmail.com',
            'password' => Hash::make('vrushali'),
            'gender' => 'female',
            'active' => 1,
            'remember_token' =>  str_random(10),
        ]);   

         }
}
?>	