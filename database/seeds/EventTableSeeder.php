<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Hall;
use App\Presentation;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::truncate();

        $hall = Hall::where('name', 'Alfonso Ugarte')->first();   
        $presentation = Presentation::where('name', 'Angular 2.0 - Otra perspectiva')->first();
        $speaker = $presentation->speakers()->where('name', 'Eric Contreras')->first();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Event::create([
                'date_event'        => $faker->date(),
                'start_hour'        => '15:00',
                'finish_hour'       => '18:00',
                'hall_id'           => $hall->id,
                'presentation_id'   => $presentation->id,
                'speaker_id'        => $speaker->id,
                'capacity'          => 10
            ]);
        }
    }
}
