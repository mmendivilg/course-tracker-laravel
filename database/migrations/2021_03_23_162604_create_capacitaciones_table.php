<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacitaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('id_empresa');
            $table->date('fecha');
            $table->json('capacitadores')->nullable();
            $table->json('cursos_fechas')->nullable();
            $table->json('cursos_capacitadores')->nullable();
            $table->integer('id_cat_tipo_capacitacion')->nullable();
            $table->integer('id_cat_duracion')->nullable();
            $table->integer('id_cliente_empresa')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capacitaciones');
    }
}
