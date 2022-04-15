<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuxilioBrasilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auxilio_brasils', function (Blueprint $table) {
            $table->increments('id_auxilio_brasil');
            $table->integer('id_paciente_fk')->unsigned();
            $table->foreign('id_paciente_fk')->references('id_paciente')->on('pacientes')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('peso',10);
            $table->string('altura',10);
            $table->string('gestante',03);
            $table->date('dum');
            $table->string('vacinas_em_dia',03);
            $table->string('vacina_pendente',70);
            $table->integer('quantidade_dependente');
            $table->date('data_pesagem');
            $table->date('proxima_pesagem');
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
        Schema::dropIfExists('auxilio_brasil');
    }
}
