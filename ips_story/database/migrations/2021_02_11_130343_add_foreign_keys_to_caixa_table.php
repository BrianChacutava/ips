<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCaixaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caixa', function (Blueprint $table) {
            $table->foreign('dados_bancarios_id', 'fk_caixa_dados_bancarios1')->references('id')->on('dados_bancarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caixa', function (Blueprint $table) {
            $table->dropForeign('fk_caixa_dados_bancarios1');
        });
    }
}
