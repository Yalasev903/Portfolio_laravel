<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['title' => 'Розробка'],
            ['title' => 'Дизайн'],
            ['title' => 'Маркетинг'],
            ['title' => 'Laravel'],
            ['title' => 'WordPress'],
            ['title' => 'Tilda'],
            ['title' => 'Bootstrap'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['title' => $category['title']]);
        }
    }
}
