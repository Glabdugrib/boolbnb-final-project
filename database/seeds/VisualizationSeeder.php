<?php

use App\Visualization;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class VisualizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100; $i++) { 
            $visualization = new Visualization();
            $visualization->date = $faker->dateTimeInInterval('-2 years', '+0 days');
            $visualization->ip = $faker->ipv4;
            
        }
    }
}
