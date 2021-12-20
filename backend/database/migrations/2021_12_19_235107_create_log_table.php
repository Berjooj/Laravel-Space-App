<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('log', function (Blueprint $table) {
            $table->id();

            $table->text('log');
            $table->unsignedBigInteger('missao_id');

            $table->foreign('missao_id')->references('id')->on('missao');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('log');
    }
}
