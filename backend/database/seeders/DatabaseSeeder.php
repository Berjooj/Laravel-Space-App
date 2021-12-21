<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        \App\Models\Usuario::factory(10)->create();
        \App\Models\Planeta::factory(10)->create();
        \App\Models\Foguete::factory(10)->create();
    }
}
