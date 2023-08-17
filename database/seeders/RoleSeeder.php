<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Super Administrator', 'slug' => 'Super-Admin'],
            ['name' => 'Administrator', 'slug' => 'Admin'],
            ['name' => 'Supervisor', 'slug' => 'Sup'],
            ['name' => 'Cashier', 'slug' => 'Cash'],
            ['name' => 'Customer', 'slug' => 'Cust'],
        ];
        foreach ($roles as $role){
            Role::create($role);
        }
    }
}
