<?php

use App\Visualization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SponsorshipSeeder::class,
            ServiceSeeder::class,
            MessageSeeder::class,
            PositionSeeder::class,
            HouseSeeder::class,
            VisualizationSeeder::class
        ]);
    }
}