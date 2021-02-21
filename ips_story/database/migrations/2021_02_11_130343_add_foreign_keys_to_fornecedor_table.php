<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFornecedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fornecedor', function (Blueprint $table) {
            $table->foreign('Regime_iva_id', 'fk_fornecedor_Regime_iva1')->references('id')->on('regime_iva')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('endereco_id', 'fk_fornecedor_endereco1')->references('id')->on('endereco')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('gupo_fornecedor_id', 'fk_fornecedor_gupo_fornecedor1')->references('id')->on('gupo_fornecedor')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('metode_pagamento_id', 'fk_fornecedor_metode_pagamento1')->references('id')->on('metode_pagamento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('regime_pagamento_id', 'fk_fornecedor_regime_pagamento1')->references('id')->on('regime_pagamento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedor', function (Blueprint $table) {
            $table->dropForeign('fk_fornecedor_Regime_iva1');
            $table->dropForeign('fk_fornecedor_endereco1');
            $table->dropForeign('fk_fornecedor_gupo_fornecedor1');
            $table->dropForeign('fk_fornecedor_metode_pagamento1');
            $table->dropForeign('fk_fornecedor_regime_pagamento1');
        });
    }
}
