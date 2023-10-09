<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',40)->nullable();
            $table->string('lastname_p',20)->nullable();
            $table->string('lastname_m',20)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nss')->nullable();
            $table->string('tel')->nullable();
            $table->string('curp')->nullable();
            $table->string('rfc')->nullable();
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->string('puesto', 20)->nullable();
            $table->date('ingreso')->nullable();
            $table->time('horariolv_id')->nullable();
            $table->time('horariosab_id')->nullable();
            $table->integer('diasvacaciones')->nullable();
            $table->string('rol')->nullable();
            $table->string('status',5)->nullable();
            $table->string('foto')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('empresa_id')
            ->references('id')
            ->on('business')
            ->onDelete('set null');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
