<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Missao extends Model {
    use HasFactory;

    protected $table = 'missao';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nome',
        'planeta_origem_id',
        'planeta_destino_id',
        'foguete_id',
        'created_at',
        'updated_at'
    ];

    public function registraComando($comando) {
        $foguete = Foguete::findOrFail($this->foguete_id);

        switch ($comando->comando) {
            case 'ACELERAR':
            case 'REDUZIR':
            case 'VIRAR_ESQUERDA':
            case 'VIRAR_DIREITA':
                if (!$foguete->em_voo)
                    return 'Nave não decolou ainda!';
                else if (($foguete->combustivel_atual - 15) < 0)
                    return 'Nave sem combustível! Reabasteça dos suprimentos ou aguarde resgate!';

                $foguete->update(['combustivel_atual' => $foguete->combustivel_atual - 15]);
                break;
            case 'CONSUMIR_MANTIMENTO':
                if ($foguete->suprimentos_atual == 0)
                    return 'Não há nada para comer.';
                else if (($foguete->suprimentos_atual - 5) <= 0) {
                    $foguete->update(['suprimentos_atual' => 0]);
                    return 'Suprimentos acabaram.';
                }

                $foguete->update(['suprimentos_atual' => $foguete->suprimentos_atual - 5]);
                break;

            case 'REABASTECER_MANTIMENTO':
                if ($foguete->suprimentos_atual == $foguete->suprimentos_capacidade)
                    return 'Estoque já está cheio';
                else if (($foguete->suprimentos_atual + 10) >= $foguete->suprimentos_capacidade) {
                    $foguete->update(['suprimentos_atual' => $foguete->suprimentos_capacidade]);
                    return 'Estoque cheio.';
                }

                $foguete->update(['suprimentos_atual' => $foguete->suprimentos_atual + 10]);
                break;

            case 'REABASTECER_COMBUSTIVEL':
                if ($foguete->em_voo && ($foguete->suprimentos_atual - 15) <= 0)
                    return "Você está sem suprimentos! Aguarde resgate";

                if ($foguete->combustivel_atual == $foguete->combustivel_capacidade)
                    return 'Tanque já está cheio';
                else if (($foguete->combustivel_atual + 15) >= $foguete->combustivel_capacidade) {
                    $foguete->update(['combustivel_atual' => $foguete->combustivel_capacidade]);
                    return 'Tanque cheio.';
                }

                $foguete->update(['combustivel_atual' => $foguete->combustivel_atual + 15, 'suprimentos_atual' => $foguete->suprimentos_atual - 15]);
                break;

            case 'POUSAR':
                if (!$foguete->em_voo)
                    return 'Nave já está no chão!';

                $foguete->update(['em_voo' => false]);

                return 'Nave pousou com sucesso!';
                break;
            case 'DECOLAR':
                if ($foguete->em_voo)
                    return 'Nave já decolou!';

                $foguete->update(['em_voo' => true]);

                return 'Nave decolou com sucesso!';
                break;
        }

        return 'Comando realizado com sucesso!';
    }

    public function foguete() {
        return $this->belongsTo(Foguete::class);
    }

    public function planetaOrigem() {
        return $this->belongsTo(Planeta::class);
    }

    public function planetaDestino() {
        return $this->belongsTo(Planeta::class);
    }

    public function log() {
        return $this->hasMany(Log::class);
    }
}
