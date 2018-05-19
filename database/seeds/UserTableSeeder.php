<?php

use App\User;
use App\Role;
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
        User::truncate();
        
        $role_admin = Role::where('name', 'administrator')->first();
        $password = Hash::make('testAdmin1234');

        $administrator = new User();
        $administrator->name = 'Administrator';
        $administrator->email = 'admin@tekton.com';
        $administrator->password = $password;
        $administrator->save();

        $administrator->roles()->attach($role_admin);

    }
}
