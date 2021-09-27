<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatSubAreasOcupacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_sub_areas_ocupaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('id_empresa');
            $table->integer('id_cat_area_ocupacion');
            $table->string('nombre');
            $table->string('codigo_sub_area');
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
        Schema::dropIfExists('cat_sub_areas_ocupaciones');
    }
}
