<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = [
            [
                'role_name' => 'admin'
            ],
            [
                'role_name' => 'staff'
            ],
            [
                'role_name' => 'supervisor'
            ],
            [
                'role_name' => 'auditor'
            ],
        ];

        foreach ($roles as $role_data) {
            Roles::create($role_data);
        };
    }
}
