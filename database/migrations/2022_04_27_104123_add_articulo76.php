<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class AddArticulo76 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('articulo76')->insert(array(
            'years' => '1',
            'days' => '6',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('articulo76')->insert(array(
            'years' => '2',
            'days' => '8',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('articulo76')->insert(array(
            'years' => '3',
            'days' => '10',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('articulo76')->insert(array(
            'years' => '4',
            'days' => '12',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('articulo76')->insert(array(
            'years' => '5 a 9',
            'days' => '14',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('articulo76')->insert(array(
            'years' => '10 a 14',
            'days' => '16',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('articulo76')->insert(array(
            'years' => '15 a 19',
            'days' => '18',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('articulo76')->insert(array(
            'years' => '20 a 24',
            'days' => '20',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('articulo76')->insert(array(
            'years' => '25 a 29',
            'days' => '22',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('articulo76')->insert(array(
            'years' => '30 a 34',
            'days' => '24',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('articulo76')->insert(array(
            'years' => '35 a 39',
            'days' => '26',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('articulo76')->insert(array(
            'years' => '40 a 44',
            'days' => '28',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('articulo76')->insert(array(
            'years' => '45 a 49',
            'days' => '30',
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
