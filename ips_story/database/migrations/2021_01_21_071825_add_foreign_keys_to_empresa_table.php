<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresa', function (Blueprint $table) {
            $table->foreign('domicilio_atividade_id', 'fk_empresa_domicilio_atividade1')->references('id')->on('domicilio_atividade')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('tipo_estabelecimento_id', 'fk_empresa_tipo_estabelecimento1')->references('id')->on('tipo_estabelecimento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresa', function (Blueprint $table) {
            $table->dropForeign('fk_empresa_domicilio_atividade1');
            $table->dropForeign('fk_empresa_tipo_estabelecimento1');
        });
    }
}
