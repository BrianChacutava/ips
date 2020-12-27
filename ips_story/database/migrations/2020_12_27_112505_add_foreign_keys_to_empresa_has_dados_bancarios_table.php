<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEmpresaHasDadosBancariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresa_has_dados_bancarios', function (Blueprint $table) {
            $table->foreign('dados_bancarios_id', 'fk_empresa_has_dados_bancarios_dados_bancarios1_idx')->references('id')->on('dados_bancarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('empresa_id', 'fk_empresa_has_dados_bancarios_empresa1_idx')->references('id')->on('empresa')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresa_has_dados_bancarios', function (Blueprint $table) {
            $table->dropForeign('fk_empresa_has_dados_bancarios_dados_bancarios1_idx');
            $table->dropForeign('fk_empresa_has_dados_bancarios_empresa1_idx');
        });
    }
}
