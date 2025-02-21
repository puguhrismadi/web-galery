<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Indonesia Digital</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    <header>
        <h1>SMK INDONESIA DIGITAL</h1>
        <p>maju seiring perkembangan digital</p>
    </header>

    <!-- Slider (Menampilkan kategori 'Kegiatan Sekolah') -->
    <section class="slider">
        <div class="slides">
            @foreach ($kegiatan as $post)
                <div class="slide">
                    <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}">
                    <h3>{{ $post->judul }}</h3>
                    <p>{{ Str::limit($post->isi, 100) }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <div class="container">

        <!-- Agenda Sekolah -->
        <section class="post red">
            <h3>Agenda Sekolah</h3>
            <ul>
                @forelse ($agenda as $post)
                    <li>{{ $post->judul }}</li>
                @empty
                    <li>Tidak ada agenda sekolah saat ini.</li>
                @endforelse
            </ul>
        </section>

        <!-- Prestasi Sekolah -->
        <section class="post white">
            <h3>Prestasi Sekolah</h3>
            @forelse ($prestasi as $post)
                <div class="prestasi-item">
                    <h4>{{ $post->judul }}</h4>
                    <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}">
                    <p>{{ Str::limit($post->isi, 100) }}</p>
                </div>
            @empty
                <p>Belum ada prestasi yang ditambahkan.</p>
            @endforelse
        </section>

    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
