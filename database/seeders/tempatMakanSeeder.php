<?php

use Illuminate\Database\Seeder;
use App\Models\TempatMakan;

class TempatMakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Panggil factory untuk membuat data dummy
       TempatMakanFactory::new()->count(10)->create();
    }
}
