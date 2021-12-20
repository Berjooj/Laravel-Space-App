<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioHasMissao extends Model {
    use HasFactory;

    protected $table = 'usuario_has_missao';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'usuario_id',
        'missao_id',
        'created_at',
        'updated_at'
    ];


}
