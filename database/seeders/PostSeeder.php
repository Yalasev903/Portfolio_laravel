<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Категории (создаются, если ещё не существуют)
        $devCategory = Category::firstOrCreate(['title' => 'Разработка']);
        $designCategory = Category::firstOrCreate(['title' => 'Дизайн']);
        $marketingCategory = Category::firstOrCreate(['title' => 'Маркетинг']);

        $posts = [
            [
                'title' => 'Сайт бронювання (Booking clone)',
                'img' => 'files/desctop.png',
                'text' => 'Сайт бронювання на Laravel з підтримкою API для готелів та авто, автоматична конвертація зображень у .webp, адміністрування CMS.',
                'cat_id' => $devCategory->id,
            ],
            [
                'title' => 'Чат додаток на Laravel (Chirper)',
                'img' => 'files/chirper.png',
                'text' => 'Чат-додаток з реєстрацією, профілем, редагуванням та видаленням повідомлень. Реалізовано на Laravel Jetstream.',
                'cat_id' => $devCategory->id,
            ],
            [
                'title' => 'Книга рецептів (WordPress)',
                'img' => 'files/image_2024-05-30_18-08-02.png',
                'text' => 'Мультиязичний сайт рецептів з підтримкою плагінів, зображеннями через ChatGPT 4.0, генерацією тексту за допомогою AI.',
                'cat_id' => $designCategory->id,
            ]
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(
                ['title' => $post['title']], // Уникальное поле
                $post                         // Данные для обновления или создания
            );
        }
    }
}
