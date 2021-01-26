<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100)->nullable();
            $table->string('sigla', 45)->nullable();
            $table->integer('nuit')->nullable();
            $table->string('telefone', 15)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('foto', 100)->nullable();
            $table->unsignedInteger('endereco_id')->nullable()->index('fk_cliente_endereco1_idx');
            $table->unsignedInteger('Regime_iva_id')->nullable()->index('fk_cliente_Regime_iva1_idx');
            $table->unsignedInteger('regime_pagamento_id')->nullable()->index('fk_cliente_regime_pagamento1_idx');
            $table->unsignedInteger('metode_pagamento_id')->nullable()->index('fk_cliente_metode_pagamento1_idx');
            $table->unsignedInteger('moeda_id')->nullable()->index('fk_cliente_moeda1_idx');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('gupo_cliente_id')->nullable()->index('fk_cliente_gupo_cliente1_idx');
            $table->tinyInteger('blokeado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
