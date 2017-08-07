<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Wohnungen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wohnungen', function (Blueprint $table) {
            $table->increments('wohnungsID');
            $table->string('name');
            $table->decimal('miete', 7, 2);
            $table->integer('liegenschaftID');
            $table->timestamps();
            $table->foreign('liegenschaftID')->references('liegenschaftID')->on('liegenschaften');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wohnungen');
    
    }
}
