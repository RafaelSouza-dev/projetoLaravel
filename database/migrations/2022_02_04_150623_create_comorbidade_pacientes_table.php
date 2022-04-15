<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComorbidadePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comorbidade_pacientes', function (Blueprint $table) {
            $table->increments('id_comorbidade_pacientes');
            $table->integer('id_paciente_fk')->unsigned();
            $table->foreign('id_paciente_fk')->references('id_paciente')->on('pacientes')->onUpdate('cascade');
            $table->integer('id_comorbidade_fk')->unsigned();
            $table->foreign('id_comorbidade_fk')->references('id_comorbidade')->on('comorbidades')->onUpdate('cascade');
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
        Schema::dropIfExists('comorbidade_pacientes');
    }
}
