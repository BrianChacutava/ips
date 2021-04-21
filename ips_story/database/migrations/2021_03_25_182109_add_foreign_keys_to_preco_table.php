<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPrecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preco', function (Blueprint $table) {
            $table->foreign('artigo_id', 'fk_preco_artigo1')->references('id')->on('artigo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('grupo_preco_id', 'fk_preco_grupo_preco1')->references('id')->on('grupo_preco')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preco', function (Blueprint $table) {
            $table->dropForeign('fk_preco_artigo1');
            $table->dropForeign('fk_preco_grupo_preco1');
        });
    }
}
