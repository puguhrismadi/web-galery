<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Indonesia Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header>
        <div class="container">
            <div class="logo-container">
                <img src="{{ asset('logo.png') }}" alt="Logo SMK Nusantara">
                <div class="title">
                    <h1>SMK DIGITAL NUSANTARA</h1>
                    <p>SMK dengan kemajuan digital</p>
                </div>
            </div>
        </div>
    </header>
    

    <section class="hero-slider">
        <div id="agendaSlider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($kegiatan as $key => $post)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $post->gambar) }}" class="d-block w-100 hero-image" alt="{{ $post->judul }}">
                        <div class="carousel-caption">
                            <h3>{{ $post->judul }}</h3>
                            <p>{{ Str::limit($post->isi, 150) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
    
            <!-- Navigasi Slider -->
            <button class="carousel-control-prev" type="button" data-bs-target="#agendaSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#agendaSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    
    <div class="container">

        <section class="agenda-prestasi">
            <div class="container">
                <div class="row">
                    <!-- Agenda Sekolah (40%) -->
                    <div class="col-md-5 agenda-container">
                        <h3>Agenda Sekolah</h3>
                        <div id="agendaSlider" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($agenda->chunk(5) as $key => $agendaChunk)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <ul class="agenda-list">
                                            @foreach ($agendaChunk as $post)
                                                <li>
                                                    <span class="agenda-date">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</span> 
                                                    {{ $post->judul }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#agendaSlider" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#agendaSlider" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
        
                    <!-- Prestasi Sekolah (60%) -->
                    <div class="col-md-7 prestasi-container">
                        <h3>Prestasi Sekolah</h3>
                        <div id="prestasiSlider" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($prestasi as $key => $post)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <div class="prestasi-item">
                                            <!-- Judul di atas gambar -->
                                            <h4 class="prestasi-title">{{ $post->judul }}</h4>
                                            
                                            <!-- Gambar Prestasi -->
                                            <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="prestasi-thumbnail">
                                            
                                            <!-- Isi Deskripsi di bawah gambar -->
                                            <div class="prestasi-content">
                                                <p>{{ Str::limit($post->isi, 150) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        
                            <button class="carousel-control-prev" type="button" data-bs-target="#prestasiSlider" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#prestasiSlider" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <section class="school-map">
            <div class="container">
                <h2 class="section-title">Peta Sekolah</h2>
                
                <div class="row">
                    <!-- Bagian Kiri: Peta -->
                    <div class="col-md-7">
                        <img src="{{ asset('image/peta-sekolah.png') }}" alt="Peta Sekolah" class="school-map-image">
                    </div>
        
                    <!-- Bagian Kanan: Kategori Peta -->
                    <div class="col-md-5">
                        <ul class="school-map-categories">
                            <li><span class="category-icon">🏫</span> <strong>Kelas</strong> - Ruang belajar siswa</li>
                            <li><span class="category-icon">📚</span> <strong>Perpustakaan</strong> - Koleksi buku dan ruang baca</li>
                            <li><span class="category-icon">⚽</span> <strong>Lapangan</strong> - Area olahraga sekolah</li>
                            <li><span class="category-icon">🍽️</span> <strong>Kantin</strong> - Tempat makan dan istirahat</li>
                            <li><span class="category-icon">🏥</span> <strong>UKS</strong> - Unit kesehatan sekolah</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
       
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
