<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissionalSaudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissional_saudes', function (Blueprint $table) {
            $table->Increments('id_profissional_saude');
            $table->string('nome_do_profissional',70);
            $table->string('cargo',70);
            $table->string('registro_do_profissional',15);
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
        Schema::dropIfExists('profissional_saudes');
    }
}
