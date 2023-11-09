<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário e ou senha não existe';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário realiza login para ter acesso a página';
        }

        return view('site.login', ['title' => 'Login', 'erro' => $erro]);
    }

    public function authetication(Request $request)
    {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obriatório',
            'senha.required' => 'O campo senha é obriatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();
        $existe = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();

        if (isset($existe->name)) {
            session_start();
            $_SESSION['name'] = $existe->name;
            $_SESSION['email'] = $existe->email;
            return redirect()->route('app.home');
        } else {
            return redirect()->route('main.login', ['erro' => 1]);
        }
    }

    public function logout()
    {
        session_destroy();
        return redirect()->route('main.login');
    }
}
