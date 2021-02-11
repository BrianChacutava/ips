<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_proprietario', 45)->nullable();
            $table->string('nome_comercial', 45)->nullable();
            $table->string('slogan', 45)->nullable();
            $table->string('nuit', 45)->nullable();
            $table->unsignedInteger('tipo_estabelecimento_id')->index('fk_empresa_tipo_estabelecimento1_idx');
            $table->unsignedInteger('domicilio_atividade_id')->index('fk_empresa_domicilio_atividade1_idx');
            $table->string('atividade_principal', 100)->nullable();
            $table->string('outras_atividades', 45)->nullable();
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
        Schema::dropIfExists('empresa');
    }
}
