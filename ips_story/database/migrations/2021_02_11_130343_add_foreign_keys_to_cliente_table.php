<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cliente', function (Blueprint $table) {
            $table->foreign('Regime_iva_id', 'fk_cliente_Regime_iva1')->references('id')->on('regime_iva')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('endereco_id', 'fk_cliente_endereco')->references('id')->on('endereco')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('gupo_cliente_id', 'fk_cliente_gupo_cliente')->references('id')->on('gupo_cliente')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('metode_pagamento_id', 'fk_cliente_metode_pagamento1')->references('id')->on('metode_pagamento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('moeda_id', 'fk_cliente_moeda')->references('id')->on('moeda')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('regime_pagamento_id', 'fk_cliente_regime_pagamento1')->references('id')->on('regime_pagamento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cliente', function (Blueprint $table) {
            $table->dropForeign('fk_cliente_Regime_iva1');
            $table->dropForeign('fk_cliente_endereco');
            $table->dropForeign('fk_cliente_gupo_cliente');
            $table->dropForeign('fk_cliente_metode_pagamento1');
            $table->dropForeign('fk_cliente_moeda');
            $table->dropForeign('fk_cliente_regime_pagamento1');
        });
    }
}
