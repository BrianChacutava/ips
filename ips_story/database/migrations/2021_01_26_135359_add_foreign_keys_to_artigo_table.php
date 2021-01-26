<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToArtigoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artigo', function (Blueprint $table) {
            $table->foreign('conta de rendimento_id', 'fk_artigo_conta de rendimento1')->references('id')->on('conta de rendimento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('tipo_artigo_id', 'fk_artigo_tipo_artigo1')->references('id')->on('tipo_artigo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('unidade_base_id', 'fk_artigo_unidade_base1')->references('id')->on('unidade_base')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artigo', function (Blueprint $table) {
            $table->dropForeign('fk_artigo_conta de rendimento1');
            $table->dropForeign('fk_artigo_tipo_artigo1');
            $table->dropForeign('fk_artigo_unidade_base1');
        });
    }
}
