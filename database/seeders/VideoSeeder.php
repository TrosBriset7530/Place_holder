<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $anime  = Category::where('slug', 'anime')->first();
        $movie  = Category::where('slug', 'movie')->first();
        $berita = Category::where('slug', 'berita')->first();

        Video::create([
            'title'         => 'Menembus Banjir Langkat dan Pelosok Tamiang yang terisolasi',
            'description'   => 'Ferry Irwandi Banjir Aceh.',
            'youtube_id'    => 'PC3KLjRgRbM', // cuma ID
            'thumbnail_url' => 'https://i.ytimg.com/vi/PC3KLjRgRbM/hqdefault.jpg',
            'category_id'   => $berita?->id,
            'is_featured'   => true,
        ]);

        Video::create([
            'title'         => 'Crayon Shinchan: The Legend Called Buri Buri 3 Minutes Charge',
            'description'   => 'Movie Shinchan.',
            'youtube_id'    => 'O7ENJsLCpwQ',
            'thumbnail_url' => 'https://i.ytimg.com/vi/O7ENJsLCpwQ/hqdefault.jpg',
            'category_id'   => $anime?->id,
            'is_featured'   => true,
        ]);

        Video::create([
            'title'         => 'Dwayne Johnson In THE DEMIGOD',
            'description'   => 'THE DEMIGOD.',
            'youtube_id'    => 'Klq1qRaZOxo',
            'thumbnail_url' => 'https://i.ytimg.com/vi/Klq1qRaZOxo/hqdefault.jpg',
            'category_id'   => $movie?->id,
            'is_featured'   => true,
        ]);
    }
}
