@extends('layouts.app')

@section('content')
    <div class="container" style="max-width:600px; margin:0 auto;">
        <h1 style="margin-bottom:1rem;">Add New Video</h1>

        @if ($errors->any())
            <div style="background:#58151c; color:#f8d7da; padding:0.75rem 1rem; margin-bottom:1rem;">
                <ul style="margin:0; padding-left:1.2rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('videos.store') }}" method="POST" style="display:flex; flex-direction:column; gap:0.75rem;">
            @csrf

            <div>
                <label>Title</label><br>
                <input type="text" name="title" value="{{ old('title') }}" style="width:100%; padding:0.5rem;">
            </div>

            <div>
                <label>YouTube URL</label><br>
                <input type="url" name="youtube_url" value="{{ old('youtube_url') }}" placeholder="https://www.youtube.com/watch?v=..." style="width:100%; padding:0.5rem;">
            </div>

            <div>
                <label>Description</label><br>
                <textarea name="description" rows="3" style="width:100%; padding:0.5rem;">{{ old('description') }}</textarea>
            </div>

            <div>
                <label>Category</label><br>
                <input type="text" name="category" value="{{ old('category') }}" placeholder="Action, Drama, etc" style="width:100%; padding:0.5rem;">
            </div>

            <div>
                <label>Year</label><br>
                <input type="number" name="year" value="{{ old('year') }}" style="width:100%; padding:0.5rem;">
            </div>

            <div style="display:flex; align-items:center; gap:0.4rem;">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                <label>Set as featured</label>
            </div>

            <button type="submit" class="btn" style="margin-top:0.5rem; border-radius:0.5rem;">
                Save
            </button>
        </form>
    </div>
@endsection
