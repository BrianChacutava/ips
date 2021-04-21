<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigoHasVendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigo_has_venda', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('artigo_id')->index('fk_artigo_has_venda_artigo1_idx');
            $table->unsignedInteger('venda_id')->index('fk_artigo_has_venda_venda1_idx');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artigo_has_venda');
    }
}
