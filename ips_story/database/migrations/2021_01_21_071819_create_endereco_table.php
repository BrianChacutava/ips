<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cod_postal')->nullable();
            $table->unsignedInteger('provincia_id')->index('fk_endereco_provincia1_idx');
            $table->string('rua', 45)->nullable();
            $table->string('av', 45)->nullable();
            $table->string('num_porta', 45)->nullable();
            $table->string('andar', 45)->nullable();
            $table->string('flat', 45)->nullable();
            $table->string('caixa_postal', 45)->nullable();
            $table->string('bairo', 45)->nullable();
            $table->tinyInteger('blockeado')->nullable();
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
        Schema::dropIfExists('endereco');
    }
}
