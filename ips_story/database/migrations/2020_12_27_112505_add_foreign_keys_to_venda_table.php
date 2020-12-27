<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('venda', function (Blueprint $table) {
            $table->foreign('Regime_iva_id', 'fk_venda_Regime_iva1_idx')->references('id')->on('regime_iva')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('cliente_id', 'fk_venda_cliente1_idx')->references('id')->on('cliente')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('funcionario_id', 'fk_venda_funcionario1_idx')->references('id')->on('funcionario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('metode_pagamento_id', 'fk_venda_metode_pagamento1_idx')->references('id')->on('metode_pagamento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('regime_pagamento_id', 'fk_venda_regime_pagamento1_idx')->references('id')->on('regime_pagamento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('venda', function (Blueprint $table) {
            $table->dropForeign('fk_venda_Regime_iva1_idx');
            $table->dropForeign('fk_venda_cliente1_idx');
            $table->dropForeign('fk_venda_funcionario1_idx');
            $table->dropForeign('fk_venda_metode_pagamento1_idx');
            $table->dropForeign('fk_venda_regime_pagamento1_idx');
        });
    }
}
