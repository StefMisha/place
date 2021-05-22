<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('+5 days', '+100 days');
        $dateFormate = $date->format('Y-m-d');
        return [
            'name' => $this->faker->emoji(),
            'description' => $this->faker->realText(mt_rand(150, 250)),
            'date' => $dateFormate
        ];
    }
}

