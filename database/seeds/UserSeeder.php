<?php


use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'JAVIER EDUARDO',
            'lastname_p' => 'MARTINEZ',
            'lastname_m' => 'VAZQUEZ',
            'email' => 'javier.martinez@sopamex.com.mx',
            'password' => bcrypt('854620'),
            'nss' => '2165131216532',
            'tel' => '7291180557',
            'curp' => 'MAVJ021013HMCRZVA0',
            'rfc' => 'MAVJ021013',
            'empresa_id' => '1',
            'puesto' =>'SISTEMAS',
            'ingreso' => '2022-05-01',
            'horariolv_id' =>'08:30:00',
            'horariosab_id' => '05:30:00',
            'diasvacaciones' => '6',
            'rol' => 'Admin',
            'status' => 'ALTA',
            'foto' => 'control\img\usuario.jpg',
        ])->assignRole('Admin');

        User::create([
            'name' => 'Zayda Hasiel',
            'lastname_p' => 'MARTINEZ',
            'lastname_m' => 'VAZQUEZ',
            'email' => 'zayda.hasiel@sopamex.com.mx',
            'password' => bcrypt('854620'),
            'nss' => '2165131216532',
            'tel' => '7291180557',
            'curp' => 'MAVJ021013HMCRZVA0',
            'rfc' => 'MAVJ021013',
            'empresa_id' => '1',
            'puesto' =>'SISTEMAS',
            'ingreso' => '2022-05-01',
            'horariolv_id' =>'08:30:00',
            'horariosab_id' => '05:30:00',
            'diasvacaciones' => '6',
            'rol' => 'Admin',
            'status' => 'ALTA',
            'foto' => 'control\img\usuario.jpg',
        ])->assignRole('Usuar');

    }
}
