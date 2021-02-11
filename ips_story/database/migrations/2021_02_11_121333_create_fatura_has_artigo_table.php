<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaturaHasArtigoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fatura_has_artigo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fatura_id')->index('fk_fatura_has_artigo_fatura1_idx');
            $table->unsignedInteger('artigo_id')->index('fk_fatura_has_artigo_artigo1_idx');
            $table->integer('quantidade')->nullable();
            $table->float('desconto', 10, 0)->nullable();
            $table->float('valor', 10, 0)->nullable();
            $table->float('valor_iva', 10, 0)->nullable();
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
        Schema::dropIfExists('fatura_has_artigo');
    }
}
