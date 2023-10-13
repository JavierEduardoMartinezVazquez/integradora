<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Usuar']);

        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2]);
        
        Permission::create(['name' => 'menuadmin'])->syncRoles([$role1,$role2]);
        
        Permission::create(['name' => 'menuuser'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'User'])->assignRole($role1);
        Permission::create(['name' => 'obtener_empresa'])->assignRole($role1);
        Permission::create(['name' => 'obtener_horario'])->assignRole($role1);
        Permission::create(['name' => 'obtener_roles'])->assignRole($role1);
        Permission::create(['name' => 'guardar_user'])->assignRole($role1);
        Permission::create(['name' => 'listar_user'])->assignRole($role1);
        Permission::create(['name' => 'obtener_user'])->assignRole($role1);
        Permission::create(['name' => 'modificar_user'])->assignRole($role1);
        Permission::create(['name' => 'verificar_baja_user'])->assignRole($role1);
        Permission::create(['name' => 'baja_user'])->assignRole($role1);


        Permission::create(['name' => 'Business'])->assignRole($role1);
        Permission::create(['name' => 'obtener_ultimo_id_business'])->assignRole($role1);
        Permission::create(['name' => 'guardar_business'])->assignRole($role1);
        Permission::create(['name' => 'listar_business'])->assignRole($role1);
        Permission::create(['name' => 'obtener_business'])->assignRole($role1);
        Permission::create(['name' => 'modificar_business'])->assignRole($role1);
        Permission::create(['name' => 'verificar_baja_business'])->assignRole($role1);
        Permission::create(['name' => 'baja_business'])->assignRole($role1);




        Permission::create(['name' => 'Exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_ultimo_id_exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'guardar_exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'listar_exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'modificar_exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'verificar_baja_exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'baja_exits'])->syncRoles([$role1,$role2]);




        Permission::create(['name' => 'Assistances'])->assignRole($role1);
        Permission::create(['name' => 'obtener_ultimo_id_assistances'])->assignRole($role1);
        Permission::create(['name' => 'guardar_assistances'])->assignRole($role1);
        Permission::create(['name' => 'listar_assistances'])->assignRole($role1);
        Permission::create(['name' => 'obtener_assistances'])->assignRole($role1);
        Permission::create(['name' => 'modificar_assistances'])->assignRole($role1);
        Permission::create(['name' => 'verificar_baja_assistances'])->assignRole($role1);
        Permission::create(['name' => 'baja_assistances'])->assignRole($role1);
        


        Permission::create(['name' => 'Assistancesreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_ultimo_id_assistancesreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'guardar_assistancesreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'listar_assistancesreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_assistancesreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'modificar_assistancesreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'verificar_baja_assistancesreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'baja_assistancesreports'])->syncRoles([$role1,$role2]);

    }
}
