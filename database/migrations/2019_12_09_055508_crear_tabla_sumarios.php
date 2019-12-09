<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSumarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sumarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('texto');
            $table->timestamps();
            $table->unsignedBigInteger('boletin_id');

            $table->index('boletin_id');
            $table->foreign('boletin_id')
                    ->references('id')->on('boletines')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sumarios');
    }
}
