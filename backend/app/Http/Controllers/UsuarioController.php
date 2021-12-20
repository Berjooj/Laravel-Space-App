<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller {
    public function store(Request $request) {
        dd($request);
        $validator = Validator::make(\request()->all(), [
            'nome' => 'required|string|max:255',
            'is_astronauta' => 'boolean',
            'cpf' => 'required|string|max:255',
            'telefone' => 'string|max:255',
            'endereco' => 'required|string|max:255',
        ]);

        if ($validator->fails())
            return response()->json('Dados incorretos', 422);

        $validated = $validator->safe()->only(['nome', 'is_astronauta', 'cpf', 'telefone', 'endereco']);
        $usuario = new Usuario($validated);
        $usuario->save();

        return response()->json('Salvo com sucesso!');
    }

    public function update(Request $request, $id) {
        try {
            $usuario = Usuario::findOrFail($id);

            $validator = Validator::make(\request()->all(), ['nome' => 'string|max:255']);

            if ($validator->fails())
                return response()->json('Dados incorretos', 422);

            $validated = $validator->safe()->only(['nome']);
            $usuario->update($validated);

            return response()->json('Dados salvos com sucesso!');
        } catch (\Throwable $exception) {
            return response()->json('Dados incorretos ou usuário inexistente', 500);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index() {
        return response()->json(['usuarios' => Usuario::get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) {
        try {
            return response()->json(['usuario' => Usuario::findOrFail($id)]);
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
            $comando = Usuario::findOrFail($id);
            $comando->delete();

            return response()->json('Deletado com sucesso!');
        } catch (\Throwable $exception) {
            return response()->json('Nada encontrado!', 404);
        }
    }
}
