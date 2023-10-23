<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('productos')->insert(array(
            'producto' => 'Bolis Caja',
            'descripcionp' => 'Caja con 12 piezas de pasta tipo bolis',
            'fotografia' => 'control\img\bolis.jpg',
            'precio' => '250',
            'existencias' => '5',
            'status' => 'ALTA',
        ));
        DB::table('productos')->insert(array(
            'producto' => 'Kids Caja',
            'descripcionp' => 'Caja con 12 piezas de pasta tipo kids',
            'fotografia' => 'control\img\tallarin.jpg',
            'precio' => '250',
            'existencias' => '5',
            'status' => 'ALTA',
        ));
        DB::table('productos')->insert(array(
            'producto' => 'Tallarin Caja',
            'descripcionp' => 'Caja con 12 piezas de pasta tipo tallarin',
            'fotografia' => 'control\img\kids.jpg',
            'precio' => '250',
            'existencias' => '5',
            'status' => 'ALTA',
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
