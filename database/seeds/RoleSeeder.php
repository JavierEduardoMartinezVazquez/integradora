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


        Permission::create(['name' => 'Hourhand'])->assignRole($role1);
        Permission::create(['name' => 'obtener_ultimo_id_hourhand'])->assignRole($role1);
        Permission::create(['name' => 'guardar_hourhand'])->assignRole($role1);
        Permission::create(['name' => 'listar_hourhand'])->assignRole($role1);
        Permission::create(['name' => 'obtener_hourhand'])->assignRole($role1);
        Permission::create(['name' => 'modificar_hourhand'])->assignRole($role1);
        Permission::create(['name' => 'verificar_baja_hourhand'])->assignRole($role1);
        Permission::create(['name' => 'baja_hourhand'])->assignRole($role1);


        Permission::create(['name' => 'Hourhandreporte'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_ultimo_id_hourhandreporte'])->assignRole($role1);
        Permission::create(['name' => 'guardar_hourhandreporte'])->assignRole($role1);
        Permission::create(['name' => 'listar_hourhandreporte'])->assignRole($role1);
        Permission::create(['name' => 'obtener_hourhandreporte'])->assignRole($role1);
        Permission::create(['name' => 'modificar_hourhandreporte'])->assignRole($role1);
        Permission::create(['name' => 'verificar_baja_hourhandreporte'])->assignRole($role1);
        Permission::create(['name' => 'baja_hourhandreporte'])->assignRole($role1);


        Permission::create(['name' => 'Holidays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_ultimo_id_holidays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'guardar_holidays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'listar_holidays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_holidays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'modificar_holidays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'verificar_baja_holidays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'baja_holidays'])->syncRoles([$role1,$role2]);


        Permission::create(['name' => 'Permi'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_ultimo_id_permi'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'guardar_permi'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'listar_permi'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_permi'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'modificar_permi'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'verificar_baja_permi'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'baja_permi'])->syncRoles([$role1,$role2]);


        Permission::create(['name' => 'Vacationdays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_ultimo_id_vacationdays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'guardar_vacationdays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'listar_vacationdays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_vacationdays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'modificar_vacationdays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'verificar_baja_vacationdays'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'baja_vacationdays'])->syncRoles([$role1,$role2]);


        Permission::create(['name' => 'Vacationreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_ultimo_id_vacationreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'guardar_vacationreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'listar_vacationreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_vacationreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'modificar_vacationreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'verificar_baja_vacationreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'baja_vacationreports'])->syncRoles([$role1,$role2]);


        Permission::create(['name' => 'Permissionsreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_ultimo_id_permissionsreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'guardar_permissionsreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'listar_permissionsreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_permissionsreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'modificar_permissionsreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'verificar_baja_permissionsreports'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'baja_permissionsreports'])->syncRoles([$role1,$role2]);


        Permission::create(['name' => 'Exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_ultimo_id_exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'guardar_exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'listar_exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'modificar_exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'verificar_baja_exits'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'baja_exits'])->syncRoles([$role1,$role2]);


        Permission::create(['name' => 'Nominas'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_ultimo_id_nominas'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'guardar_nominas'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'listar_nominas'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_nominas'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'modificar_nominas'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'verificar_baja_nominas'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'baja_nominas'])->syncRoles([$role1,$role2]);


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

        
        Permission::create(['name' => 'Businessreporte'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_ultimo_id_businessreporte'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'guardar_businessreporte'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'listar_businessreporte'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'obtener_businessreporte'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'modificar_businessreporte'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'verificar_baja_businessreporte'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'baja_businessreporte'])->syncRoles([$role1,$role2]);
    }
}
