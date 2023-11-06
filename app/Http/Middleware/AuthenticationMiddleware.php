<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $authenticantion, $profile): Response
    {
        echo $authenticantion.' - '.$profile.'<br>';
        if ($authenticantion == 'default') {
            echo 'verifica o usuario e senha do banco de dados '.$profile.'<br>';
        }

        if ($authenticantion == 'ldap') {
            echo 'Verificar o usuario e senha do AD '.$profile.'<br>';
        }

        if (false){
            return $next($request);
        }else{
            return Response('Acesso negado! Rota exige que seja autenticado');
        }
    }
}
