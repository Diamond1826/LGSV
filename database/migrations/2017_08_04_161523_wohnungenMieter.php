<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WohnungenMieter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wohnungenMieter', function (Blueprint $table) {
            $table->integer('wohnungsID');
            $table->integer('mieterID');
            $table->timestamps();
            $table->foreign('wohnungsID')->references('wohnungsID')->on('wohnungen');
            $table->foreign('mieterID')->references('mieterID')->on('mieter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wohnungenMieter');
    
    }
}
