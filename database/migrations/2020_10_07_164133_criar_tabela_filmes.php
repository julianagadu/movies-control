<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaFilmes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmes',function (Blueprint $table){
           $table -> increments('id');
           $table -> string('titulo');
           $table -> string('duracao');
           $table -> string('descricao');
           $table -> string('produtora');
           $table -> integer('anoLancamento');
           $table -> string('poster')->nullable();
           $table -> integer('categoria_id');

           $table -> foreign('categoria_id')->references('id')->on('categorias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('filmes');
    }
}
