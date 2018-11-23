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