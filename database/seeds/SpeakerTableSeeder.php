<?php

use Illuminate\Database\Seeder;
use App\Speaker;
use App\Presentation;

class SpeakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speaker::truncate();

        $fake = \Faker\Factory::create();
        $presentation = Presentation::where('name', 'Angular 2.0 - Otra perspectiva')->first();

        $speaker = Speaker::create([
            'name' => 'Eric Contreras',
            'address' => $fake->address(),
            'phone' => $fake->e164PhoneNumber()
        ]);

        $speaker->presentations()->attach($presentation);
    }
}
