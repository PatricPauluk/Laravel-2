@extends('principal')

@section('conteudo')

<form class="form-control" action="/login" method="post">
    <!-- Este input é necessário sempre que for utilizar envios através do metodo POST,
    visando evitar ataques de hackers. (Cross Site Forgery Request) -->
    <input name="_token" value="{{ csrf_token() }}" type="hidden"/>
    <div class="form-group">
        <label>Email</label>
        <input name="email" class="form-control" type="text"/>
    </div>
    <div class="form-group">
        <label>Senha</label>
        <input name="password" class="form-control" type="password"/>
    </div>
    <button class="btn btn-info" type="submit">Entrar</button>
</form>
@stop