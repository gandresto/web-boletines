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
            $table->string('candidato', 6);
            $table->unsignedInteger('num_boletin')->nullable();
            $table->date('fecha');
            $table->string('localidad', 35)->nullable();
            $table->string('estado', 25);
            $table->string('encabezado');
            $table->text('primer_parrafo');
            $table->string('url')->nullable();
            // $table->timestamps();

            $table->index('candidato');
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
