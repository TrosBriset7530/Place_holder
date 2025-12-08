<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'youtube_id',
        'thumbnail_url',
        'category_id',
        'is_featured',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // URL embed dari youtube_id
    public function getEmbedUrlAttribute(): string
    {
        return 'https://www.youtube.com/embed/' . $this->youtube_id;
    }
    public function getYoutubeUrlAttribute(): string
    {
        return 'https://www.youtube.com/watch?v=' . $this->youtube_id;
    }

}
