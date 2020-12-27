<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomicilioAtividadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilio_atividade', function (Blueprint $table) {
            $table->increments('id');
            $table->string('telemovel', 45)->nullable();
            $table->string('tel_fixo', 45)->nullable();
            $table->string('fax', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('email_alternativo', 45)->nullable();
            $table->unsignedInteger('endereco_id')->index('fk_domicilio_atividade_endereco1_idx');
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
        Schema::dropIfExists('domicilio_atividade');
    }
}
