<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mieter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mieter', function (Blueprint $table) {
            $table->increments('mieterID');
            $table->string('nachname');
            $table->string('vorname');
            $table->string('strasse');
            $table->integer('plz');
            $table->string('ort');
            $table->string('tel');
            $table->string('email');
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
        Schema::dropIfExists('mieter');
    
    }
}
