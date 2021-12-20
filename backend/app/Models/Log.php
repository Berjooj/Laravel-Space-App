<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model {
    use HasFactory;

    protected $table = 'log';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'log',
        'missao_id',
        'created_at',
        'updated_at'
    ];

    public static function salvaLog($missao_id, $mensagem) {
        $log = new Log();
        $log->missao_id = $missao_id;
        $log->log = "[" . Carbon::now() . "] " . $mensagem;

        $log->save();
    }

    public
    function missao() {
        return $this->belongsTo(Missao::class);
    }
}
