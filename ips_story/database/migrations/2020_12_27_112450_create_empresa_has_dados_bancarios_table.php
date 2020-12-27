<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaHasDadosBancariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_has_dados_bancarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empresa_id')->index('fk_empresa_has_dados_bancarios_empresa1_idx');
            $table->unsignedInteger('dados_bancarios_id')->index('fk_empresa_has_dados_bancarios_dados_bancarios1_idx');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa_has_dados_bancarios');
    }
}
