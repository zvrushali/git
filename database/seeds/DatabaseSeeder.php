<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
<<<<<<< HEAD
     * Run the database seeds.
=======
     * Seed the application's database.
>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        Eloquent::unguard();
        $this->call(AdminTalesSeeder::class);
        $this->call(UsersTablesSeeder::class);
        $this->call(StudentsTableSeeder::class);
=======
        // $this->call(UsersTableSeeder::class);
>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
    }
}
