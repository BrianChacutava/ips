<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preco', function (Blueprint $table) {
            $table->increments('id');
            $table->float('preco', 10, 0)->nullable();
            $table->unsignedInteger('grupo_preco_id')->nullable()->index('fk_preco_grupo_preco1_idx');
            $table->unsignedInteger('artigo_id')->nullable()->index('fk_preco_artigo1_idx');
            $table->float('quantidade', 10, 0)->nullable();
            $table->tinyInteger('ativo')->nullable();
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
        Schema::dropIfExists('preco');
    }
}
