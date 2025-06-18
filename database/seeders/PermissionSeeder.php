<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

   

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage_users',
            'manage_roles',
            'manage_admins',
            'manage_dashboard',
            'manage_blocks',
            'manage_orders',
            'manage_products',
            'manage_categories',

        ];
        
        $timestamp = Carbon::now();

        foreach($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission,
                'slug' => Str::slug($permission),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        }
    }
}
