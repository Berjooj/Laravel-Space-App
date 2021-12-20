<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'is_astronauta',
        'nome',
        'cpf',
        'telefone',
        'endereco',
        'created_at',
        'updated_at'
    ];
}
