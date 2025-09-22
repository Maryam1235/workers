<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $permissions = [
            'manage workers',
            'view reports',
            'edit profile',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign existing permissions
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $worker = Role::firstOrCreate(['name' => 'worker']);
        $manager = Role::firstOrCreate(['name' => 'manager']);

        // Give permissions to roles
        $admin->syncPermissions(Permission::all());
        $worker->syncPermissions(['edit profile']);
        $manager->syncPermissions(['view reports', 'edit profile']);
    }
}
