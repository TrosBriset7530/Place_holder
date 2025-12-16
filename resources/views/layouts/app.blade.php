<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bala Bala</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { background:#050509; color:#fff; font-family: system-ui, sans-serif; margin:0; }
        a { color: inherit; text-decoration: none; }
        /* h2 {margin-top: 20px; margin-bottom: -1px; display: inline-block;} */
        .navbar { display:flex; justify-content:space-between; padding:1rem 2rem; align-items:center; }
        .logo { font-weight:bold; font-size:1.4rem; }
        .nav-links { display:flex; gap:1rem; }
        .nav-link { font-size:0.9rem; opacity:0.7; }
        .nav-link.active { opacity:1; font-weight:600; border-bottom:2px solid #e50914; padding-bottom:0.25rem; }

        .container { padding: 0 2rem 2rem; max-width:1200px; margin:0 auto; }

        .banner { position:relative; padding:3rem 0 2rem; display:flex; flex-direction:column; gap:1rem; }
        .badge { background:#e50914; padding:0.2rem 0.6rem; border-radius:999px; font-size:0.75rem; width:fit-content; }
        .banner-title { font-size:2rem; font-weight:700; }
        .banner-desc { max-width:480px; opacity:0.8; font-size:0.95rem; }
        .btn { background:#e50914; border:none; border-radius:999px; padding:0.6rem 1.4rem; color:#fff; font-weight:500; display:inline-flex; align-items:center; gap:.4rem; cursor:pointer; }
        .btn-secondary { background:#ffffff; color:#000; }

        .section-title { margin:1.5rem 0 1rem; font-size:1.1rem; font-weight:600; }

        .video-grid { display:grid; grid-template-columns:repeat(auto-fill, minmax(180px, 1fr)); gap:1rem; }
        .card { background:#15151f; border-radius:0.75rem; overflow:hidden; cursor:pointer; transition:transform .2s ease, box-shadow .2s ease; }
        .card:hover { transform:scale(1.03); box-shadow:0 10px 25px rgba(0,0,0,0.6); }
        .card-thumb { aspect-ratio:16/9; width:100%; object-fit:cover; display:block; }
        .card-body { padding:0.6rem 0.8rem 0.9rem; }
        .card-title { font-size:0.95rem; margin-bottom:0.25rem; }
        .card-meta { font-size:0.75rem; opacity:0.7; }

        .video-page { display:flex; flex-direction:column; gap:1rem; padding-top:1.5rem; }
        .video-player { aspect-ratio:16/9; width:100%; border-radius:0.75rem; overflow:hidden; background:#000; }
        .video-player iframe { width:100%; height:100%; border:0; }

        @media (max-width: 640px) {
            .navbar { padding:0.75rem 1rem; }
            .container { padding:0 1rem 1.5rem; }
            .banner { padding-top:2rem; }
        }
        #animation .text-xl {
  font-size: 1.5rem;
  color: currentColor;
  letter-spacing: 0.06em;
}
    </style>
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <h2 id="logo">BLABLA</h2>
    </div>

    <div class="nav-links">
        {{-- link home --}}
        <a href="{{ route('videos.index') }}"
           class="nav-link {{ request()->routeIs('videos.index') ? 'active' : '' }}">
            Home
        </a>

        {{-- link kategori pakai subpage --}}
        <a href="{{ route('categories.show', 'anime') }}"
           class="nav-link {{ request()->is('categories/anime') ? 'active' : '' }}">
            Anime
        </a>
        <a href="{{ route('categories.show', 'movie') }}"
           class="nav-link {{ request()->is('categories/movie') ? 'active' : '' }}">
            Movie
        </a>
        <a href="{{ route('categories.show', 'game') }}"
           class="nav-link {{ request()->is('categories/game') ? 'active' : '' }}">
            Game
        </a>

        {{-- search bar --}}
        <form action="{{ route('videos.index') }}" method="GET" style="display:inline-flex; gap:0.5rem; margin-left:1rem;">
            <input type="text" name="search" placeholder="Cari video..."
                   value="{{ request('search') }}"
                   style="padding:0.3rem; border-radius:5px; border:1px solid #ccc;">
            <button type="submit" class="btn">Search</button>
        </form>

        {{-- logout --}}
        @auth
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="nav-link" style="background:none; border:none; cursor:pointer;">
                Logout
            </button>
        </form>
        @endauth
    </div>
</nav>




    <main class="container">
        @yield('content')
    </main>
</body>
{{-- script --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudgf.net/npm/animejs/dist/bundles/anime.umd.min.js"></script> --}}

<script src="{{ asset('js/animejs/dist/bundles/anime.umd.min.js') }}"></script>
<script>
    for (let i = 0; i < 100; i++)
{
  console.log('anime is', window.anime);
}
</script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // split text AFTER DOM is ready
    const el = document.getElementById('logo');
    el.innerHTML = el.textContent
    .split('')
    .map(c => `<span style="display:inline-block">${c}</span>`)
    .join('');

    anime.animate(el.querySelectorAll('span'), {
      y: [
    { to: '-2.75rem', ease: 'outExpo', duration: 600 },
    { to: 0, ease: 'outBounce', duration: 800, delay: 100 }
  ],
      rotate: {
    from: '-1turn',
    delay: 0
  },
      duration: 600,
      easing: 'outExpo',
      delay: anime.stagger(50),
      direction: 'alternate',
      loop: true
    });

  });
</script>

<script>

    
    document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', function(e) {
        const wrapper = this.querySelector('.video-player-wrapper');
        if (wrapper) {
            const videoId = wrapper.dataset.id;
            const desc = wrapper.dataset.description;
            const title = wrapper.dataset.title;
            // Update the main video player iframe
            document.getElementById('video_player_iframe').src=`https://www.youtube.com/embed/${videoId}`;
            // document.getElementById('video_player_iframe').dataset.description = desc;
            document.getElementById('video_description').innerText = `${desc}`;
            document.getElementById('video_title').innerText = `${title}`;
        }
    });
});
</script>
</html>

</script>
</html>
