<?php

namespace App\Http\Controllers;

use App\Models\Comando;
use App\Models\Log;
use App\Models\Missao;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class RegistraComandoController extends Controller {
    public function disparaComando(Request $request) {
        $validator = Validator::make(\request()->all(), [
            'comando' => 'string|max:255',
            'missao_id' => 'required|integer|max:255',
        ]);

        if ($validator->fails())
            return response()->json('Dados incorretos', 422);

        $validated = $validator->safe()->only(['comando', 'missao_id']);

        try {
            $missao = Missao::findOrFail($validated['missao_id']);
        } catch (\Throwable $exception) {
            return response()->json('Missão não encontrada!', 404);
        }

        $comando = Comando::where('comando', '=', $validated['comando'])->first();
        if (!isset($comando->id))
            return response()->json('Comando não encontrado!', 404);

        $resposta = $missao->registraComando($comando);

        Log::salvaLog($missao->id, $comando->label . " -> " . $resposta);
        return response()->json($resposta);
    }
}
