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
            'email' => 'javier.martinez@sopamex.com.mx',
            'password' => bcrypt('854620'),
            'rol' => 'Admin',
            'status' => 'ALTA',
            'foto' => 'control\img\usuario.jpg',
        ])->assignRole('Admin');

        User::create([
            'name' => 'Zayda Hasiel',
            'email' => 'zayda.hasiel@sopamex.com.mx',
            'password' => bcrypt('854620'),
            'rol' => 'Admin',
            'status' => 'ALTA',
            'foto' => 'control\img\usuario.jpg',
        ])->assignRole('Usuar');

    }
}
