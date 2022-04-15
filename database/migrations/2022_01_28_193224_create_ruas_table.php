<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruas', function (Blueprint $table) {
            $table->increments('id_rua');
            $table->integer('id_microarea_fk')->unsigned();
            $table->foreign('id_microarea_fk')->references('id_m_areas')->on('m_areas')->onUpdate('cascade');
            $table->string('nome_rua',70);
            $table->string('nome_bairro',70);
            $table->string('cep',8);
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
        Schema::dropIfExists('ruas');
    }
}
