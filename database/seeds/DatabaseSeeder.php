<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
/*
        $users = new User();

        $users->name = "JAVIER EDUARDO";
        $users->lastname_p = "MARTINEZ";
        $users->lastname_m = "VAZQUEZ";
        $users->email = "javier.martinez@socasa.com.mx";
        $users->password= bcrypt("854620");
        $users->edad=19;
        $users->sucursal="SOLUCIONES INTEGRALES PARA TU CAMIÓN SOCASA S.A. DE C.V.";
        $users->area="SISTEMAS";
        $users->ingreso="2022-05-01";
        $users->hentrada="08:30:00";
        $users->hsalida="05:30:00";
        $users->rol="ADMIN";
        $users->status="ALTA";
        $users->save();
        

        $users = new User();

        $users->name = "MARCO";
        $users->lastname_p = "POLO";
        $users->lastname_m = "BALTAZAR";
        $users->email = "marco.baltazar@socasa.com.mx";
        $users->password= bcrypt("12345678");
        $users->edad=35;
        $users->sucursal="SOLUCIONES INTEGRALES PARA TU CAMIÓN SOCASA S.A. DE C.V.";
        $users->area="SISTEMAS";
        $users->ingreso="2020-01-01";
        $users->hentrada="08:30:00";
        $users->hsalida="05:30:00";
        $users->rol="ADMIN";
        $users->status="ALTA";
        $users->save();

        $users = new User();
        $users->name = "ALONSO";
        $users->lastname_p = "BARRERA";
        $users->lastname_m = "HERNANDEZ";
        $users->email = "alonso.barrera@socasa.com.mx";
        $users->password= bcrypt("12345678");
        $users->edad=25;
        $users->sucursal="SOLUCIONES INTEGRALES PARA TU CAMIÓN SOCASA S.A. DE C.V.";
        $users->area="SISTEMAS";
        $users->ingreso="2020-06-01";
        $users->hentrada="08:30:00";
        $users->hsalida="05:30:00";
        $users->rol="ADMIN";
        $users->status="ALTA";
        $users->save();*/

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);


    }
}
