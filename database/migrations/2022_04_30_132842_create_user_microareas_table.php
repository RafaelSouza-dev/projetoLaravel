<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMicroareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_microareas', function (Blueprint $table) {
            $table->increments('id_usermicroareas');
            $table->integer('id_user_fk')->unsigned();
            $table->foreign('id_user_fk')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('id_m_areas')->unsigned();
            $table->foreign('id_m_ares_fk')->references('id_m_areas')->on('m_areas')->onUpdate('cascade');
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
        Schema::dropIfExists('user_microareas');
    }
}
