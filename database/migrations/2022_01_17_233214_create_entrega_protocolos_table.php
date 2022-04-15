<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregaProtocolosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_protocolos', function (Blueprint $table) {
            $table->increments('id_entrega');
            $table->integer('id_paciente_fk')->unsigned();
            $table->foreign('id_paciente_fk')->references('id_paciente')->on('pacientes')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('id_protocolo_fk')->unsigned();
            $table->foreign('id_protocolo_fk')->references('id_protocolo')->on('protocolos')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('tipo_documento',70);
            $table->date('data_entrega');
            $table->string('entrega_pessoa_confianca',3);
            $table->string('nome_pessoa_confianca',70);
            $table->string('rg_pessoa_confianca',9);
            $table->string('cpf_pessoa_confianca',11);
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
        Schema::dropIfExists('entrega_protocolos');
    }
}
