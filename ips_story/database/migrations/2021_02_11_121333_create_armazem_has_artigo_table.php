<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmazemHasArtigoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armazem_has_artigo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('armazem_id')->nullable()->index('fk_armazem_has_artigo_armazem1_idx');
            $table->unsignedInteger('artigo_id')->nullable()->index('fk_armazem_has_artigo_artigo1_idx');
            $table->float('quantidade', 10, 0)->nullable();
            $table->float('valor_entrada', 10, 0)->nullable();
            $table->string('entrada', 45)->nullable();
            $table->string('saida', 45)->nullable();
            $table->float('stock_min', 10, 0)->nullable();
            $table->float('stock_max', 10, 0)->nullable();
            $table->double('saldo')->nullable();
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
        Schema::dropIfExists('armazem_has_artigo');
    }
}
