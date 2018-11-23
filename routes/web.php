<?php // Aqui são declaradas as rotas.

Route::get('/', 'ProdutoController@main');

// Diretório dos controllers: \app\Http\Controllers\.

// Parâmetros do get: URI, nome_controller@nome_metodo.
Route::get('/produtos', 'ProdutoController@lista');

// Passa uma variável pela URL (id).
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra');
Route::get('/produtos/remove/{id}', 'ProdutoController@remove');

Route::get('/produtos/novo', 'ProdutoController@novo');
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

// Rotas para login (criado manual)
Route::get('/login', 'LoginController@form');
Route::post('/login', 'LoginController@login');

/**
 * Rotas para as views de autenticação (login).
 * 
 * // Auth::routes();
 * // Route::get('/home', 'HomeController@index')->name('home');
 */
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

/** 
 * O problema de definir as rotas dessa forma, com o código de resposta implementado diretamente em uma função anônima, é que não
 * estamosseguindo nem um pouco as boas práticas da orientação a objetos:
 * 
 * Route::get('/', function(){
 *      return 'Home page temporária';
 * });
 */