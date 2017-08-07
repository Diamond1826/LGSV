<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServiceLiegenschaften extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceLiegenschaften', function (Blueprint $table) {
            $table->integer('serviceID');
            $table->integer('liegenschaftID');
            $table->string('firma');
            $table->string('strasse');
            $table->string('plz');
            $table->string('ort');
            $table->string('tel');
            $table->string('ansprechsperson');
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
        Schema::dropIfExists('serviceLiegenschaften');
    
    }
}
