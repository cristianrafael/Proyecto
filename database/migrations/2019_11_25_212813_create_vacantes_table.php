<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacantes', function (Blueprint $table) 
        {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('sueldo');
            $table->string('ubicacion');
            $table->longText('descripcion_puesto');
            $table->integer('no_vacantes')->unsigned()->default(1);
            $table->string('horario');
            $table->string('experiencia');
            $table->boolean('dis_viajar')->default(0);
            $table->boolean('dis_reubicarse')->default(0);


            //Eliminacion logica
            $table->softDeletes();

            //Timestamps
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
        Schema::dropIfExists('vacantes');
    }
}
