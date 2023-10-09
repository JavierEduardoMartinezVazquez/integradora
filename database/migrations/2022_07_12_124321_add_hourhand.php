<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddHourhand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('hourhand')->insert(array(
            'entrada' => '08:30:00',
            'salida' => '05:30:00',
            'status' => 'ALTA',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('hourhand')->insert(array(
            'entrada' => '08:30:00',
            'salida' => '05:30:00',
            'status' => 'ALTA',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
