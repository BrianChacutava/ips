<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFaturaHasArtigoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fatura_has_artigo', function (Blueprint $table) {
            $table->foreign('artigo_id', 'fk_fatura_has_artigo_artigo1_idx')->references('id')->on('artigo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('fatura_id', 'fk_fatura_has_artigo_fatura1_idx')->references('id')->on('fatura')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fatura_has_artigo', function (Blueprint $table) {
            $table->dropForeign('fk_fatura_has_artigo_artigo1_idx');
            $table->dropForeign('fk_fatura_has_artigo_fatura1_idx');
        });
    }
}
