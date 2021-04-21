<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCotacaoHasArtigo1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotacao_has_artigo1', function (Blueprint $table) {
            $table->foreign('artigo_id', 'fk_cotacao_has_artigo1_artigo1')->references('id')->on('artigo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('cotacao_id', 'fk_cotacao_has_artigo1_cotacao1')->references('id')->on('cotacao')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotacao_has_artigo1', function (Blueprint $table) {
            $table->dropForeign('fk_cotacao_has_artigo1_artigo1');
            $table->dropForeign('fk_cotacao_has_artigo1_cotacao1');
        });
    }
}
