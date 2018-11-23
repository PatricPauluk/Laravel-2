<?php

namespace estoque\Http\Middleware;

use Closure;

/**
 * Os códigos de um Middleware são executados antes de todo código na apliacação.
 * Definitivamente aqui é o melhor lugar para se autenticar o acesso de um usuário ou convidado.
 * 
 * Para funcionar corretamente, todo middleware deve ser registrado em:
 * 'app\http\kernel.php'
 * No caso deste middleware, foi inserido dentro de 'protected $routeMiddleware = []'
 */

class Autorizador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    // Todo código aqui é executado antes dos controllers da página.
    public function handle($request, Closure $next)
    {
        // Se o request for diferente de login e o usuário não ser cadastrado, redireciona para login
        if(!$request->is('login') && \Auth::guest()){
            return redirect('/login');
        }
        
        return $next($request);
    }
}
