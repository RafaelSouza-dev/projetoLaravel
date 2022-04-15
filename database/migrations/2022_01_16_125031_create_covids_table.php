<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covids', function (Blueprint $table) {
            $table->increments('id_covid');
            $table->integer('id_paciente_fk')->unsigned();
            $table->foreign('id_paciente_fk')->references('id_paciente')->on('pacientes')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('primeira_dose',50);
            $table->string('segunda_dose',50);
            $table->string('terceira_dose',50);
            $table->string('fez_teste',3);
            $table->string('resultado_teste',8);
            $table->date('data_testagem');
            $table->json('sintomas');
            $table->string('celular',14);
            $table->string('residencial',14);
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
        Schema::dropIfExists('covids');
    }
}
