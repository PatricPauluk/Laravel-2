@extends('principal')

@section('conteudo')


<!-- 
A <div> abaixo é responsável por exibir as mensagens de erro para o usuário (caso houver).
Estas mensagens podem ser personalizadas no seu respectivo form request, inserindo a função (exemplo): 

public function messages(){
    return [
        'required' => 'O :attribute é obrigatório.',
        'numeric' => 'O :attribute deve ser apenas números.'
    ];
} 
-->
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>


<form class="form-control" action="/produtos/adiciona" method="post">
    <!-- Este input é necessário sempre que for utilizar envios através do metodo POST,
    visando evitar ataques de hackers. (Cross Site Forgery Request) -->
    <input name="_token" value="{{ csrf_token() }}" type="hidden"/>
    <div class="form-group">
        <label>Nome</label>
        <input name="nome" class="form-control" type="text"/>
    </div>
    <div class="form-group">
        <label>Valor</label>
        <input name="valor" class="form-control" type="text"/>
    </div>
    <div class="form-group">
        <label>Quantidade</label>
        <input name="quantidade" class="form-control" type="text"/>
    </div>
    <div class="form-group">
        <label>Tamanho</label>
        <input name="tamanho" class="form-control" type="text"/>
    </div>
    <!-- Carrega as categorias de produtos do banco de dados -->
    <div class="form-group">
        <label>Categoria</label>
        <select name="categoria_id" class="form-control">
            @foreach($categorias as $c)
                <option value="{{$c->id}}">{{$c->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input name="descricao" class="form-control" type="text"/>
    </div>
    <button class="btn btn-info" type="submit">Adicionar</button>
</form>
@stop