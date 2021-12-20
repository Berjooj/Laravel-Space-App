<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foguete extends Model {
    use HasFactory;

    protected $table = 'foguete';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nome',
        'combustivel_capacidade',
        'combustivel_atual',
        'suprimentos_capacidade',
        'suprimentos_atual',
        'em_voo',
        'created_at',
        'updated_at'
    ];

    public function missao() {
        return $this->hasMany(Missao::class);
    }
}
