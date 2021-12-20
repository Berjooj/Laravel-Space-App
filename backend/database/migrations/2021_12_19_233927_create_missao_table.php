<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissaoTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('missao', function (Blueprint $table) {
            $table->id();

            $table->string('nome')->nullable();
            $table->unsignedBigInteger('planeta_origem_id');
            $table->unsignedBigInteger('planeta_destino_id');
            $table->unsignedBigInteger('foguete_id');

            $table->foreign('planeta_origem_id')->references('id')->on('planeta');
            $table->foreign('planeta_destino_id')->references('id')->on('planeta');
            $table->foreign('foguete_id')->references('id')->on('foguete');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('missao');
    }
}
