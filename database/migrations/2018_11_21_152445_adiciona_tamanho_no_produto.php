<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaTamanhoNoProduto extends Migration
{
    
    /**
     * Para criar uma migration, executar o código no terminal:
     * php artisan make:migration nome_migration
     * 
     * Para executar migration:
     * php artisan migrate
     * 
     * Para desfazer a ultima migração executada:
     * php artisan migrate:rollback
     */
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Metodo executado quando rodar as migrações.
        
        // Insere uma coluna na tabela produtos com o nome de tamanho.
        Schema::table('produtos', function($table){
            $table->string('tamanho', 100)->default('Sem tamanho');
            /**
             * // Exemplo de inserir um valor default:
             * $table->string('tamanho', 100)->default('Sem tamanho');
             */
        });
        
        /**
         * Exemplo:
         * 
         * // Criação de tabela 'nome_tabela':
         * Schema::create('nome_tabela', function(Blueprint $table)
         * {
         *     $table->increments('id'); // Coluna de auto-incremento ID
         *     $table->string('nome', 200); // Coluna string para nome, com o tamanho de 200 caracteres (opcional)
         *     $table->date('criadoEm'); // Coluna para data
         *     $table->timestamps(); // Cria colunas 'created_at' e 'updated_at'
         * });
         */
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Metodo executado para reverter as migrações
        
        /**
         * Exemplo de código para excluir uma tabela por completo:
         * Schema::drop('nome_tabela');
         */
        
        // Excluí a coluna 'tamanho' da tabela 'produtos'.
        Schema::table('produtos', function($table){
            $table->dropColumn('tamanho');
        });
    }
}
