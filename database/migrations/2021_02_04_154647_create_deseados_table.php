<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeseadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deseados', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('iduser')->unsigned();
            $table->bigInteger('idproducto')->unsigned();
            
            $table->timestamps();
            
            $table->foreign('iduser')->references ('id')->on('users');
            $table->foreign('idproducto')->references ('id')->on('producto');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deseados');
    }
}



    