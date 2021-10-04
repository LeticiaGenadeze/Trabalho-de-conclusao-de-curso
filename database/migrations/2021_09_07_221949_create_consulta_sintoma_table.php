<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaSintomaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_sintoma', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consulta_id')->constrained('consultas');               
            $table->foreignId('sintoma_id')->constrained('sintomas');                       
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
        Schema::dropIfExists('consulta_sintoma');
    }
}
