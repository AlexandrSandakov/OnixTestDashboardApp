<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $admin = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'administrator@gmail.com',
        ]);
        $user = User::factory()->create([
            'name' => 'Guest',
            'email' => 'guest@gmail.com',
        ]);
        $roleUser = Role::create(['name' => 'User']);
        $roleAdmin = Role::create(['name' => 'Administrator']);
        $admin->assignRole($roleAdmin);
        $user->assignRole($roleUser);
    }
}
