<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChamadosController extends Controller
{
    public function index()
    {
        $user = session()->all();

        $chamados = self::fetch(env("API_URL")."chamado", "GET", null, $user['token']);
        $chamados = $chamados['data'] ?? [];

        return view('chamados.index', compact('user', 'chamados'));
    }

    public function novochamado()
    {
        $user = session()->all();

        return view('chamados.create', compact('user'));
    }

    public function store(Request $request)
    {
        $user = session()->all();

        $data = [
            "title" => $request->title,
            "description" => $request->description,
        ];

        $response = self::fetch(env("API_URL")."chamado", "POST", $data, $user['token']);

        if($response['httpcode'] == 201){
            return redirect()->route("dashboard")->with("success", $response["message"]);
        }

        return redirect()->route("dashboard")->with("error", $response["message"]);
    }

    public function edit($id)
    {
        $user = session()->all();

        $chamado = self::fetch(env("API_URL")."chamado/show/$id", "GET", null, $user['token']);
        $chamado = $chamado['data'] ?? [];

        return view('chamados.edit', compact('user', 'chamado', 'id'));
    }

    public function update(Request $request, $id){
        $user = session()->all();

        $data = [
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status,
        ];

        $response = self::fetch(env("API_URL")."chamado/$id", "PUT", $data, $user['token']);

        if($response['httpcode'] == 200){
            return redirect()->route("dashboard")->with("success", $response["message"]);
        }

        return redirect()->route("dashboard")->with("error", $response["message"]);
    }

    public function destroy($id){
        $user = session()->all();

        $response = self::fetch(env("API_URL")."chamado/$id", "DELETE", null, $user['token']);

        if($response['httpcode'] == 200){
            return redirect()->route("dashboard")->with("success", $response["message"]);
        }

        return redirect()->route("dashboard")->with("error", $response["message"]);
    }
}
