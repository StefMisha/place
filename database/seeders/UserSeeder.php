<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create('ru_RU');
        $data = [];

        for($i=0; $i < 3; $i++) {
            $data[] = [
                'name'  => $faker->firstName,
                'surname' => $faker->lastName,
                'age' => $faker->numberBetween(mt_rand(100, 200)),
                'place_of_birth' => $faker->address('streetAddress'),
                'email' => $faker->email(),
                'password' => $faker->password(),
            ];
        }

        return $data;
    }

}
