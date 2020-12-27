<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigoHasPrecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigo_has_preco', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('artigo_id')->index('fk_artigo_has_preco_artigo1_idx');
            $table->unsignedInteger('preco_id')->index('fk_artigo_has_preco_preco1_idx');
            $table->double('unidade_base', 8, 2)->nullable();
            $table->unsignedInteger('grupo_preco_id')->index('fk_artigo_has_preco_grupo_preco1_idx');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artigo_has_preco');
    }
}
