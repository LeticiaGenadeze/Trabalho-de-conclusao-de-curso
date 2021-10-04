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
            $table->string('nome');
            $table->float('peso')->nullable();
            $table->float('altura')->nullable();
            $table->string('sexo')->nullable();
            $table->dateTime('dataDeNascimento')->nullable();
            $table->string('gravidezAmamentacao')->nullable();
            $table->string('intoleranciaAlimentar')->nullable();
            $table->string('dorInflamatoria')->nullable();
            $table->string('tempoDorCronica')->nullable();
            $table->string('usoDeCha')->nullable();
            $table->string('habitosAlimentares')->nullable();
            $table->string('consumoDeAgua')->nullable();
            $table->string('praticaExercicioFisico')->nullable();
            $table->string('usoDeMedicamento')->nullable();
            $table->string('consumoDeCha')->nullable();
            $table->string('fatoresDoCha')->nullable();          
            $table->string('status')->nullable();          
            $table->integer('user_id')->nullable();
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
