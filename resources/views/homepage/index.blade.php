<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK Indonesia Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

    <!-- Header -->
    <header class="bg-light p-3 d-flex align-items-center">
        <img src="logo.png" alt="Logo" class="me-3" width="40">
        <div>
            <h5 class="m-0 fw-bold">SMK INDONESIA DIGITAL</h5>
            <small>maju seiring perkembangan digital</small>
        </div>
    </header>

    <!-- Gallery Section -->
    <section class="gallery bg-primary text-white text-center py-3">
        <h6 class="text-end pe-3"><small>GALERY KEGIATAN SEKOLAH</small></h6>
        <div class="container">
            <div class="img-placeholder"></div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="container my-4">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex bg-light p-3">
                    <div class="img-placeholder-sm me-3"></div>
                    <div>
                        <h6 class="fw-bold">Judul</h6>
                        <p class="small">Lorem ipsum dolor sit amet consectetur. Euismod accumsan nulla turpis nulla...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Agenda & Latest Info -->
    <section class="container">
        <div class="row">
            <div class="col-md-6 p-3 bg-danger text-white">
                <h6 class="fw-bold">AGENDA SEKOLAH</h6>
                <ul class="small">
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Mi viverra pellentesque</li>
                    <li>Magna diam id. Quam in etiam</li>
                    <li>Id malesuada amet urna quam eget.</li>
                    <li>Ut donec in tellus dolor tellus sed.</li>
                    <li>Mi libero consectetur faucibus.</li>
                    <li>Lectus tincidunt molestie ac consequat neque.</li>
                </ul>
            </div>
            <div class="col-md-6 p-3 bg-light">
                <h6 class="fw-bold">INFORMASI TERKINI</h6>
                <p class="small">PRESTASI JUARA 1 LOMBA KOMPETENSI</p>
                <div class="img-placeholder-sm my-2"></div>
                <p class="small">Lorem ipsum dolor sit amet consectetur. Rhoncus pellentesque tincidunt fringilla...</p>
            </div>
        </div>
    </section>

    <!-- School Map -->
    <section class="container my-4">
        <div class="row">
            <div class="col-md-12 p-3 bg-light">
                <h6 class="fw-bold">PETA SEKOLAH</h6>
                <p class="small">address school</p>
                <div class="img-placeholder-lg">
                    <img src="petasekolah.png" class="img-placeholder-lg" alt="peta sekolah" >
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
