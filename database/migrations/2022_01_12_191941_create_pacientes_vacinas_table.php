<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesVacinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_vacinas', function (Blueprint $table) {
            $table->increments('id_pacientes_vacinas');
            $table->integer('id_paciente_fk')->unsigned();
            $table->integer('id_vacina_fk')->unsigned();
            $table->foreign('id_paciente_fk')->references('id_paciente')->on('pacientes')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_vacina_fk')->references('id_vacina')->on('vacinas')->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('pacientes_vacinas');
    }
}
