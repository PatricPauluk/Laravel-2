@extends('principal')

@section('conteudo')
<h1>Listagem de Produtos</h1>

<table class="table">
    @foreach($produtos as $p)
    <tr class="{{ $p->quantidade <= 1 ? 'danger' : '' }}">
        <td> {{ $p->nome }} </td>
        <td> {{ $p->valor }} </td>
        <td> {{ $p->descricao }} </td>
        <td> {{ $p->quantidade }} </td>
        <td><!-- Envia o ID do produto selecionado para URL. -->
            <a href="/produtos/mostra/{{$p->id}}">Visualizar</a>
        </td>
        <td>
            <a href="/produtos/remove/{{$p->id}}">Remover</a>
        </td>
    </tr>
    @endforeach
</table>

<!-- old('nome') - Busca o parâmetro da requisição antiga (anterior) para exibir o nome do produto adicionado (caso houver.) -->
@if(old('nome'))
    <p class="alert alert-success">Produto {{old('nome')}} adicionado</p>
@endif

@stop