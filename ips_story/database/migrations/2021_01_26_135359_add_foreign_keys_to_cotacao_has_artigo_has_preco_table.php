<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCotacaoHasArtigoHasPrecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotacao_has_artigo_has_preco', function (Blueprint $table) {
            $table->foreign('artigo_has_preco_id', 'fk_cotacao_has_artigo_has_preco_artigo_has_preco1')->references('id')->on('artigo_has_preco')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('cotacao_id', 'fk_cotacao_has_artigo_has_preco_cotacao1')->references('id')->on('cotacao')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotacao_has_artigo_has_preco', function (Blueprint $table) {
            $table->dropForeign('fk_cotacao_has_artigo_has_preco_artigo_has_preco1');
            $table->dropForeign('fk_cotacao_has_artigo_has_preco_cotacao1');
        });
    }
}
