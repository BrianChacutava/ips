<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProvinciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provincia', function (Blueprint $table) {
            $table->foreign('pais_id', 'fk_provincia_pais_idx')->references('id')->on('pais')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provincia', function (Blueprint $table) {
            $table->dropForeign('fk_provincia_pais_idx');
        });
    }
}
