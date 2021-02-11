<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmazemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armazem', function (Blueprint $table) {
            $table->increments('id');
            $table->string('armazem', 45)->nullable();
            $table->string('descricao', 100)->nullable();
            $table->tinyInteger('permitir_entrada_material')->nullable();
            $table->tinyInteger('permitir_saida_material')->nullable();
            $table->unsignedInteger('endereco_id')->nullable()->index('fk_armazem_endereco1_idx');
            $table->unsignedInteger('empresa_id')->nullable()->index('fk_armazem_empresa1_idx');
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
        Schema::dropIfExists('armazem');
    }
}
