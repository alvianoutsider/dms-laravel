<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'assign permission']);
        Permission::create(['name' => 'create navigation']);
        Permission::create(['name' => 'create agency']);
        Permission::create(['name' => 'create position']);
        Permission::create(['name' => 'create employee']);
        Permission::create(['name' => 'create documents']);

        $superAdmin = Role::create(['name' => 'super admin']);
        $superAdmin->givePermissionTo(Permission::all());

        Role::create(['name' => 'admin'])
            ->givePermissionTo(['create documents', 'create employee']);

        Role::create(['name' => 'karyawan'])
            ->givePermissionTo('create documents');
    }
}