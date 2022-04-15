<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     *
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->Increments('id_paciente');
            $table->string('sus',20);
            $table->string('nome_paciente',70);
            $table->string('rg_paciente',9);
            $table->string('cpf_paciente',11);
            $table->date('datanascimento_paciente');
            $table->string('nome_pai_paciente',70);
            $table->string('nome_mae_paciente',70);
            $table->string('sexo_paciente',01);
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
        Schema::dropIfExists('pacientes');
    }
}

