<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotacaoHasArtigo1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_has_artigo1', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cotacao_id')->index('fk_cotacao_has_artigo1_cotacao1_idx');
            $table->unsignedInteger('artigo_id')->index('fk_cotacao_has_artigo1_artigo1_idx');
            $table->float('preco', 10, 0)->nullable();
            $table->integer('quantidade')->nullable();
            $table->float('desconto', 10, 0)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->float('total', 10, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotacao_has_artigo1');
    }
}
