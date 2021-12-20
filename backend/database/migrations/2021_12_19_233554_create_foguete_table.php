<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFogueteTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('foguete', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->float('combustivel_capacidade');
            $table->float('combustivel_atual')->default(0);

            $table->float('suprimentos_capacidade');
            $table->float('suprimentos_atual')->default(0);

            $table->boolean('em_voo')->default(false);

            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('foguete')->insert([
            'nome' => 'Foguete 1',
            'combustivel_capacidade' => 500,
            'suprimentos_capacidade' => 500
        ]);

        \Illuminate\Support\Facades\DB::table('foguete')->insert([
            'nome' => 'Foguete 2',
            'combustivel_capacidade' => 1500,
            'suprimentos_capacidade' => 1500
        ]);

        \Illuminate\Support\Facades\DB::table('foguete')->insert([
            'nome' => 'Foguete 3',
            'combustivel_capacidade' => 250,
            'suprimentos_capacidade' => 50
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('foguete');
    }
}
