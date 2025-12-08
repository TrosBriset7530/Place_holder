@extends('layouts.app')

@section('content')
    <div class="banner">
        <div class="badge">Featured</div>
        @if($featured)
            <h1>{{ $featured->title }}</h1>
            <p>{{ $featured->description }}</p>

            <div style="margin-top:1rem; max-width:900px;">
                <iframe
                    width="100%"
                    height="420"
                    src="{{ $featured->embed_url }}"
                    title="{{ $featured->title }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>
        @endif
    </div>

    <div style="padding: 1.5rem 2rem;">
        <h2 style="margin-bottom:1rem;">All videos</h2>

        <div class="video-grid">
            @foreach($videos as $video)
                <div class="card">
                    <a href="{{ $video->youtube_url }}" target="_blank">Watch on YouTube</a>
                        <img
                            src="{{ $video->thumbnail_url }}"
                            alt="{{ $video->title }}"
                            style="width:100%; display:block;"
                        >
                        <div style="padding:0.7rem 0.9rem;">
                            <div style="font-size:0.8rem; opacity:.7;">
                                {{ $video->category?->name ?? 'Uncategorized' }}
                            </div>
                            <div style="font-weight:500; margin-top:0.3rem;">
                                {{ $video->title }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
