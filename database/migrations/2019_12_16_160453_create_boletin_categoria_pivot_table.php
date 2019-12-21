<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletinCategoriaPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletin_categoria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('boletin_id');
            $table->unsignedBigInteger('categoria_id');
            $table->string('observacion')->nullable();
            // $table->timestamps();
            $table->index('boletin_id');
            $table->index('categoria_id');

            $table->foreign('boletin_id')->references('id')->on('boletines');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boletin_categoria');
    }
}
