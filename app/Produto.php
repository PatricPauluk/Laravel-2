<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // Criado através de: php artisan make:model Produto
    // Segundo umas informações que encontrei, o Laravel é esperto o suficiente para buscar a tabela "produtos", já que eu informei o nome da classe como "Produto". Tenho que adimitir que isso me deixou perplexo. Por padrão, o Eloquent sabe que a sua tabela tem o nome com a primeira letra minuscula, e no plural. Apesar disso ser super prático, pode-se alterar o nome da tabela buscada, caso necessário, através de:
    // protected $table = 'nome_aqui';
    
    // Para ignorar o erro da falta das colunas 'updated_at' e 'created_at'.
    public $timestamps = false;
    
    // Filtrar para apenas os valores que devem ser recebidos em um cadastro.
    protected $fillable = array('nome', 'descricao', 'quantidade', 'valor', 'tamanho', 'categoria_id');
    
    // Adiciona uma categoria ao produto adicionado
    public function categoria(){
        return $this->belongsTo('estoque\Categoria');
    }
}
