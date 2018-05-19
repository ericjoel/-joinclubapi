<?php

use Illuminate\Database\Seeder;
use App\Presentation;

class PresentationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presentation::truncate();

        $fake = \Faker\Factory::create();
        
        Presentation::create([
            'name' => 'Angular 2.0 - Otra perspectiva',
            'description' => $fake->paragraph($nbSentences = 3, $variableNbSentences = true)
        ]);
    }
}
