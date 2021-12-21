<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComandoTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('comando', function (Blueprint $table) {
            $table->id();
            $table->integer('x');
            $table->integer('y');
            $table->boolean('apenas_astronauta');
            $table->string('comando');
            $table->string('label');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('comando')->insert([
            'x' => 1,
            'y' => 0,
            'apenas_astronauta' => false,
            'comando' => 'ACELERAR',
            'label' => 'Acelerar velocidade'
        ]);

        \Illuminate\Support\Facades\DB::table('comando')->insert([
            'x' => 1,
            'y' => 1,
            'apenas_astronauta' => false,
            'comando' => 'REDUZIR',
            'label' => 'Reduzir velocidade'
        ]);

        \Illuminate\Support\Facades\DB::table('comando')->insert([
            'x' => 0,
            'y' => 1,
            'apenas_astronauta' => false,
            'comando' => 'VIRAR_ESQUERDA',
            'label' => 'Virar nave à esquerda'
        ]);

        \Illuminate\Support\Facades\DB::table('comando')->insert([
            'x' => 2,
            'y' => 1,
            'apenas_astronauta' => false,
            'comando' => 'VIRAR_DIREITA',
            'label' => 'Virar nave à direita'
        ]);

        \Illuminate\Support\Facades\DB::table('comando')->insert([
            'x' => 2,
            'y' => 0,
            'apenas_astronauta' => true,
            'comando' => 'CONSUMIR_MANTIMENTO',
            'label' => 'Consumir mantimento (1kg)'
        ]);

        \Illuminate\Support\Facades\DB::table('comando')->insert([
            'x' => 3,
            'y' => 0,
            'apenas_astronauta' => true,
            'comando' => 'REABASTECER_MANTIMENTO',
            'label' => 'Reabastecer mantimento (1kg)'
        ]);

        \Illuminate\Support\Facades\DB::table('comando')->insert([
            'x' => 3,
            'y' => 1,
            'apenas_astronauta' => true,
            'comando' => 'REABASTECER_COMBUSTIVEL',
            'label' => 'Reabastecer combustivel (15l)'
        ]);

        \Illuminate\Support\Facades\DB::table('comando')->insert([
            'x' => 4,
            'y' => 0,
            'apenas_astronauta' => false,
            'comando' => 'POUSAR',
            'label' => 'Pousar nave'
        ]);

        \Illuminate\Support\Facades\DB::table('comando')->insert([
            'x' => 4,
            'y' => 1,
            'apenas_astronauta' => false,
            'comando' => 'DECOLAR',
            'label' => 'Lançar foguete'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('comando');
    }
}
