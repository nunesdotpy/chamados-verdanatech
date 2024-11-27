<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $input = request()->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return response()->json(['data' => $user, 'message' => 'Usuário criado com sucesso'], 201);
    }

    public function login(Request $request)
    {
        $input = request()->all();
        $validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        if (!$accessToken = auth()->attempt($input)) {
            return response()->json(['message' => 'Sem autorização'], 400);
        }

        $user = [
            'id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'token' => $accessToken,
        ];

        return response()->json(['data' => $user, 'message' => 'Login efetuado com sucesso'], 200);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Logout efetuado com sucesso'], 200);
    }

    public function refresh()
    {
        $user = [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'token' => auth()->refresh(),
        ];
        
        return response()->json(['data' => $user, 'message' => 'Token atualizado com sucesso'], 200);
    }
}
