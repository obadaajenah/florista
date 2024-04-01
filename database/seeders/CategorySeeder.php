<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Roses'],
            ['name' => 'Tulips'],
            ['name' => 'Lilies'],
            ['name' => 'Daisies'],
            ['name' => 'Orchids'],
            ['name' => 'Sunflowers'],
            ['name' => 'Carnations'],
            ['name' => 'Peonies'],
            ['name' => 'Hydrangeas'],
            ['name' => 'Chrysanthemums'],
            ['name' => 'Irises'],
            ['name' => 'Daffodils'],
            ['name' => 'Gerbera Daisies'],
            ['name' => 'Anemones'],
            ['name' => 'Snapdragons'],
        ];
        foreach ($categories as $typeData) {
            Category::create($typeData);
        }
    }
}
