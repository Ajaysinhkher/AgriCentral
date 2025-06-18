<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Grains', 'slug' => 'grains','status'=>'available'],
            ['name' => 'Pulses', 'slug' => 'pulses','status'=>'available'],
            ['name' => 'Vegetables', 'slug' => 'vegetables','status'=>'available'],
        ];

        foreach ($categories as $category) {
                Category::create($category);
        }

        
    }
}
