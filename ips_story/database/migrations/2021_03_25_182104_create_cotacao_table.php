<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('num_cotacao');
            $table->unsignedInteger('empresa_id')->index('fk_cotacao_empresa1_idx');
            $table->unsignedInteger('cliente_id')->index('fk_cotacao_cliente1_idx');
            $table->integer('validade')->nullable();
            $table->unsignedInteger('funcionario_id')->index('fk_cotacao_funcionario1_idx');
            $table->unsignedInteger('termo_pagamento_id')->index('fk_cotacao_termo_pagamento1_idx');
            $table->date('limite_pagamento')->nullable();
            $table->float('desconto', 10, 0)->nullable();
            $table->unsignedInteger('regime_pagamento_id')->index('fk_cotacao_regime_pagamento1_idx');
            $table->unsignedInteger('Regime_iva_id')->index('fk_cotacao_Regime_iva1_idx');
            $table->float('subtotal', 10, 0)->nullable();
            $table->float('iva', 10, 0)->nullable();
            $table->float('total', 10, 0)->nullable();
            $table->string('estado', 45)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('validado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotacao');
    }
}
