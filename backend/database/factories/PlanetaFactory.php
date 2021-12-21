<?php

namespace Database\Factories;

use App\Models\Planeta;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanetaFactory extends Factory {
    protected $model = Planeta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'nome' => "Planeta " . $faker->firstName()
        ];
    }
}
