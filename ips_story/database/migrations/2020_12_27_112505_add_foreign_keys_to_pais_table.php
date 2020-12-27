<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pais', function (Blueprint $table) {
            $table->foreign('moeda_id', 'fk_pais_moeda1_idx')->references('id')->on('moeda')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pais', function (Blueprint $table) {
            $table->dropForeign('fk_pais_moeda1_idx');
        });
    }
}
