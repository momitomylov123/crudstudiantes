<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $ver = Permission::firstOrCreate(['name' => 'ver tareas']);
        $crear = Permission::firstOrCreate(['name' => 'crear tareas']);
        $editar = Permission::firstOrCreate(['name' => 'editar tareas']);
        $borrar = Permission::firstOrCreate(['name' => 'borrar tareas']);

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $empleado = Role::firstOrCreate(['name' => 'empleado']);

        $admin->givePermissionTo([$ver, $crear, $editar, $borrar]);
        $empleado->givePermissionTo($ver);
    }
}