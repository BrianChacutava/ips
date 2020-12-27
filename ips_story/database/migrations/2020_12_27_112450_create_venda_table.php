<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('Regime_iva_id')->index('fk_venda_Regime_iva1_idx');
            $table->unsignedInteger('metode_pagamento_id')->index('fk_venda_metode_pagamento1_idx');
            $table->unsignedInteger('regime_pagamento_id')->index('fk_venda_regime_pagamento1_idx');
            $table->unsignedInteger('cliente_id')->index('fk_venda_cliente1_idx');
            $table->double('valor_final', 8, 2)->nullable();
            $table->unsignedInteger('funcionario_id')->index('fk_venda_funcionario1_idx');
            $table->string('descricao', 45)->nullable();
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
        Schema::dropIfExists('venda');
    }
}
