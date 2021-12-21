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
