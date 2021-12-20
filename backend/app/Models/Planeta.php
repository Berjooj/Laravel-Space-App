<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planeta extends Model {
    use HasFactory;

    protected $table = 'planeta';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nome',
        'created_at',
        'updated_at'
    ];

    public function missaoOrigem() {
        return $this->hasMany(Missao::class);
    }

    public function missaoDestino() {
        return $this->hasMany(Missao::class);
    }
}
