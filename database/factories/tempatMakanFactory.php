<?php

use App\Models\TempatMakan;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class TempatMakanFactory extends Factory
{
    protected $model = TempatMakan::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'url_photo' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'price_range' => $this->faker->randomElement(['Low', 'Medium', 'High']),
            'location' => $this->faker->city,
            'address' => $this->faker->address,
            'type' => $this->faker->randomElement(['Restaurant', 'Cafe', 'Fast Food']),
            'url_menu' => $this->faker->url,
            'rating' => $this->faker->randomFloat(1, 1, 5)
        ];
    }
}
