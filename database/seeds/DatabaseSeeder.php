<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class); //this goes first cos the id 4 the role will be used for the role field on the user table
        $this->call(UserTableSeeder::class);
        $this->call(ProductTableSeeder::class);
    }
}
