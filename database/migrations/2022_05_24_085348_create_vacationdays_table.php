<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacationdaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacationdays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('inicio')->nullable();
            $table->date('final')->nullable();
            $table->integer('disponibles')->nullable();
            $table->string('status',5)->nullable();
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
        Schema::dropIfExists('vacationdays');
    }
}

