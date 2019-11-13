<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('nombre');
            $table->integer('edad');
            $table->enum('genero', ['Hombre', 'Mujer']);
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('ciudad_id');
            $table->string('estado_civil');
            $table->string('telefono');
            $table->longText('descripcion_personal');
            $table->longText('descripcion_profesional');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('ciudad_id')->references('id')->on('ciudads')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatos');
    }
}
