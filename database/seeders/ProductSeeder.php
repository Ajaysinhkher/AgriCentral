<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Basmati Rice',
                'slug' => Str::slug('Basmati Rice'),
                'description' => 'Premium quality long-grain basmati rice.',
                'price' => 85.00,
                'stock' => 100,
                'image' => 'images/rice.jpg',
                'status' => 'available',
            ],
            [
                'name' => 'Red Lentils',
                'slug' => Str::slug('Red Lentils'),
                'description' => 'High protein red lentils.',
                'price' => 60.00,
                'stock' => 80,
                'image' => 'images/lentils.jpg',
                'status' => 'available',
            ],
            [
                'name' => 'Carrot',
                'slug' => Str::slug('Carrot'),
                'description' => 'Fresh organic carrots.',
                'price' => 40.00,
                'stock' => 150,
                'image' => 'images/carrot.jpg',
                'status' => 'available',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
