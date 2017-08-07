<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Liegenschaften extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liegenschaften', function (Blueprint $table) {
            $table->increments('liegenschaftID');
            $table->string('name');
            $table->string('strasse');
            $table->integer('plz');
            $table->string('ort');
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
        Schema::dropIfExists('liegenschaften');
    
    }
}
