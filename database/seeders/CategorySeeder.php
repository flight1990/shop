<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Category::factory(7)
            ->create()
            ->each(function ($category) {
                Category::factory(15)
                    ->create(['parent_id' => $category->id]);
            });

        Category::fixTree();
    }
}
