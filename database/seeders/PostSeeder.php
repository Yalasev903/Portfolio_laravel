<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Убедимся, что есть хотя бы одна категория
        $category = Category::first();
        if (!$category) {
            $category = Category::create(['title' => 'Без категории']);
        }

        Post::create([
            'title' => 'Кейс №1',
            'img' => 'images/example.webp',
            'text' => 'Описание кейса №1',
            'cat_id' => $category->id,
        ]);

        Post::create([
            'title' => 'Кейс №2',
            'img' => 'images/example2.webp',
            'text' => 'Описание кейса №2',
            'cat_id' => $category->id,
        ]);
    }
}
