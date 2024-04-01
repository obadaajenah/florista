<?php

namespace Database\Seeders;

use App\Models\Collection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            ['name' => 'Spring Collection', 'category_id' => 1],
            ['name' => 'Summer Collection', 'category_id' => 2],
            ['name' => 'Fall Collection', 'category_id' => 3],

        ];

        foreach ($collections as $collectionData) {
            Collection::create($collectionData);
        }
    }
}
