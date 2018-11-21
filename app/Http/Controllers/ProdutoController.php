<?php namespace estoque\Http\Controllers;

// Importação para o uso das classes.
use Illuminate\Support\Facades\DB;
use Request;
use estoque\Produto; // Necessário após criar o model pelo terminal.

/* Todo controller do Laravel deve herdar uma classe específica que define as regras padrões de todo controller.
No caso: extends Controller. */
class ProdutoController extends Controller {
    
    // Retorna a página principal.
    public function main(){
        return view('main');
    }
    
    public function lista(){    
        // Exemplo básico de como fazer um select no banco de dados pelo Laravel, apenas chamando a classe DB.
        // Obs: A conexão só é realizada com sucesso após inserir os dados do banco no diretorio "\config\database.php".
        // $produtos = DB::select('SELECT * FROM produtos');
        // "dd($produtos);" Mostra o array dos produtos na busca.
        
        // Melhor forma de se utilizar um 'SELECT * FROM produtos' utilizando Eloquent, após criar o novo model pelo terminal.
        $produtos = Produto::all();
        
        // Retona a view desejada (no caso a listagem.blade.php), enviando junto a variável $produtos.
        // Os arquivos views se encontram no diretório "\resourse\views\".
        return view('listagem')->with('produtos', $produtos);
    }
    
    public function mostra($id){
        // Request::all(); - Pega todos os parâmetros da requisição.
        // Request::input('id', '1'); - Busca os parâmetros na URL por GET. (O segundo parâmetro é um default)
        // Request::route('id'); - Busca o valor da variável na rota constada na URL. (Nesse caso, o id)
        
        // Quando o $id é informado por parâmetro na função, não é necessário o código abaixo.
        // $id = Request::route('id');
        
        // $produto = DB::select('SELECT * FROM produtos WHERE ID = ?', [$id]);
        $produto = Produto::find($id);
            
        return view('detalhes')->with('p', $produto);
    }
    
    public function remove($id){
        // $id = Request::route('id');
        $produto = Produto::find($id); // Encontra o produto e o recebe com o id informado.
        $produto->delete(); // Deleta o produto.
        
        // return redirect('/produtos');
        // Ao invés de se referir a uma URL como o código acima, se refere ao método do controller.
        return redirect()->action('ProdutoController@lista');
    }
    
    public function novo(){
        return view('formulario');
    }
    
    public function adiciona(){
        
        // Forma nº1 de request (não utilizando o model):
        // $nome = Request::input('nome');
        // $quantidade = Request::input('quantidade');
        // $valor = Request::input('valor');
        // $descricao = Request::input('descricao');
        
        // Forma nº2 de request (utilizando o model):
        // $produto = new Produto();
        // $produto->nome = Request::input('nome');
        // $produto->quantidade = Request::input('quantidade');
        // $produto->valor = Request::input('valor');
        // $produto->descricao = Request::input('descricao');
        
        // Forma nº3 de request (a melhor forma, utilizando o model):
        $params = Request::all();
        $produto = new Produto($params);
        // Porém, a forma acima acaba sendo meio insegura, pois pegam TODOS os parâmetros da requisição, mas podemos filtrar isso dentro do model definido, com o código: protected $fillable = array('nome', 'descricao', 'quantidade', 'valor');
        // Assim, são permitidos apenas os valores informados.
        
        // DB::insert('INSERT INTO produtos (nome, quantidade, valor, descricao) VALUES (?, ?, ?, ?)', array($nome, $quantidade, $valor, $descricao));
        $produto->save();
        
        // Outra forma alternativa de criar um produto com os parâmetros da request, resumindo as 3 linhas de código acima:
        // Produto::create(Request::all());
        
        // withInput() - Mantem os parâmetros da requisição anterior.
        return redirect('/produtos')->withInput();
    }
}