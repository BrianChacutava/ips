<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToArmazemHasArtigoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('armazem_has_artigo', function (Blueprint $table) {
            $table->foreign('armazem_id', 'fk_armazem_has_artigo_armazem1')->references('id')->on('armazem')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('artigo_id', 'fk_armazem_has_artigo_artigo1')->references('id')->on('artigo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('armazem_has_artigo', function (Blueprint $table) {
            $table->dropForeign('fk_armazem_has_artigo_armazem1');
            $table->dropForeign('fk_armazem_has_artigo_artigo1');
        });
    }
}
