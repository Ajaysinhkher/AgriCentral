<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           DB::table('admins')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'), // Use env variable for real apps
            'role_id' => 1, // Assuming Super Admin role has ID = 1
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
