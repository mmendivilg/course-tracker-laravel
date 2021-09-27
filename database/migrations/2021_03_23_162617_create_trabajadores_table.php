<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id();
            $table->integer('id_empresa');
            $table->integer('id_capacitacion');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('numero_colaborador')->nullable();
            $table->integer('aciertos')->nullable();
            $table->integer('preguntas')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('rfc')->nullable();
            $table->integer('id_cat_curso')->nullable();
            $table->integer('id_cat_departamento')->nullable();
            $table->integer('id_cat_puesto')->nullable();
            $table->integer('id_cat_sub_area_ocupacion')->nullable();
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
        Schema::dropIfExists('trabajadores');
    }
}
