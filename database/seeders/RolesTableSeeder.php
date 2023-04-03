<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => Role::ROLE_USER,
        ]);

        Role::create([
            'name' => Role::ROLE_ADMIN,
        ]);

        Role::create([
            'name' => Role::ROLE_SUPERADMIN,
        ]);
    }
}
