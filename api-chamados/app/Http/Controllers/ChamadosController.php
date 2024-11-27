<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamados;
use Illuminate\Support\Facades\Validator;

class ChamadosController extends Controller
{
    //
    public function index()
    {
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $body = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => auth()->user()->id
        ];


        try {
            $chamado = new Chamados($body);
            $chamado->save();

            return response()->json(['message' => 'Chamado criado com sucesso!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function list()
    {
        $chamados = Chamados::orderBy('created_at', 'desc')->get();

        return response()->json(['data' => $chamados, 'message' => 'Chamados listados com sucesso!'], 200);
    }

    public function show($id)
    {
        $chamados = Chamados::find($id);

        if (!$chamados) {
            return response()->json(['message' => 'Chamado não encontrado'], 404);
        }

        return response()->json(['data' => $chamados, 'message' => 'Chamado listado com sucesso!'], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $chamado = Chamados::find($id);
            $chamado->title = $request->input('title');
            $chamado->description = $request->input('description');
            $chamado->status = $request->input('status');
            $chamado->save();

            return response()->json(['data' => $chamado, 'message' => 'Chamado atualizado com sucesso!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id){
        $chamado = Chamados::find($id);

        if(!$chamado){
            return response()->json(['message' => 'Chamado não encontrado'], 404);
        }

        try {
            $chamado->delete();
            return response()->json(['message' => 'Chamado deletado com sucesso!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}