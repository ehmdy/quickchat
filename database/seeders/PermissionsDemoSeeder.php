<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        $role1 = Role::create(['name' => 'user']);
        $user = \App\Models\User::factory()->create([
            'username' => 'user',
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role1);

        
        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo(Permission::all());

        $user = \App\Models\User::factory()->create([
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role2);

        $role3 = Role::create(['name' => 'manager']);
        $role3->givePermissionTo(Permission::all());

        $user = \App\Models\User::factory()->create([
            'username' => 'manager',
            'name' => 'manager',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role3);

        $role3 = Role::create(['name' => 'writer']);
        $role3->givePermissionTo(Permission::all());

        $user = \App\Models\User::factory()->create([
            'username' => 'writer',
            'name' => 'writer',
            'email' => 'writer@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role3);
    }
}
