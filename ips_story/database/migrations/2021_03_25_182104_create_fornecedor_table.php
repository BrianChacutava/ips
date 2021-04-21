<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nuit')->nullable();
            $table->string('nome', 100);
            $table->string('sigla', 45)->nullable();
            $table->string('telefone', 45)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('foto', 100)->nullable();
            $table->unsignedInteger('metode_pagamento_id')->nullable()->index('fk_fornecedor_metode_pagamento1_idx');
            $table->unsignedInteger('regime_pagamento_id')->nullable()->index('fk_fornecedor_regime_pagamento1_idx');
            $table->unsignedInteger('Regime_iva_id')->nullable()->index('fk_fornecedor_Regime_iva1_idx');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('endereco_id')->nullable()->index('fk_fornecedor_endereco1_idx');
            $table->unsignedInteger('gupo_fornecedor_id')->nullable()->index('fk_fornecedor_gupo_fornecedor1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedor');
    }
}
