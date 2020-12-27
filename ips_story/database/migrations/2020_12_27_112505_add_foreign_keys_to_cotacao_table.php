<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCotacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotacao', function (Blueprint $table) {
            $table->foreign('artigo_has_preco_id', 'fk_cotacao_artigo_has_preco1_idx')->references('id')->on('artigo_has_preco')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('cliente_id', 'fk_cotacao_cliente1_idx')->references('id')->on('cliente')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('empresa_id', 'fk_cotacao_empresa1_idx')->references('id')->on('empresa')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('funcionario_id', 'fk_cotacao_funcionario1_idx')->references('id')->on('funcionario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('termo_pagamento_id', 'fk_cotacao_termo_pagamento1_idx')->references('id')->on('termo_pagamento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotacao', function (Blueprint $table) {
            $table->dropForeign('fk_cotacao_artigo_has_preco1_idx');
            $table->dropForeign('fk_cotacao_cliente1_idx');
            $table->dropForeign('fk_cotacao_empresa1_idx');
            $table->dropForeign('fk_cotacao_funcionario1_idx');
            $table->dropForeign('fk_cotacao_termo_pagamento1_idx');
        });
    }
}
