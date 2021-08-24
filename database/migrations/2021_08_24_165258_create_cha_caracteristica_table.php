<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaCaracteristicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cha_caracteristica', function (Blueprint $table) {
            $table->id();             
            $table->foreignId('cha_id')->constrained('chas');               
            $table->foreignId('caracteristica_id')->constrained('caracteristicas');                       
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
        Schema::dropIfExists('cha_caracteristica');
    }
}
