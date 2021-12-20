<?php

namespace App\Http\Controllers;

use App\Models\Foguete;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class FogueteController extends Controller {
    public function store(Request $request) {
        $validator = Validator::make(\request()->all(), [
            'nome' => 'required|string|max:255',
            'combustivel_capacidade' => 'required|integer',
            'suprimentos_capacidade' => 'required|integer',
        ]);

        if ($validator->fails())
            return response()->json('Dados incorretos', 422);

        $validated = $validator->safe()->only(['nome', 'combustivel_capacidade', 'suprimentos_capacidade']);
        $foguete = new Foguete($validated);
        $foguete->save();

        return response()->json('Salvo com sucesso!');
    }

    public function update(Request $request, $id) {
        try {
            $foguete = Foguete::findOrFail($id);

            $validator = Validator::make(\request()->all(), [
                'nome' => 'string|max:255',
                'combustivel_capacidade' => 'integer',
                'combustivel_atual' => 'integer',
                'suprimentos_capacidade' => 'integer',
                'suprimentos_atual' => 'integer',
                'em_voo' => 'boolean'
            ]);

            if ($validator->fails())
                return response()->json('Dados incorretos', 422);

            $validated = $validator->safe()->only(['nome', 'combustivel_capacidade', 'combustivel_atual', 'suprimentos_capacidade', 'suprimentos_atual', 'em_voo']);
            $foguete->update($validated);

            return response()->json('Dados salvos com sucesso!');
        } catch (\Throwable $exception) {
            return response()->json('Dados incorretos ou foguete inexistente', 500);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index() {
        return response()->json(['foguetes' => Foguete::get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) {
        try {
            return response()->json(['foguete' => Foguete::findOrFail($id)]);
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
            $comando = Foguete::findOrFail($id);
            $comando->delete();

            return response()->json('Deletado com sucesso!');
        } catch (\Throwable $exception) {
            return response()->json('Nada encontrado!', 404);
        }
    }
}
