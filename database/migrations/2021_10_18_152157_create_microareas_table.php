<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicroareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microareas', function (Blueprint $table) {
            $table->Increments('id_microarea');
            $table->integer('id_paciente_fk')->unsigned();
            //$table->integer('id_fk')->unsigned();
            $table->foreign('id_paciente_fk')->references('id_paciente')->on('pacientes')->onUpdate('cascade')
            ->onDelete('cascade');
            /*$table->foreign('id_fk')->references('id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');*/
            $table->string('microarea',15);
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
        Schema::dropIfExists('microareas');
    }
}
