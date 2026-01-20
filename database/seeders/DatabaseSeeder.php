<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Items;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use function Symfony\Component\Clock\now;

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
            [
                'name' => 'bahan baku',
                'description' => null
            ],
            [
                'name' => 'suku cadang',
                'description' => null
            ],
        ];

        foreach ($category as $data) {
            Category::create($data);
        }

        // items
        Items::create([
            'category_id' => 1,
            'sku' => 'SMP001',
            'unit' => 'SmartPhone',
            'description' => 'smartphone'
        ]);

        $users = [
            [
                'name' => 'Owner User',
                'email' => 'owner@example.com',
                'password' => Hash::make('password'),
                'roles_id' => 1,
                'email_verified_at' => now()
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'roles_id' => 2,
                'email_verified_at' => now()
            ],
            [
                'name' => 'Staff User',
                'email' => 'Staff@example.com',
                'password' => Hash::make('password'),
                'roles_id' => 4,
                'email_verified_at' => now()
            ]
        ];


        // User::factory(10)->create();
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
