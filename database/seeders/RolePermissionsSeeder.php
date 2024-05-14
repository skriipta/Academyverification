<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesAdmin = Role::create(['name' => 'Roles Admin']);
        $permissions = [
            'Roles view',
            'Roles create',
            'Roles edit',
            'Roles delete',
            'Users view',
            'Users create',
            'Users edit',
            'Users delete',
            'student',
        ];
        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate(['name' => $permissionName]);
            $rolesAdmin->givePermissionTo($permission);
        }
        $this->command->info('Roles Admin role and permissions added.');

        $rolesAdmin = Role::create(['name' => 'student']);
        $permissions = [
            'student',
        ];
        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate(['name' => $permissionName]);
            $rolesAdmin->givePermissionTo($permission);
        }
        $this->command->info('student role and permissions added.');
    }
}
