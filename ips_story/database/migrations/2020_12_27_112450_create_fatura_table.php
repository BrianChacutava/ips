<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fatura', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_fatura', 45)->nullable();
            $table->unsignedInteger('empresa_id')->index('fk_fatura_empresa1_idx');
            $table->unsignedInteger('cliente_id')->index('fk_fatura_cliente1_idx');
            $table->string('estado_pagamento', 45)->nullable();
            $table->unsignedInteger('moeda_id')->nullable()->index('fk_fatura_moeda1_idx');
            $table->date('data_vencimento')->nullable();
            $table->unsignedInteger('regime_pagamento_id')->nullable()->index('fk_fatura_regime_pagamento1_idx');
            $table->unsignedInteger('funcionario_id')->index('fk_fatura_funcionario1_idx');
            $table->integer('taxa')->nullable();
            $table->double('Incidencia')->nullable();
            $table->double('total_iva')->nullable();
            $table->double('total')->nullable();
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
        Schema::dropIfExists('fatura');
    }
}
