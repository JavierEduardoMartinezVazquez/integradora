<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddBusiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('business')->insert(array(
            'empresa' => 'AUTOBUSES Y TRACTOCAMIONES DE QUERETARO',
            'logo' => 'img\businesslogo\logo_utp.jpg',
            'direccion' => 'CARRETERA PRINCIPAL QUERETARO',
            'rfc_e' => 'A-A-A-A-A-A-A',
            'status' => 'ALTA',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('business')->insert(array(
            'empresa' => 'SOLUCIONES INTEGRALES PARA TU CAMION SOCASA (TOLUCA)',
            'logo' => 'img\businesslogo\logo_socasa_p.jpg',
            'direccion' => 'TOLUCA MEX',
            'rfc_e' => 'A-A-A-A-A-A-A',
            'status' => 'ALTA',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('business')->insert(array(
            'empresa' => 'SOLUCIONES INTEGRALES PARA TU CAMION SOCASA (REFACCIONARIA)',
            'logo' => 'img\businesslogo\logo_refa.jpg',
            'direccion' => 'AEROPUERTO',
            'rfc_e' => 'A-A-A-A-A-A-A',
            'status' => 'ALTA',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('business')->insert(array(
            'empresa' => 'SOLUCIONES INTEGRALES PARA TU CAMION SOCASA (XONA)',
            'logo' => 'img\businesslogo\logo_socasa_p.jpg',
            'direccion' => 'CARRETERA PRINCIPAL EL ESPINO XONACATLAN',
            'rfc_e' => 'A-A-A-A-A-A-A',
            'status' => 'ALTA',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('business')->insert(array(
            'empresa' => 'SOLUCIONES INTEGRALES PARA TU CAMION SOCASA (STAFF)',
            'logo' => 'img\businesslogo\logo_socasa_p.jpg',
            'direccion' => 'CARRETERA PRINCIPAL EL ESPINO XONACATLAN',
            'rfc_e' => 'A-A-A-A-A-A-A',
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
