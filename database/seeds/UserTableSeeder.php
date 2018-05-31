<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_role = Role::where('name', 'User')->first();
        $admin_role = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->name="Ibeanu Hillary";
        $user->email="ibeauhillary@gmail.com";
        $user->password=bcrypt('clinsmann');
        $user->save();
        $user->roles()->attach($user_role);

        $user2 = new User();
        $user2->name="Ibeanu Clinton";
        $user2->email="ibeauclinton@gmail.com";
        $user2->password=bcrypt('clinsmann');
        $user2->save();
        $user2->roles()->attach($user_role);

        $admin = new User();
        $admin->name="admin";
        $admin->email="admin@gmail.com";
        $admin->password=bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($admin_role);
    }
}
