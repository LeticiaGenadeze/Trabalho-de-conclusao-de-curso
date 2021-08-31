<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->date('dataConsulta');
            $table->float('peso');
            $table->float('altura');
            $table->string('gravidez');
            $table->string('amamentacao');
            $table->string('traumaEmocional');
            $table->string('intoleranciaAlimentar');
            $table->string('dorInflamatoria');
            $table->string('tempoDorCronica');
            $table->string('usoDeCha');
            $table->string('habitosAlimentares');
            $table->string('consumoDeAgua');
            $table->string('praticaExercicioFisico');
            $table->string('usoDeMedicamento');
            $table->string('consumoDeCha');
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
        Schema::dropIfExists('consultas');
    }
}
