<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotacaoHasArtigoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_has_artigo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cotacao_id')->index('fk_cotacao_has_artigo_has_preco_cotacao1_idx');
            $table->unsignedInteger('artigo_id')->index('fk_cotacao_has_artigo_has_preco_artigo1_idx');
            $table->float('preço', 10, 0)->nullable();
            $table->float('quantidade', 10, 0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotacao_has_artigo');
    }
}
