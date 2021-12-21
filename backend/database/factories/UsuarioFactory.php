<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory {

    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'is_astronauta' => $faker->boolean(),
            'nome' => $faker->name() . " " . $faker->lastName(),
            'cpf' => $faker->numberBetween(10000000000, 99999999999),
            'telefone' => $faker->phoneNumber(),
            'endereco' => $faker->address(),
        ];
    }
}
