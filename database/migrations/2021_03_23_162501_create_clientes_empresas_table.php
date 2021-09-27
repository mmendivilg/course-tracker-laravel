<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_empresas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_empresa');
            $table->string('nombre');
            $table->string('rfc')->nullable();
            $table->string('registro_imss')->nullable();
            $table->string('calle')->nullable();
            $table->string('numero')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('estado')->nullable();
            $table->string('pais')->nullable();
            $table->string('contacto')->nullable();
            $table->integer('id_cat_empresa_giro')->nullable();
            $table->integer('id_logotipo')->nullable();
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
        Schema::dropIfExists('clientes_empresas');
    }
}
