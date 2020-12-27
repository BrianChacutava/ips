<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('artigo', 45)->nullable();
            $table->string('descricao', 45)->nullable();
            $table->string('unidade_base', 45)->nullable();
            $table->string('tipo_artigo', 45)->nullable();
            $table->string('foto', 100)->nullable();
            $table->string('marca', 45)->nullable();
            $table->string('modelo_marca', 45)->nullable();
            $table->string('codigo_barras', 45)->nullable();
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
        Schema::dropIfExists('artigo');
    }
}
