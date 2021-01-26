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
            $table->string('numero_conta', 50)->nullable();
            $table->string('nib', 45)->nullable();
            $table->unsignedInteger('moeda_id')->nullable()->index('fk_dados_bancarios_moeda1_idx');
            $table->integer('nuit')->nullable();
            $table->string('telefone', 15)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('foto', 100)->nullable();
            $table->unsignedInteger('endereco_id')->nullable()->index('fk_dados_bancarios_endereco1_idx');
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
        Schema::dropIfExists('dados_bancarios');
    }
}
