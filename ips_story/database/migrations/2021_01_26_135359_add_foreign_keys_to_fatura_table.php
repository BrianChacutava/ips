<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fatura', function (Blueprint $table) {
            $table->foreign('cliente_id', 'fk_fatura_cliente1')->references('id')->on('cliente')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('empresa_id', 'fk_fatura_empresa1')->references('id')->on('empresa')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('funcionario_id', 'fk_fatura_funcionario1')->references('id')->on('funcionario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('moeda_id', 'fk_fatura_moeda1')->references('id')->on('moeda')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('regime_pagamento_id', 'fk_fatura_regime_pagamento1')->references('id')->on('regime_pagamento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fatura', function (Blueprint $table) {
            $table->dropForeign('fk_fatura_cliente1');
            $table->dropForeign('fk_fatura_empresa1');
            $table->dropForeign('fk_fatura_funcionario1');
            $table->dropForeign('fk_fatura_moeda1');
            $table->dropForeign('fk_fatura_regime_pagamento1');
        });
    }
}
