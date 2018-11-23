<?php

namespace estoque\Http\Controllers;

/**
 * Para resolver o erro:
 * Non-static method Illuminate\Http\Request::only() should not be called statically
 * 
 * Trocamos:
 * use Illuminate\Http\Request;
 * 
 * Por apenas:
 * use Request;
 */

use Request;
use Auth; // Necessário para verificar o login

class LoginController extends Controller
{
    // Exibe a view form_login
    public function form(){
        return view('form_login');
    }
    
    public function login(){
        
        // Busca as credenciais (login e senha)
        $credenciais = Request::only('email', 'password');
        
        
        /**
         * Verifica o login.
         * Para utilizar o metodo attempt, é necessário importar o método Auth.
         * 
         * Caso consiga logar com as credenciais inseridas, retorna true (verifica e loga o usuário):
         * Auth::attempt($credenciais);
         * 
         * Verifica se existe o usuário ou não (sem efetuar login):
         * Auth::validate($credenciais);
         */
        if (Auth::attempt($credenciais)){
            return 'Usuário logado com sucesso!';
        } else {
            return 'Usuário ou senha incorretos.';
        }
        
        
        
        // retorna
    }
}
