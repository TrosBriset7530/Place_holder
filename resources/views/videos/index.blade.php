@extends('layouts.app')

@section('content')
    <div class="banner">
        @if($featured)
            <span class="badge">Featured</span>

            <div style="max-width:900px; margin-bottom:1.5rem;">
                <iframe
                    id="video_player_iframe"
                    width="100%"
                    height="450"
                    src="{{ $featured->embed_url }}"
                    title="{{ $featured->title }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="border-radius: 15px;"
                ></iframe>
            </div>

            <h1 style="font-size:1.8rem; margin:0;" id="video_title">{{ $featured->title }}</h1>
            <p style="max-width:600px; color:#ccc; margin-top:0.5rem;" id="video_description">
                {{ $featured->description }}
            </p>
        @else
            <p style="color:#aaa;">Belum ada featured video.</p>
        @endif
    </div>

    <h2 style="margin:0 auto">All Titles</h2>

    <div class="video-grid" style="padding:2rem 0">
    @forelse($videos as $video)
        <div class="card" style="padding: 0 1rem;">
            <div class="video-player-wrapper" style="width:100%; margin-top:1rem" data-id="{{ $video->youtube_id }}" data-title="{{ $video->title }}" data-description="{{ $video->description }}">
                <iframe 
                    src="{{ $video->embed_url }}" 
                    title="{{ $video->title }}"
                    style="width:100%; aspect-ratio: 16/9;"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                ></iframe>
            </div>
            
            <h3 class="video-title-trigger" style="text-align:center; padding:0.5rem;">
                {{ $video->title }}
            </h3>
            <p style="text-align:center; color:#aaa;">Kategori: {{ $video->category->name }}</p>

        </div>
    @empty
        <p style="color:#aaa;">Belum ada video di database.</p>
    @endforelse
</div>
    </div>
    <script>
</script>
@endsection
