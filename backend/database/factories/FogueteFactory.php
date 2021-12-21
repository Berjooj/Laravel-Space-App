<?php

namespace Database\Factories;

use App\Models\Foguete;
use Illuminate\Database\Eloquent\Factories\Factory;

class FogueteFactory extends Factory {
    protected $model = Foguete::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'nome' => "Foguete " . $faker->lastName(),
            'combustivel_capacidade' => $faker->numberBetween(10, 250),
            'combustivel_atual' => $faker->numberBetween(10, 250),
            'suprimentos_capacidade' => $faker->numberBetween(10, 250),
            'suprimentos_atual' => $faker->numberBetween(10, 250),
            'em_voo' => false,
        ];
    }
}
