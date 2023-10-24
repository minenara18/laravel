<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\models\Product;
use Illuminate\Database\Seeder;
use illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            'name' => 'Samsung S22',
            'price' => 8799000,
            'image' =>'image.jpg',
            'description' => Str::random(180),
        ]);
    }
}
