<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('roles')->insert([
            'name' => 'Super Admin',
            'slug' => 'super_admin',
            'is_super_admin' => 1, // enum: yes / no
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
