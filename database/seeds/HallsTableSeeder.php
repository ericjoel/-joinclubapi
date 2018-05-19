<?php

use Illuminate\Database\Seeder;
use App\Hall;

class HallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hall::truncate();

        $faker = \Faker\Factory::create();

        Hall::create([
            'name'      => 'Alfonso Ugarte',
            'address'   => $faker->address()
        ]);

        Hall::create([
            'name'      => 'Rivera Nieto',
            'address'   => $faker->address()
        ]);
    }
}
