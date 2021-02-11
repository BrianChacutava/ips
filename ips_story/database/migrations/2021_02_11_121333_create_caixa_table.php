<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaixaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caixa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 45)->nullable();
            $table->string('iban', 45)->nullable();
            $table->string('swift', 45)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('dados_bancarios_id')->nullable()->index('fk_caixa_dados_bancarios1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caixa');
    }
}
