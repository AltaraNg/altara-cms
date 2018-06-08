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
        $this->call(RoleTableSeeder::class);//this goes first, the id 4rm the roleTable will be used for the role field on the userTable
        $this->call(UserTableSeeder::class);
        $this->call(ProductTableSeeder::class);
    }
}
