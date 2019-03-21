<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // create roles and assign created permissions
        $role = Role::create(['name' => 'superadmin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo([
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
        ]);
    }
}
