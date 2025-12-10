@extends('layouts.app')

@section('content')
    <div class="banner">
        @if($featured)
            <span class="badge">Featured</span>

            <div style="max-width:900px; margin-bottom:1.5rem;">
                <iframe
                    width="100%"
                    height="450"
                    src="{{ $featured->embed_url }}"
                    title="{{ $featured->title }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>

            <h1 style="font-size:1.8rem; margin:0;">{{ $featured->title }}</h1>
            <p style="max-width:600px; color:#ccc; margin-top:0.5rem;">
                {{ $featured->description }}
            </p>
        @else
            <p style="color:#aaa;">Belum ada featured video.</p>
        @endif
    </div>

    <h2 style="margin:2rem 2rem 1rem;">All Titles</h2>

    <div class="video-grid" style="padding:0 2rem 2.5rem;">
        @forelse($videos as $video)
            <div class="card">
                {{-- LINK AKTIF KE YOUTUBE ASLI --}}
                <a href="https://www.youtube.com/watch?v={{ $video->youtube_id }}" target="_blank" style="color:inherit; text-decoration:none;">
                    @if($video->thumbnail_url)
                        <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}" style="width:100%; display:block;">
                    @else
                        <div style="height:120px; background:#222;"></div>
                    @endif
                    <div style="padding:0.75rem;">
                        <div style="font-weight:600; font-size:0.95rem; margin-bottom:0.25rem;">
                            {{ $video->title }}
                        </div>
                        <div style="font-size:0.8rem; color:#aaa;">
                            {{ optional($video->category)->name ?? 'Uncategorized' }}
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p style="color:#aaa;">Belum ada video di database.</p>
        @endforelse
    </div>
@endsection
