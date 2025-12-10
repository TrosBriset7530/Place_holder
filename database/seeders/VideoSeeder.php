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
        $series = Category::where('slug', 'series')->first();
        $foods = Category::where('slug', 'foods')->first();



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
        Video::create([
            'title'         => 'Classroom Of The Elite S3',
            'description'   => 'GWEJH BANGET',
            'youtube_id'    => '2_JzFLZ1IHk',
            'thumbnail_url' => 'https://i.ytimg.com/vi/2_JzFLZ1IHk/hqdefault.jpg?sqp=-oaymwEmCKgBEF5IWvKriqkDGQgBFQAAiEIYAdgBAeIBCggYEAIYBjgBQAE=\u0026rs=AOn4CLDP5tO8jMsTKHQli2f-tVu6MiSaPA',
            'category_id'   => $series?->id,
            'is_featured'   => true,
        ]);
        Video::create([
            'title'         => 'Classroom Of The Elite S3',
            'description'   => 'GWEJH BANGET',
            'youtube_id'    => '_oHCgMh9KGM',
            'thumbnail_url' => '":"https://i.ytimg.com/vi/_oHCgMh9KGM/hqdefault.jpg?sqp=-oaymwEmCKgBEF5IWvKriqkDGQgBFQAAiEIYAdgBAeIBCggYEAIYBjgBQAE=\u0026rs=AOn4CLCvnrehVr-9d3RDLOHAyoGYB77eiw',
            'category_id'   => $foods?->id,
            'is_featured'   => true,
        ]);
    }
}
