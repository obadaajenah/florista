<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Damascus'],
            ['name' => 'Aleppo'],
            ['name' => 'Homs'],
            ['name' => 'Hama'],
            ['name' => 'Latakia'],
        ];

        foreach ($cities as $cityData) {
            City::create($cityData);
        }
    }
}
