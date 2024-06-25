<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsComment;
use App\Models\NewsViewer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        NewsCategory::create([
            'name' => 'Berita',
            'slug' => 'berita',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        NewsCategory::create([
            'name' => 'Pengumuman',
            'slug' => 'pengumuman',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        NewsCategory::create([
            'name' => 'Acara',
            'slug' => 'acara',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        News::factory(5)->create();

        NewsComment::create([
            'news_id' => 1,
            'user_id' => 4,
            'comment' => 'Komentar pertama dapat apa bang?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        NewsComment::create([
            'news_id' => 1,
            'user_id' => 5,
            'comment' => 'gokil bang, mantap bang, lanjutkan bang, semangat bang, semoga sukses bang, I love you bang', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        NewsComment::create([
            'news_id' => 1,
            'user_id' => 6,
            'comment' => 'saya tidak setuju dengan pendapat bang di atas, saya rasa bang tidak benar, saya rasa bang tidak tepat, saya rasa bang tidak adil, saya rasa bang tidak bijak',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        NewsComment::create([
            'news_id' => 2,
            'user_id' => 4,
            'comment' => 'Komentar pertama dapat apa bang?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        NewsComment::create([
            'news_id' => 2,
            'user_id' => 7,
            'comment' => 'saya selalu setuju dengan pendapat bang, kalo semua lelaki seperti bang, dunia ini pasti damai, saya cinta bang, saya sayang', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
