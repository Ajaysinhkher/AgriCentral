<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Role;

class RolePermissionSeeder extends Seeder
{
   
 
    public function run(): void
    {
        $roleId = DB::table('roles')->where('slug', 'super_admin')->value('id');
        $permissionIds = DB::table('permissions')->pluck('id');
        $timestamp = Carbon::now();

        foreach ($permissionIds as $permissionId) {
            DB::table('role_permissions')->insert([
                'role_id' => $roleId,
                'permission_id' => $permissionId,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        }
            
    }
}
