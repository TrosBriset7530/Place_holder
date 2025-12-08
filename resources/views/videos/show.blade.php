@extends('layouts.app')

@section('content')
    <div class="video-page">
        <div>
            <a href="{{ route('videos.index') }}" style="font-size:0.85rem; opacity:0.7;">← Back to Home</a>
        </div>

        <div class="video-player">
            <iframe
                src="{{ $video->embed_url }}" href="https://www.youtube.com/watch?v=PC3KLjRgRbM{{ $video->youtube_id }}"
                title="{{ $video->title }}"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
            ></iframe>
        </div>

        <div>
            <h1 style="font-size:1.4rem; margin:0.5rem 0 0.25rem;">{{ $video->title }}</h1>
            <p style="opacity:0.8; font-size:0.95rem;">
                {{ $video->description }}
            </p>

            @if($video->youtube_url)
                <p style="margin-top:0.75rem; font-size:0.85rem;">
                    Watch directly on
                    <a href="{{ $video->youtube_url }}" target="_blank" style="color:#3ea6ff; text-decoration:underline;">
                        YouTube
                    </a>
                </p>
            @endif
        </div>
    </div>
@endsection
