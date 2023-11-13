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
            'email' => 'al222010046@gmail.com',
            'password' => bcrypt('854620'),
            'rol' => 'Admin',
            'status' => 'ALTA',
            'foto' => 'control\img\usuario.jpg',
        ])->assignRole('Admin');
        User::create([
            'name' => 'ZAYDA HASIEL',
            'email' => 'al222010575@gmail.com',
            'password' => bcrypt('854620'),
            'rol' => 'Admin',
            'status' => 'ALTA',
            'foto' => 'control\img\usuario.jpg',
        ])->assignRole('Usuar');

    }
}
