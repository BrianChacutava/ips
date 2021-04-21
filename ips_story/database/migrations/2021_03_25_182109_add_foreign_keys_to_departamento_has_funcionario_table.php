<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDepartamentoHasFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departamento_has_funcionario', function (Blueprint $table) {
            $table->foreign('departamento_id', 'fk_departamento_has_funcionario_departamento1')->references('id')->on('departamento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('funcionario_id', 'fk_departamento_has_funcionario_funcionario1')->references('id')->on('funcionario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departamento_has_funcionario', function (Blueprint $table) {
            $table->dropForeign('fk_departamento_has_funcionario_departamento1');
            $table->dropForeign('fk_departamento_has_funcionario_funcionario1');
        });
    }
}
