<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Roles view',
            'Roles create',
            'Roles edit',
            'Roles delete',

            'Users view',
            'Users create',
            'Users edit',
            'Users delete',

            'student view',
            'student edit',
            'student create',
            'student delete',

            'courses view',
            'courses edit',
            'courses create',
            'courses delete',

            'certificate view',
            'certificate edit',
            'certificate create',
            'certificate delete',

            'student'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
