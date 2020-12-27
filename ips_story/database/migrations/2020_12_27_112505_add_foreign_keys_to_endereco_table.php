<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('endereco', function (Blueprint $table) {
            $table->foreign('provincia_id', 'fk_endereco_provincia1_idx')->references('id')->on('provincia')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('endereco', function (Blueprint $table) {
            $table->dropForeign('fk_endereco_provincia1_idx');
        });
    }
}
