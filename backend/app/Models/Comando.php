<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comando extends Model {
    use HasFactory;

    protected $table = 'comando';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'x',
        'y',
        'comando',
        'created_at',
        'updated_at'
    ];
}
