<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name'=>'SuperAdmin']);
        $role2 = Role::create(['name'=>'Admin']);
        $role3 = Role::create(['name'=>'Usuario']);
        

        Permission::create(['name'=> 'dashboard'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Configuraciones'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Servicios'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Ventas'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Domos'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Caracteristicas'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Ayudas'])->syncRoles([$role1,$role2]);

        //roles
        Permission::create(['name'=> 'Ver_Roles'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Crear_Roles'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Editar_Roles'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Cambiar_estado_de_ Roles'])->syncRoles([$role1,$role2]);
        //usuarios
        Permission::create(['name'=> 'Ver_Usuarios'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Crear_Usuarios'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Editar_Usuarios'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Cambiar_estado_de_Usuarios'])->syncRoles([$role1,$role2]);
        //servicios
        Permission::create(['name'=> 'Ver_Servicios'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Crear_Servicios'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Editar_Servicios'])->syncRoles([$role1,$role2]);
        //reservas
        Permission::create(['name'=> 'Ver_Reservas'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Crear_Reservas'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Editar_Reservas'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'Ver_detalle_Reservas'])->syncRoles([$role1,$role2]);
        //Agenda
        Permission::create(['name'=> 'Ver_Agenda'])->syncRoles([$role1,$role2]);


    
        
    }

   
}
