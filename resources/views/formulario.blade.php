@extends('principal')

@section('conteudo')
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
        <label>Descrição</label>
        <input name="descricao" class="form-control" type="text"/>
    </div>
    <button class="btn btn-info" type="submit">Adicionar</button>
</form>
@stop