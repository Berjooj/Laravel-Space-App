<?php

namespace App\Http\Controllers;

use App\Models\Planeta;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class PlanetaController extends Controller {
    public function store(Request $request) {
        $validator = Validator::make(\request()->all(), [
            'nome' => 'required|string|max:255',
        ]);

        if ($validator->fails())
            return response()->json('Dados incorretos', 422);

        $validated = $validator->safe()->only(['nome']);
        $planeta = new Planeta($validated);
        $planeta->save();

        return response()->json('Salvo com sucesso!');
    }

    public function update(Request $request, $id) {
        try {
            $planeta = Planeta::findOrFail($id);

            $validator = Validator::make(\request()->all(), ['nome' => 'string|max:255']);

            if ($validator->fails())
                return response()->json('Dados incorretos', 422);

            $validated = $validator->safe()->only(['nome']);
            $planeta->update($validated);

            return response()->json('Dados salvos com sucesso!');
        } catch (\Throwable $exception) {
            return response()->json('Dados incorretos ou planeta inexistente', 500);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index() {
        return response()->json(['planetas' => Planeta::get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) {
        try {
            return response()->json(['planeta' => Planeta::findOrFail($id)]);
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
            $comando = Planeta::findOrFail($id);
            $comando->delete();

            return response()->json('Deletado com sucesso!');
        } catch (\Throwable $exception) {
            return response()->json('Nada encontrado!', 404);
        }
    }
}
