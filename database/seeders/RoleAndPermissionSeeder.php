<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Crear permisos
         Permission::create(['name' => 'CREATE_SPECIALTIES']);
         Permission::create(['name' => 'UPDATE_SPECIALTIES']);
         Permission::create(['name' => 'READ_SPECIALTIES']);
         Permission::create(['name' => 'CREATE_RESERVATIONS']);
         Permission::create(['name' => 'UPDATE_RESERVATIONS']);
         Permission::create(['name' => 'READ_RESERVATIONS']);
 
         // Crear roles y asignar permisos
         $adminRole = Role::create(['name' => 'admin']);
         $adminRole->givePermissionTo(['CREATE_SPECIALTIES', 'UPDATE_SPECIALTIES', 'READ_SPECIALTIES', 'CREATE_RESERVATIONS', 'UPDATE_RESERVATIONS', 'READ_RESERVATIONS' ]);
 
         $userRole = Role::create(['name' => 'user']);
         $userRole->givePermissionTo(['CREATE_RESERVATIONS', 'UPDATE_RESERVATIONS', 'READ_RESERVATIONS' ]);
     
    }
}
