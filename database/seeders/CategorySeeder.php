<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['title' => 'Разработка'],
            ['title' => 'Дизайн'],
            ['title' => 'Маркетинг'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['title' => $category['title']]);
        }
    }
}
