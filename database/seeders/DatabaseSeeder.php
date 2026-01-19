<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Items;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            'owner',
            'admin',
            'supervisor',
            'staff',
        ];

        foreach ($roles as $role) {
            Roles::firstOrCreate(['role_name' => $role]);
        }

        // Category
        $category = [
            [
                'name' => 'elektronik',
                'description' => null
            ],
            [
                'name' => 'pakaian',
                'description' => null
            ],
        ];

        foreach ($category as $data) {
            Category::create($data);
        }

        // items
        Items::create([
            'category_id' => 1,
            'sku' => 'SmartPhone',
            'unit' => 'SMP001',
            'description' => 'smartphone'
        ]);


        // User::factory(10)->create();
        // Create a single owner user with known credentials
        User::create([
            'name' => 'Owner User',
            'email' => 'owner@example.com',
            'password' => Hash::make('password'), // Use a secure default password
            'roles_id' => 1,
            'email_verified_at' => now(),
        ]);

        // Create a single admin user with known credentials
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Use a secure default password
            'roles_id' => 2,
            'email_verified_at' => now(),
        ]);
    }
}
