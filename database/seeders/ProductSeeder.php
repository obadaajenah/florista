<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'collection_id' => 1,
                'name' => 'Product 1',
                'price' => 10.99,
                'description' => 'Description of Product 1',
                'size' => 'Small',
                'rate' => 4,
            ],
            [
                'collection_id' => 1,
                'name' => 'Product 2',
                'price' => 15.99,
                'description' => 'Description of Product 2',
                'size' => 'Medium',
                'rate' => 5,
            ],

        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
