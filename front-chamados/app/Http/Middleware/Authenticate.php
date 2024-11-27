<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Verifica se a sessão contém o atributo 'ID'
         if (!session('id')) {
            // Redireciona ou retorna uma resposta apropriada
            return redirect('/')->with('error', 'Session ID is missing.');
        }

        // Se o atributo existir, segue para a próxima etapa da requisição
        return $next($request);
    }
}
