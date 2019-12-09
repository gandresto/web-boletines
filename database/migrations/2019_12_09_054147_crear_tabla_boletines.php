<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaBoletines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('num_boletin')->nullable();
            $table->date('fecha');
            $table->string('localidad')->nullable();
            $table->string('estado');
            $table->string('encabezado');
            $table->text('primer_parrafo');
            $table->text('url')->nullable();
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
        Schema::dropIfExists('boletines');
    }
}
