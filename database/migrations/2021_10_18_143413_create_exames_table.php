<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exames', function (Blueprint $table) {
            $table->increments('id_exame');
            $table->integer('id_paciente_fk')->unsigned();
            $table->foreign('id_paciente_fk')->references('id_paciente')->on('pacientes')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->date('data_exame_entrega');
            $table->string('tipo_exame');
            $table->string('entrega_pessoa_confiavel');
            $table->string('cpf_pessoa_confiavel');
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
        Schema::dropIfExists('exames');
    }
}
