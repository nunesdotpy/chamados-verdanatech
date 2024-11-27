<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $response = self::fetch(env("API_URL")."login", "POST",$request->except("_token"));
        
        if($response['httpcode'] == 400){
            return redirect()->route("home")->with("error", $response["message"]);
        }


        session($response["data"]);
        session()->save();
        return redirect()->route("dashboard");
    }

    public function register(Request $request)
    {
        $response = self::fetch(env("API_URL")."register", "POST",$request->except("_token"));
        
        if($response['httpcode'] == 400){
            return redirect()->route("home")->with("error", $response["message"]);
        }

        return redirect()->route("home")->with("success", $response["message"]);
    }

    public function logout()
    {  
        // desloga nop backend
        self::fetch(env("API_URL")."logout", "GET");
        session()->flush();
        return redirect()->route("home");
    }
}
