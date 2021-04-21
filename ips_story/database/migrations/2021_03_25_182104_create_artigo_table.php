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
            $table->unsignedInteger('tipo_artigo_id')->index('fk_artigo_tipo_artigo1_idx');
            $table->string('foto', 100)->nullable();
            $table->unsignedInteger('unidade_base_id')->index('fk_artigo_unidade_base1_idx');
            $table->string('marca', 45)->nullable();
            $table->string('modelo_marca', 45)->nullable();
            $table->string('codigo_barras', 45)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('conta_rendimento_id')->nullable()->index('fk_artigo_conta_rendimento1_idx');
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
