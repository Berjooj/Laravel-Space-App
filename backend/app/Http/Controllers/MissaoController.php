<?php

namespace App\Http\Controllers;

use App\Models\Foguete;
use App\Models\Log;
use App\Models\Missao;
use App\Models\Planeta;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class MissaoController extends Controller {
    public function store(Request $request) {
        $validator = Validator::make(\request()->all(), [
            'nome' => 'string|max:255',
            'planeta_origem_id' => 'required|integer|max:255',
            'planeta_destino_id' => 'required|integer|max:255',
            'foguete_id' => 'required|integer|max:255'
        ]);

        if ($validator->fails())
            return response()->json('Dados incorretos', 422);

        try {
            Planeta::findOrFail($validator->safe()->only(['planeta_origem_id']));
            Planeta::findOrFail($validator->safe()->only(['planeta_destino_id']));
        } catch (\Throwable $exception) {
            return response()->json('Planeta de origem ou destino incorreto (s)', 400);
        }

        try {
            Foguete::findOrFail($validator->safe()->only(['foguete_id']));
        } catch (\Throwable $exception) {
            return response()->json('Foguete incorreto', 400);
        }

        $validated = $validator->safe()->only(['nome', 'planeta_origem_id', 'planeta_destino_id', 'foguete_id']);
        $missao = new Missao($validated);
        $missao->save();

        return response()->json('Salvo com sucesso!');
    }

    public function update(Request $request, $id) {
        try {
            $missao = Missao::findOrFail($id);

            $validator = Validator::make(\request()->all(), [
                'nome' => 'string|max:255',
                'planeta_origem_id' => 'required|integer|max:255',
                'planeta_destino_id' => 'required|integer|max:255',
                'foguete_id' => 'required|integer|max:255'
            ]);

            if ($validator->fails())
                return response()->json('Dados incorretos', 422);

            try {
                Planeta::findOrFail($validator->safe()->only(['planeta_origem_id']));
                Planeta::findOrFail($validator->safe()->only(['planeta_destino_id']));
            } catch (\Throwable $exception) {
                return response()->json('Planeta de origem ou destino incorreto (s)', 400);
            }

            try {
                Foguete::findOrFail($validator->safe()->only(['foguete_id']));
            } catch (\Throwable $exception) {
                return response()->json('Foguete incorreto', 400);
            }

            $validated = $validator->safe()->only(['nome', 'planeta_origem_id', 'planeta_destino_id', 'foguete_id']);
            $missao->update($validated);

            return response()->json('Dados salvos com sucesso!');
        } catch (\Throwable $exception) {
            return response()->json('Dados incorretos ou missão inexistente', 500);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index() {
        return response()->json(['missoes' => Missao::get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) {
        try {
            return response()->json(['missao' => Missao::findOrFail($id)]);
        } catch (\Throwable $exception) {
            return response()->json('Nada encontrado!', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id) {
        try {
            $comando = Missao::findOrFail($id);
            $comando->delete();

            return response()->json('Deletado com sucesso!');
        } catch (\Throwable $exception) {
            return response()->json('Nada encontrado!', 404);
        }
    }

    public function destroyLog($id) {
        try {
            $comando = Log::findOrFail($id);
            $comando->delete();

            return response()->json('Deletado com sucesso!');
        } catch (\Throwable $exception) {
            return response()->json('Nada encontrado!', 404);
        }
    }

    public function showLog($id) {
        try {
            return response()->json(['log' => Log::where('missao_id', '=', $id)->get()]);
        } catch (\Throwable $exception) {
            return response()->json('Nada encontrado!', 404);
        }
    }
}
