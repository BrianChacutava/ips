<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesspesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desspesa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('referencia', 45)->nullable();
            $table->unsignedInteger('tipo_despesa_id')->nullable()->index('fk_desspesa_tipo_despesa1_idx');
            $table->tinyInteger('pago')->nullable();
            $table->float('taxa_cambio', 10, 0)->nullable();
            $table->string('observacao', 45)->nullable();
            $table->unsignedInteger('fornecedor_id')->nullable()->index('fk_desspesa_fornecedor1_idx');
            $table->unsignedInteger('moeda_id')->nullable()->index('fk_desspesa_moeda1_idx');
            $table->unsignedInteger('metode_pagamento_id')->nullable()->index('fk_desspesa_metode_pagamento1_idx');
            $table->unsignedInteger('caixa_id')->nullable()->index('fk_desspesa_caixa1_idx');
            $table->unsignedInteger('Regime_iva_id')->nullable()->index('fk_desspesa_Regime_iva1_idx');
            $table->unsignedInteger('empresa_id')->nullable()->index('fk_desspesa_empresa1_idx');
            $table->float('valor_total', 10, 0)->nullable();
            $table->unsignedInteger('funcionario_id')->nullable()->index('fk_desspesa_funcionario1_idx');
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
        Schema::dropIfExists('desspesa');
    }
}
