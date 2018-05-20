<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'administrator';
        $role_admin->description = 'An Administrator';
        $role_admin->maximum_events = null;
        $role_admin->save();

        $role_member = new Role();
        $role_member->name = 'member';
        $role_member->description = 'A Normal User';
        $role_member->maximum_events = 10;
        $role_member->save();

        $role_member_vip = new Role();
        $role_member_vip->name = 'vip member';
        $role_member_vip->description = 'A Vip User';
        $role_member->maximum_events = null;
        $role_member_vip->save();
    }
}
