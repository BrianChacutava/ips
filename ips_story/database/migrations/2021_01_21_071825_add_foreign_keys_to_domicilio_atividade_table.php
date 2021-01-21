<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDomicilioAtividadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domicilio_atividade', function (Blueprint $table) {
            $table->foreign('endereco_id', 'fk_domicilio_atividade_endereco1')->references('id')->on('endereco')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domicilio_atividade', function (Blueprint $table) {
            $table->dropForeign('fk_domicilio_atividade_endereco1');
        });
    }
}
