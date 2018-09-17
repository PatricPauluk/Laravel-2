@extends('principal')

@section('conteudo')
<h1>Detalhes de Produto {{$p->nome}}</h1>

<ul>
    <li>
        Valor: R$ {{$p->valor}}
    </li>
    <li>
        Descrição: R$ {{$p->descricao or 'não tem descrição'}}
    </li>
    <li>
        Quantidade em estoque: R$ {{$p->quantidade}}
    </li>
</ul>
@stop