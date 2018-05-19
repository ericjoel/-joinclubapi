<?php

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
        User::truncate();

        $password = Hash::make('testAdmin1234');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@tekton.com',
            'password' => $password
        ]);
    }
}
