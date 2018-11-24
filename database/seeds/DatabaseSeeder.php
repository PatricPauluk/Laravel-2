<?php

use Illuminate\Database\Seeder;
use estoque\Categoria;

/**
 * Classe seeder, dedicada a preencher valores no banco de dados para testes, como produtos, usuários, etc.
 * Normalmente não deve ser utilizada para o usuário final, apenas para ambientes de desenvolvimento.
 * 
 * Para executar um seeder, inserir no terminal:
 * php artisan db:seed
 * 
 * Para executar um seeder (uma classe), em específico:
 * php artisan db:seed --class=NomeTableSeeder
 */

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        /**
         * Chama a classe que executa o seed para o banco de dados.
         * $this->call(UsersTableSeeder::class);
         */
        $this->call('CategoriaTableSeeder');
    }
}

/**
 * É comum que a classe de seeder conste no mesmo arquivo como no exemplo abaixo, porém, caso o código seja muito
 * extenso, é certo criar arquivos separados para organização.
 */

// Classe responsável pela inserção de valores no banco de dados.
class CategoriaTableSeeder extends Seeder
{
    public function run()
    {
        // Insere um valor na coluna 'nome' da tabela 'categorias'.
        Categoria::create(['nome' => 'Brinquedo']);
        Categoria::create(['nome' => 'Esporte']);
        Categoria::create(['nome' => 'Musica']);
        Categoria::create(['nome' => 'Tecnologia']);
    }
}