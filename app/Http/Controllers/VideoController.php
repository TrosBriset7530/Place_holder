<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    // Halaman home: list semua video
    public function index()
    {
        $featured = Video::where('is_featured', true)->first();
        $videos = Video::orderBy('created_at', 'desc')->get();

        return view('videos.index', compact('featured', 'videos'));
    }

    // Halaman detail video
    public function show(Video $video)
    {
        // video terkait by category
        $related = Video::where('category', $video->category)
            ->where('id', '!=', $video->id)
            ->take(6)
            ->get();

        return view('videos.show', compact('video', 'related'));
    }

    // Form create video (admin)
    public function create()
    {
        return view('videos.create');
    }

    // Simpan video ke DB
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'youtube_url'  => 'required|url',
            'category'     => 'nullable|string|max:100',
            'year'         => 'nullable|integer',
            'is_featured'  => 'nullable|boolean',
        ]);

        // Ambil youtube_id dari URL
        $youtubeId = $this->extractYoutubeId($validated['youtube_url']);

        // Optional: generate thumbnail URL standar
        $thumbnailUrl = "https://img.youtube.com/vi/{$youtubeId}/hqdefault.jpg";

        Video::create([
            'title'        => $validated['title'],
            'description'  => $validated['description'] ?? null,
            'youtube_id'   => $youtubeId,
            'thumbnail_url'=> $thumbnailUrl,
            'category'     => $validated['category'] ?? null,
            'year'         => $validated['year'] ?? null,
            'is_featured'  => $request->boolean('is_featured'),
        ]);

        return redirect()->route('videos.index')->with('success', 'Video created.');
    }

    // Helper: ambil youtube_id dari URL YouTube
    protected function extractYoutubeId(string $url): string
    {
        // handle beberapa bentuk URL
        // https://www.youtube.com/watch?v=VIDEO_ID
        // https://youtu.be/VIDEO_ID

        $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';

        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }

        // fallback, kalau user isi langsung ID
        return $url;
    }
}
