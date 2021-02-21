<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToArtigoHasVendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artigo_has_venda', function (Blueprint $table) {
            $table->foreign('artigo_id', 'fk_artigo_has_venda_artigo1')->references('id')->on('artigo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('venda_id', 'fk_artigo_has_venda_venda1')->references('id')->on('venda')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artigo_has_venda', function (Blueprint $table) {
            $table->dropForeign('fk_artigo_has_venda_artigo1');
            $table->dropForeign('fk_artigo_has_venda_venda1');
        });
    }
}
