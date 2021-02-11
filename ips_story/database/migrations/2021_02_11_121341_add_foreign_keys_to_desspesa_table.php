<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDesspesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('desspesa', function (Blueprint $table) {
            $table->foreign('Regime_iva_id', 'fk_desspesa_Regime_iva1')->references('id')->on('regime_iva')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('caixa_id', 'fk_desspesa_caixa1')->references('id')->on('caixa')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('empresa_id', 'fk_desspesa_empresa1')->references('id')->on('empresa')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('fornecedor_id', 'fk_desspesa_fornecedor1')->references('id')->on('fornecedor')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('metode_pagamento_id', 'fk_desspesa_metode_pagamento1')->references('id')->on('metode_pagamento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('moeda_id', 'fk_desspesa_moeda1')->references('id')->on('moeda')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('tipo_despesa_id', 'fk_desspesa_tipo_despesa1')->references('id')->on('tipo_despesa')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('desspesa', function (Blueprint $table) {
            $table->dropForeign('fk_desspesa_Regime_iva1');
            $table->dropForeign('fk_desspesa_caixa1');
            $table->dropForeign('fk_desspesa_empresa1');
            $table->dropForeign('fk_desspesa_fornecedor1');
            $table->dropForeign('fk_desspesa_metode_pagamento1');
            $table->dropForeign('fk_desspesa_moeda1');
            $table->dropForeign('fk_desspesa_tipo_despesa1');
        });
    }
}
