<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Product::factory(1000)
            ->has(ProductPhoto::factory(3))
            ->create();
    }
}
