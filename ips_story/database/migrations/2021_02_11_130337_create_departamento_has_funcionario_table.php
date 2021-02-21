<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentoHasFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento_has_funcionario', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('departamento_id')->index('fk_departamento_has_funcionario_departamento1_idx');
            $table->unsignedInteger('funcionario_id')->index('fk_departamento_has_funcionario_funcionario1_idx');
            $table->string('descricao', 45)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamento_has_funcionario');
    }
}
