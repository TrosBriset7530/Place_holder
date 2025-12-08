<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Anime',  'slug' => 'anime'],
            ['name' => 'Movie',  'slug' => 'movie'],
            ['name' => 'Series', 'slug' => 'series'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
        Category::create([
            'name' => 'Default',
            'slug' => 'default',
        ]);

    }
}
