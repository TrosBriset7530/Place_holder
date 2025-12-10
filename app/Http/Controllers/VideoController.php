<?php

namespace App\Http\Controllers;

use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $featured = Video::where('is_featured', true)->first();
        $videos   = Video::latest()->get();

        return view('videos.index', compact('featured', 'videos'));
    }
}
