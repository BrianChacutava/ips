<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadosBancariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_bancarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_banco', 45)->nullable();
            $table->integer('numero_conta')->nullable();
            $table->string('nib', 45)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('moeda_id')->nullable()->index('fk_dados_bancarios_moeda1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dados_bancarios');
    }
}
