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
            $table->foreign('endereco_id', 'fk_fornecedor_endereco1_idx')->references('id')->on('endereco')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('gupo_fornecedor_id', 'fk_fornecedor_gupo_fornecedor1_idx')->references('id')->on('gupo_fornecedor')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_fornecedor_endereco1_idx');
            $table->dropForeign('fk_fornecedor_gupo_fornecedor1_idx');
        });
    }
}
