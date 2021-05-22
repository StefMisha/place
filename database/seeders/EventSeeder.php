<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('events')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create('ru_RU');
        $data = [];

        for ($i=0; $i < 3; $i++){

            $date = $faker->dateTimeBetween('+5 days', '+100 days');
            $dateFormate = $date->format('Y-m-d');

            $data[] = [
                'name' => $faker->emoji(),
                'description' => $faker->realText(mt_rand(150, 250)),
                'date' => $dateFormate
            ];
        }
        return $data;
    }
}
