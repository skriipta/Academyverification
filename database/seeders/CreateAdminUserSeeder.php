<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'skriipta',
            'email' => 'skriipta@skriipta.com',
            'password' => Hash::make('Admin@Skriipta123!'),
            'role_name' => ["Owner"],
        ]);
        $role = Role::create(['name' => 'Owner']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
        // Output the login credentials
        $this->command->info('User created:');
        $this->command->info('Rlole: owner');
        $this->command->info('Email: ' . $user->email);
        $this->command->info('Password: Admin@Skriipta123!');
    }
}