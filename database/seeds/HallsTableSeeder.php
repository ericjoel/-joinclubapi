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
            'address'   => $faker->address(),
            'capacity'  => 20,
            'image'     => $faker->imageUrl($width = 1024, $height = 768, 'city') 
        ]);

        Hall::create([
            'name'      => 'Rivera Nieto',
            'address'   => $faker->address(),
            'capacity'  => 1,
            'image'     => $faker->imageUrl($width = 1024, $height = 768, 'city') 
        ]);

        Hall::create([
            'name'      => 'Pryscilla Apolinario',
            'address'   => $faker->address(),
            'capacity'  => 15,
            'image'     => $faker->imageUrl($width = 1024, $height = 768, 'city') 
        ]);

        Hall::create([
            'name'      => 'Martinez Delgado',
            'address'   => $faker->address(),
            'capacity'  => 15,
            'image'     => $faker->imageUrl($width = 1024, $height = 768, 'city') 
        ]);

        Hall::create([
            'name'      => 'Giraldo Niquin',
            'address'   => $faker->address(),
            'capacity'  => 15,
            'image'     => $faker->imageUrl($width = 1024, $height = 768, 'city') 
        ]);

        Hall::create([
            'name'      => 'Contreras Aguila',
            'address'   => $faker->address(),
            'capacity'  => 20,
            'image'     => $faker->imageUrl($width = 1024, $height = 768, 'city') 
        ]);
    }
}
