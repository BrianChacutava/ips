<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToArmazemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('armazem', function (Blueprint $table) {
            $table->foreign('empresa_id', 'fk_armazem_empresa1')->references('id')->on('empresa')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('endereco_id', 'fk_armazem_endereco1')->references('id')->on('endereco')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('armazem', function (Blueprint $table) {
            $table->dropForeign('fk_armazem_empresa1');
            $table->dropForeign('fk_armazem_endereco1');
        });
    }
}
