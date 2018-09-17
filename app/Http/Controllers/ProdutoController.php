<?php namespace estoque\Http\Controllers;

// Importação para o uso das classes.
use Illuminate\Support\Facades\DB;
use Request;

/* Todo controller do Laravel deve herdar uma classe específica que define as regras padrões de todo controller.
No caso: extends Controller. */
class ProdutoController extends Controller {
    
    public function lista(){    
        // Exemplo básico de como fazer um select no banco de dados pelo Laravel, apenas chamando a classe DB.
        // Obs: A conexão só é realizada com sucesso após inserir os dados do banco no diretorio "\config\database.php".
        $produtos = DB::select('SELECT * FROM produtos');
        // "dd($produtos);" Mostra o array dos produtos na busca.
        
        // Retona a view desejada (no caso a listagem.php), enviando junto a variável $produtos.
        // Os arquivos views se encontram no diretório "\resourse\views\".
        return view('listagem')->with('produtos', $produtos);
    }
    
    public function mostra(){
        // Request::all(); - Pega todos os parâmetros da requisição.
        // Request::input('id', '1'); - Busca os parâmetros na URL por GET. (O segundo parâmetro é um default)
        // Request::route('id'); - Busca o valor da variável na rota constada na URL. (Nesse caso, o id)
        $id = Request::route('id');
        
        $produto = DB::select('SELECT * FROM produtos WHERE ID = ?', [$id]);
        
        return view('detalhes')->with('p', $produto[0]);
    }
    
    public function novo(){
        return view('formulario');
    }
    
    public function adiciona(){
        $nome = Request::input('nome');
        $quantidade = Request::input('quantidade');
        $valor = Request::input('valor');
        $descricao = Request::input('descricao');
        
        DB::insert('INSERT INTO produtos (nome, quantidade, valor, descricao) VALUES (?, ?, ?, ?)', array($nome, $quantidade, $valor, $descricao));
        
        // withInput() - Mantem os parâmetros da requisição anterior.
        return redirect('/produtos')->withInput();
    }
}