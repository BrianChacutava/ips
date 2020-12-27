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
            $table->foreign('endereco_id', 'fk_cliente_endereco1_idx')->references('id')->on('endereco')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('gupo_cliente_id', 'fk_cliente_gupo_cliente1_idx')->references('id')->on('gupo_cliente')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('moeda_id', 'fk_cliente_moeda1_idx')->references('id')->on('moeda')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_cliente_endereco1_idx');
            $table->dropForeign('fk_cliente_gupo_cliente1_idx');
            $table->dropForeign('fk_cliente_moeda1_idx');
        });
    }
}
