<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotacaoHasArtigoHasPrecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_has_artigo_has_preco', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cotacao_id')->index('fk_cotacao_has_artigo_has_preco_cotacao1_idx');
            $table->unsignedInteger('artigo_has_preco_id')->index('fk_cotacao_has_artigo_has_preco_artigo_has_preco1_idx');
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
        Schema::dropIfExists('cotacao_has_artigo_has_preco');
    }
}
