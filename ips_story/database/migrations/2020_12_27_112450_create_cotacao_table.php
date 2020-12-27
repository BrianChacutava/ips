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
            $table->unsignedInteger('artigo_has_preco_id')->index('fk_cotacao_artigo_has_preco1_idx');
            $table->integer('quantidade')->nullable();
            $table->double('preco_unitario', 8, 2)->nullable();
            $table->double('desconto', 8, 2)->nullable();
            $table->double('subtotal', 8, 2)->nullable();
            $table->double('iva', 8, 2)->nullable();
            $table->double('total', 8, 2)->nullable();
            $table->string('estado', 45)->nullable();
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
        Schema::dropIfExists('cotacao');
    }
}
