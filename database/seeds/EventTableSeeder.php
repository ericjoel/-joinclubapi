<?php

use Illuminate\Database\Seeder;
use App\Event;

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

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Event::create([
                'name'          => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'date_event'    => $faker->date(),
                'start_hour'    => $faker->time(),
                'finish_hour'   => $faker->time()
            ]);
        }
    }
}
