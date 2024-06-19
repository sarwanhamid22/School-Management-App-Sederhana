<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SMK Gamelab Indonesia</title>
    <link rel="icon" href="{{ asset('assets/dist/img/Smk_Gamelab.png') }}">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo1.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <!-- AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">
    <header id="header" class="header fixed-top">

        <!-- Branding -->
        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <!-- Uncomment jika menggunakan logo berupa gambar -->
                    <!-- <img src="assets/img/logo.png" alt=""> -->
                    <img src="{{ asset('assets/dist/img/SMK_GAMELAB_INDONESIA-WHITE.png') }}"
                        alt="Logo SMK Gamelab Indonesia">
                    <h1 class="sitename">SMK Gamelab Indonesia</h1>
                    <span>.</span>
                </a>

                <!-- Navigation Menu -->
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#beranda" class="active">Beranda</a></li>

                        <li class="dropdown">
                            <a href="#"><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#tentang">Tentang SMK Gamelab</a></li>
                                <li><a href="#visimisi">Visi Misi</a></li>
                            </ul>
                        </li>

                        <li><a href="#kegiatan">Kegiatan</a></li>
                        <li><a href="#galeri">Galeri</a></li>
                        <li><a href="#testimoni">Testimoni</a></li>
                        <li><a href="#timkami">Tim Kami</a></li>
                        <li><a href="#pertanyaan">Pertanyaan</a></li>
                        <li><a href="#kontak">Kontak</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>
        </div><!-- End Branding -->
    </header>
</body>
<main class="main">

    <!-- Beranda Section -->
    <section id="beranda" class="beranda section">

        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-5 justify-content-between">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h2><span>Selamat Datang Di </span><span class="accent">SMK Gamelab</span></h2>
                    <p>SMK Gamelab adalah sebuah institusi pendidikan kejuruan yang berfokus pada pengembangan
                        keterampilan dalam bidang teknologi dan game. Dengan kurikulum yang terintegrasi dengan
                        industri, SMK Gamelab memberikan pelatihan komprehensif dalam pengembangan game, animasi,
                        desain grafis, dan teknologi informasi.</p>
                    <div class="d-flex">
                        <a href="#tentang" class="btn-get-started">Mulai</a>
                        <a href="https://youtu.be/Lkj6_RmN4G4?si=1FkvvurQQHu286Lw"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Lihat Video</span></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 d-flex align-items-center">
                    <img src="assets/img/smk.png" class="img-fluid" alt="" data-aos="zoom-in"
                        data-aos-delay="200">
                </div>
            </div>
        </div>
        <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
            <div class="container position-relative">
                <div class="row gy-4 mt-5">
                    <div class="col-xl-3 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-controller"></i></div>
                            <h4 class="title"><a href="" class="stretched-link">Pengembangan Game</a>
                            </h4>
                        </div>
                    </div><!--End Icon Box -->
                    <div class="col-xl-3 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-film"></i></div>
                            <h4 class="title"><a href="" class="stretched-link">Animasi 3D</a>
                            </h4>
                        </div>
                    </div><!--End Icon Box -->
                    <div class="col-xl-3 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-palette"></i></div>
                            <h4 class="title"><a href="" class="stretched-link">Desain Grafis</a></h4>
                        </div>
                    </div><!--End Icon Box -->
                    <div class="col-xl-3 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-laptop"></i></div>
                            <h4 class="title"><a href="" class="stretched-link">Teknologi Informasi</a>
                            </h4>
                        </div>
                    </div><!--End Icon Box -->
                </div>
            </div>
        </div>
    </section><!-- /Beranda Section -->
</main>

<!-- Tentang Section -->
<section id="tentang" class="tentang">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Tentang SMK Gamelab<br></h2>
        <p>Optimasi Skill dan Kompetensi, Lebih Siap Kerja dan Wirausaha</p>
    </div><!-- End Section Title -->
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3>Gedung SMK Gamelab</h3>
                <img src="assets/img/Gamelab-Kantor-Baru.jpg" class="img-fluid rounded-4 mb-4" alt="">
                <p>GAMELAB menghadirkan platform lengkap untuk meningkatkan kompetensi lulusan yang siap kerja dan
                    siap wirausaha melalui program pelatihan berbasis proyek (PBL), magang online bersertifikat, dan
                    sertifikasi industri.</p>
                <p>GAMELAB menjembatani dunia pendidikan dan DUDIKA (Dunia Usaha & Dunia Industri Kerja) sehingga
                    mempersiapkan lulusan SMA/SMK dan Perguruan Tinggi agar lebih kompeten dan siap Kerja siap
                    Wirausaha.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="content ps-0 ps-lg-5">
                    <p class="fst-italic">
                        Program Unggulan SMK Gamelab
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Menggunakan kurikulum berbasis industri
                                yang dipadukan dengan metode PBL (Project-based Learning) sehingga pelatihan menjadi
                                lebih berkualitas. Pelatihan di GAMELAB juga didukung oleh pengajar expert di
                                bidangnya serta teknologi yang spesial sehingga belajar tidak hanya menonton video
                                saja, tetapi benar-benar praktik.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Berbagai program intensif tersedia
                                dimulai dari offline bootcamp, Kelas Industri SMK, Kartu Prakerja, dan juga Studi
                                Independen Bersertifikat (SIB).</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Ukur pencapaian kompetensi siswa di SMK
                                Anda sebelum mereka lulus. Sertifikat kompetensi bisa digunakan sebagai bekal mereka
                                masuk dunia kerja.</span></li>
                    </ul>
                    <p>
                        Saatnya mewujudkan SMK BISA HEBAT, siap kerja siap berwirausaha. SMK Binaan Gamelab adalah
                        kelas khusus yang dibentuk atas kerjasama SMK dan Industri untuk mewujudkan siswa yang
                        kompeten. Kurikulum berbasis industri dan standard kelulusan yang sesuai dengan kebutuhan
                        industri.
                    </p>
                    <div class="position-relative mt-4">
                        <img src="assets/img/Tentang-SMK-Gamelab.jpg" class="img-fluid rounded-4" alt="">
                        <a href="https://youtu.be/ftJtfoSKbCQ?si=jI9LAAFXOQ8mpPVt" class="glightbox play-btn"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Tentang Section -->

<!-- Klien Section -->
<section id="clients" class="clients section">
    <div class="container">
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><img src="assets/img/clients/educa-studiov2.png" class="img-fluid"
                        alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/logo-cakap.png" class="img-fluid"
                        alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/logo-maubelajarapa.png" class="img-fluid"
                        alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/logo-sekolahmu.png" class="img-fluid"
                        alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/logo-pijarmahir.png" class="img-fluid"
                        alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/logo-pintaria.png" class="img-fluid"
                        alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/logo-tokopedia.png" class="img-fluid"
                        alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/logo-bhinneka.png" class="img-fluid"
                        alt=""></div>
            </div>
        </div>
    </div>
</section><!-- /Klien Section -->

<!-- Hasil Karya Section -->
<section id="call-to-action" class="call-to-action section">
    <div class="container">
        <img src="assets/img/BannerShare.png" alt="">
        <div class="content row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-10">
                <div class="text-center">
                    <a href="https://youtu.be/Lkj6_RmN4G4?si=1FkvvurQQHu286Lw" class="glightbox play-btn"></a>
                    <h3>Hasil Karya</h3>
                    <p>Ruang - Gamelab Showreel</p>
                    <a class="cta-btn" href="https://www.youtube.com/@gamelabindonesia/videos">Lihat Hasil Karya</a>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Lihat Hasil Karya Section -->

<!-- Visi Misi Section -->
<section id="visimisi" class="visimisi section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Visi Misi SMK Gamelab</h2>
        <p>Tempat Belajar Cepat, Tepat, Terjangkau, dan Menyenangkan</p>
    </div><!-- End Section Title -->
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="visi-misi-item  position-relative">
                    <div class="icon">
                        <i class="bi bi-activity"></i>
                    </div>
                    <h3>Visi</h3>
                    <p>Mendekatkan dunia pendidikan dan dunia industri dengan menyediakan program-program yang
                        terus diperbaiki. Mempercepat hal tersebut melalui optimalisasi pendidikan. Membuat
                        proses peningkatan skill menjadi lebih mudah, lebih cepat dan lebih murah.</p>
                    <a href="#visimisi" class="readmore stretched-link">Baca Selengkapnya <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div><!-- End Visi Misi Item -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="visi-misi-item position-relative">
                    <div class="icon">
                        <i class="bi bi-broadcast"></i>
                    </div>
                    <h3>Misi</h3>
                    <p>Memberikan pelatihan dan workshop untuk peningkatan skill melalui Akademi Gamelab.</p>
                    <a href="#visimisi" class="readmore stretched-link">Baca Selengkapnya <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div><!-- End Visi Misi Item -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="visi-misi-item position-relative">
                    <div class="icon">
                        <i class="bi bi-easel"></i>
                    </div>
                    <h3>Misi</h3>
                    <p>Mempertemukan talenta yang mumpuni dengan dunia industri melalui program Karir Gamelab.
                    </p>
                    <a href="#visimisi" class="readmore stretched-link">Baca Selengkapnya <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div><!-- End Visi-Misi Item -->
        </div>
    </div>
</section><!-- /Visi Misi Section -->

<!-- Kegiatan -->
<section id="kegiatan" class="kegiatan section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Kegiatan SMK Gamelab</h2>
        <p>Kumpulan Kegiatan Di SMK Gamelab</p>
    </div><!-- End Section Title -->
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <article class="post-card">
                    <div class="post-img">
                        <img src="assets/img/blog/Kegiatan-Gamelab-1.jpg" alt="" class="img-fluid">
                    </div>
                    <p class="post-category">Pembelajaran</p>
                    <h2 class="title">
                        <a href="#kegiatan">Kegiatan Visitasi Gamelab.ID Ke SMK Gamelab</a>
                    </h2>
                    <div class="post-author">
                        <img src="assets/img/blog/Mibroatin.png" alt="" class="img-fluid post-author-img">
                        <p>Mibroatin</p>
                    </div>
                    <div class="post-meta">
                        <time datetime="2022-01-01">Jan 1, 2022</time>
                    </div>
                </article>
            </div><!-- End post list item -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <article class="post-card">
                    <div class="post-img">
                        <img src="assets/img/blog/Kegiatan-Gamelab-2.jpg" alt="" class="img-fluid">
                    </div>
                    <p class="post-category">Pembelajaran</p>
                    <h2 class="title">
                        <a href="#kegiatan">Kegiatan Visitasi Gamelab.ID Ke SMK Gamelab</a>
                    </h2>
                    <div class="post-author">
                        <img src="assets/img/blog/Mibroatin.png" alt="" class="img-fluid post-author-img">
                        <p>Mibroatin</p>
                    </div>
                    <div class="post-meta">
                        <time datetime="2022-01-01">Jun 5, 2022</time>
                    </div>
                </article>
            </div><!-- End post list item -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <article class="post-card">
                    <div class="post-img">
                        <img src="assets/img/blog/Kegiatan-Gamelab-3.jpg" alt="" class="img-fluid">
                    </div>
                    <p class="post-category">Pembelajaran</p>
                    <h2 class="title">
                        <a href="#kegiatan">Kegiatan Pembinaan Di SMK Gamelab</a>
                    </h2>
                    <div class="post-author">
                        <img src="assets/img/blog/Mibroatin.png" alt="" class="img-fluid post-author-img">
                        <p>Mibroatin</p>
                    </div>
                    <div class="post-meta">
                        <time datetime="2022-01-01">Jun 22, 2022</time>
                    </div>
                </article>
            </div><!-- End post list item -->
        </div><!-- End recent posts list -->
    </div>
</section><!-- /Kegiatan Section -->

<!-- Galeri Section -->
<section id="galeri" class="galeri section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Galeri SMK Gamelab</h2>
        <p>Kumpulan Galeri dari SMK Gamelab</p>
    </div><!-- End Section Title -->
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div id="galeriCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 galeri-item">
                            <div class="card">
                                <a href="assets/img/galeri/Galeri-Gamelab-1.jpg" data-gallery="galeri-gallery"
                                    class="glightbox">
                                    <img src="assets/img/galeri/Galeri-Gamelab-1.jpg" class="card-img-top"
                                        alt="Kunjungan Industri SMK Gamelab">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">Kunjungan Industri SMK Gamelab</h5>
                                    <p class="card-text">Gamelab.ID</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 galeri-item">
                            <div class="card">
                                <a href="assets/img/galeri/Galeri-Gamelab-2.jpg" data-gallery="galeri-gallery"
                                    class="glightbox">
                                    <img src="assets/img/galeri/Galeri-Gamelab-2.jpg" class="card-img-top"
                                        alt="Kunjungan Industri SMK Gamelab">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">Kunjungan Industri SMK Gamelab</h5>
                                    <p class="card-text">Gamelab.ID</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 galeri-item">
                            <div class="card">
                                <a href="assets/img/galeri/Galeri-Gamelab-3.jpg" data-gallery="galeri-gallery"
                                    class="glightbox">
                                    <img src="assets/img/galeri/Galeri-Gamelab-3.jpg" class="card-img-top"
                                        alt="Kunjungan Industri SMK Gamelab">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">Kunjungan Industri SMK Gamelab</h5>
                                    <p class="card-text">Gamelab.ID</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Carousel Item -->
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 galeri-item">
                            <div class="card">
                                <a href="assets/img/galeri/Galeri-Gamelab-4.jpg" data-gallery="galeri-gallery"
                                    class="glightbox">
                                    <img src="assets/img/galeri/Galeri-Gamelab-4.jpg" class="card-img-top"
                                        alt="Kunjungan Industri SMK Gamelab">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">Kunjungan Industri SMK Gamelab</h5>
                                    <p class="card-text">Gamelab.ID</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 galeri-item">
                            <div class="card">
                                <a href="assets/img/galeri/Galeri-Gamelab-5.jpg" data-gallery="galeri-gallery"
                                    class="glightbox">
                                    <img src="assets/img/galeri/Galeri-Gamelab-5.jpg" class="card-img-top"
                                        alt="Kunjungan Industri SMK Gamelab">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">Kunjungan Industri SMK Gamelab</h5>
                                    <p class="card-text">Gamelab.ID</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 galeri-item">
                            <div class="card">
                                <a href="assets/img/galeri/Galeri-Gamelab-6.jpg" data-gallery="galeri-gallery"
                                    class="glightbox">
                                    <img src="assets/img/galeri/Galeri-Gamelab-6.jpg" class="card-img-top"
                                        alt="Kunjungan Industri SMK Gamelab">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">Kunjungan Industri SMK Gamelab</h5>
                                    <p class="card-text">Gamelab.ID</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Carousel Item -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#galeriCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#galeriCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section><!-- /Galeri Section -->

<!-- Testimoni Section -->
<section id="testimoni" class="testimoni section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Testimoni</h2>
        <p>Silakan Berikan Saran Dan Kritik Untuk SMK Gamelab</p>
    </div><!-- End Section Title -->
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 10
                }
              }
            }
          </script>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testimoni-item">
                        <img src="assets/img/testimoni/testimoni-1.jpg" class="testimoni-img" alt="">
                        <h3>Bayu Pramana</h3>
                        <h4>Ceo &amp; Founder</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>SMK Gamelab memiliki lingkungan belajar yang sangat mendukung. Saya merasa berkembang
                                pesat selama bersekolah di sini. Terima kasih SMK Gamelab!</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End Testimoni item -->

                <div class="swiper-slide">
                    <div class="testimoni-item">
                        <img src="assets/img/testimoni/testimoni-2.jpg" class="testimoni-img" alt="">
                        <h3>Ratna Pertiwi </h3>
                        <h4>Designer</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Dengan berbagai program pelatihan dan magang, SMK Gamelab mempersiapkan siswa untuk
                                dunia kerja dengan sangat baik. Pengalaman yang saya dapatkan sangat berharga.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimoni item -->

                <div class="swiper-slide">
                    <div class="testimoni-item">
                        <img src="assets/img/testimoni/testimoni-3.jpg" class="testimoni-img" alt="">
                        <h3>Kartika Indah</h3>
                        <h4>Store Owner</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Belajar di SMK Gamelab sangat menyenangkan. Para pengajar profesional dan selalu
                                memberikan dukungan penuh kepada siswa. Saya sangat merekomendasikan sekolah ini.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End Testimoni item -->

                <div class="swiper-slide">
                    <div class="testimoni-item">
                        <img src="assets/img/testimoni/testimoni-4.jpg" class="testimoni-img" alt="">
                        <h3>Bintang Rizqi</h3>
                        <h4>Freelancer</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>SMK Gamelab memberikan pengalaman belajar yang luar biasa. Kurikulum yang inovatif dan
                                fasilitas yang lengkap membuat siswa siap untuk terjun ke dunia industri kreatif.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End Testimoni item -->

                <div class="swiper-slide">
                    <div class="testimoni-item">
                        <img src="assets/img/testimoni/testimoni-5.jpg" class="testimoni-img" alt="">
                        <h3>Hendra Lesmana</h3>
                        <h4>Entrepreneur</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>SMK Gamelab adalah tempat yang tepat untuk mengembangkan keterampilan dan pengetahuan
                                di bidang industri kreatif. Saya bangga menjadi bagian dari sekolah ini.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End Testimoni item -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section><!-- /Testimoni Section -->

<!-- Tim Kami Section -->
<section id="timkami" class="timkami section">
    <!-- Judul Bagian -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Tim Kami</h2>
        <p>Capstone Project Kelompok 3</p>
    </div><!-- End Judul Bagian -->
    <div class="container">
        <div class="row gy-4 d-flex justify-content-center">
            <div class="col-xl-2 col-md-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <img src="assets/img/timkami/Jatmiko-Amung-Prasojo.png" class="img-fluid"
                        alt="Jatmiko Amung Prasojo">
                    <h4>Jatmiko Amung Prasojo</h4>
                    <span>Mentor Full-Stack Web Developer 1</span>
                    <div class="social">
                        <a href="https://www.linkedin.com/in/jatmikoap/"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div><!-- End Anggota Tim -->
            <div class="col-xl-2 col-md-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <img src="assets/img/timkami/Sarwan.png" class="img-fluid" alt="Sarwan Hamid">
                    <h4>Sarwan Hamid</h4>
                    <span>Full-Stack Web Developer</span>
                    <div class="social">
                        <a href="https://www.linkedin.com/in/sarwan-hamid/"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div><!-- End Anggota Tim -->
            <div class="col-xl-2 col-md-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <img src="assets/img/timkami/Ariya.png" class="img-fluid" alt="Ariya Pratama Adjie Nugroho">
                    <h4>Ariya Pratama Adjie Nugroho</h4>
                    <span>Full-Stack Web Developer</span>
                    <div class="social">
                        <a href="https://www.linkedin.com/in/ariya-pratama-01b873217/"><i
                                class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div><!-- End Anggota Tim -->
            <div class="col-xl-2 col-md-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <img src="assets/img/timkami/Dandy.png" class="img-fluid" alt="Dandy Adriyansah">
                    <h4>Dandi Ardiyansyah</h4>
                    <span>Full-Stack Web Developer</span>
                    <div class="social">
                        <a href="https://www.linkedin.com/in/dandi-ardiansyah-623508249/"><i
                                class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div><!-- End Anggota Tim -->
            <div class="col-xl-2 col-md-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <img src="assets/img/timkami/Mibroatin.png" class="img-fluid" alt="Mibroatin">
                    <h4>Mibroatin</h4>
                    <span>Full-Stack Web Developer</span>
                    <div class="social">
                        <a href="https://www.linkedin.com/in/mibroatin-titin-b93ba82ab/"><i
                                class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div><!-- End Anggota Tim -->
        </div>
    </div>
</section><!-- /Bagian Tim -->

<!-- Pertanyaan Section -->
<section id="pertanyaan" class="pertanyaan section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="content px-xl-5">
                    <h3><span>Pertanyaan yang Sering </span><strong>Diajukan</strong></h3>
                    <p>
                        Berikut adalah beberapa pertanyaan yang sering diajukan mengenai SMK Gamelab. Jika Anda
                        memiliki pertanyaan lain, jangan ragu untuk menghubungi kami.
                    </p>
                </div>
            </div>
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                <div class="pertanyaan-container">
                    <div class="pertanyaan-item pertanyaan-active">
                        <h3><span class="num">1.</span> <span>Apa saja program studi yang ditawarkan di SMK
                                Gamelab?</span></h3>
                        <div class="pertanyaan-content">
                            <p>SMK Gamelab menawarkan program studi seperti Pengembangan Game, Animasi, Desain
                                Grafis, dan Teknologi Informasi. Kurikulum kami dirancang untuk mempersiapkan siswa
                                menghadapi industri kreatif dan teknologi dengan penekanan pada keterampilan praktis
                                dan proyek nyata.</p>
                        </div>
                        <i class="pertanyaan-toggle bi bi-chevron-right"></i>
                    </div><!-- End Pertanyaan item-->
                    <div class="pertanyaan-item">
                        <h3><span class="num">2.</span> <span>Bagaimana proses pendaftaran di SMK
                                Gamelab?</span></h3>
                        <div class="pertanyaan-content">
                            <p>Proses pendaftaran di SMK Gamelab melibatkan beberapa langkah yaitu pengisian
                                formulir online di situs resmi kami, pengumpulan dokumen pendukung seperti rapor dan
                                surat rekomendasi, serta mengikuti tes seleksi yang meliputi tes akademik dan
                                wawancara. Informasi lebih detail dapat ditemukan di halaman pendaftaran di situs
                                kami.</p>
                        </div>
                        <i class="pertanyaan-toggle bi bi-chevron-right"></i>
                    </div><!-- End Pertanyaan item-->
                    <div class="pertanyaan-item">
                        <h3><span class="num">3.</span> <span>Apakah SMK Gamelab memiliki program magang?</span>
                        </h3>
                        <div class="pertanyaan-content">
                            <p>Ya, SMK Gamelab memiliki program magang yang bekerja sama dengan berbagai perusahaan
                                di industri teknologi dan kreatif. Program magang ini bertujuan untuk memberikan
                                siswa pengalaman kerja nyata dan kesempatan untuk menerapkan keterampilan yang telah
                                dipelajari di kelas dalam lingkungan kerja profesional.</p>
                        </div>
                        <i class="pertanyaan-toggle bi bi-chevron-right"></i>
                    </div><!-- End Pertanyaan item-->
                    <div class="pertanyaan-item">
                        <h3><span class="num">4.</span> <span>Apa saja fasilitas yang tersedia di SMK
                                Gamelab?</span></h3>
                        <div class="pertanyaan-content">
                            <p>SMK Gamelab menyediakan berbagai fasilitas modern untuk mendukung proses belajar
                                mengajar. Fasilitas ini termasuk laboratorium komputer dengan perangkat keras dan
                                perangkat lunak terbaru, studio animasi, ruang desain grafis, perpustakaan digital,
                                dan ruang kelas yang dilengkapi dengan teknologi pembelajaran interaktif.</p>
                        </div>
                        <i class="pertanyaan-toggle bi bi-chevron-right"></i>
                    </div><!-- End Pertanyaan item-->
                    <div class="pertanyaan-item">
                        <h3><span class="num">5.</span> <span>Bagaimana dukungan karir bagi lulusan SMK
                                Gamelab?</span></h3>
                        <div class="pertanyaan-content">
                            <p>SMK Gamelab memiliki unit layanan karir yang khusus membantu lulusan dalam mencari
                                pekerjaan dan mempersiapkan diri untuk memasuki dunia kerja. Layanan ini termasuk
                                bimbingan karir, workshop persiapan kerja, serta jaringan dengan
                                perusahaan-perusahaan di industri teknologi dan kreatif untuk membuka peluang kerja
                                bagi lulusan kami.</p>
                        </div>
                        <i class="pertanyaan-toggle bi bi-chevron-right"></i>
                    </div><!-- End Pertanyaan item-->
                </div>
            </div>
        </div>
    </div>
</section><!-- /Pertanyaan Section -->

<!-- Kontak Section -->
<section id="kontak" class="kontak section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>Punya Pertanyaan Atau Butuh Bantuan?</p>
    </div><!-- End Section Title -->
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gx-lg-0 gy-4">
            <div class="col-lg-4">
                <div class="info-container d-flex flex-column align-items-center justify-content-center">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="100">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Alamat</h3>
                            <p>Jl. Kalisombo No.18, Salatiga, Kec. Sidorejo, Kota Salatiga, Jawa Tengah 50711</p>
                        </div>
                    </div><!-- End Info Item -->
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="100">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Kontak SMK Gamelab</h3>
                            <p>0821-3820-8122</p>
                        </div>
                    </div><!-- End Info Item -->
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="100">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email SMK Gamelab</h3>
                            <p>smk@gamelab.com<< /p>
                        </div>
                    </div><!-- End Info Item -->
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="100">
                        <i class="bi bi-clock flex-shrink-0"></i>
                        <div>
                            <h3>Buka Pukul:</h3>
                            <p>Senin-Sabtu: 07 Pagi - 17 Sore</p>
                        </div>
                    </div><!-- End Info Item -->
                </div>
            </div>
            <div class="col-lg-8">
                <form action="forms/kontak.php" method="post" class="php-email-form" data-aos="fade"
                    data-aos-delay="100">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Nama Kamu"
                                required="">
                        </div>
                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="Email Kamu"
                                required="">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subyek"
                                required="">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="8" placeholder="Pesan" required=""></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Pesan Kamu Telah Terkirim. Terima Kasih!</div>
                            <button type="submit">Kirim Pesan</button>
                        </div>
                    </div>
                </form>
            </div><!-- End Kontak Form -->
        </div>
    </div>
</section><!-- /Kontak Section -->

</main>
<footer id="footer" class="footer">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-tentang">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">SMK Gamelab</span>
                </a>
                <div class="social-links d-flex mt-4">
                    <a href="https://twitter.com/GameLabID"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://www.facebook.com/educagamelab/?locale=id_ID"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/gamelab.id/"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/gamelab-indonesia/mycompany/"><i
                            class="bi bi-linkedin"></i></a>
                    <a href="https://wa.me/6282138208122" target="_blank">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 footer-kontak text-center text-md-start">
                <h4>Kontak SMK Gamelab</h4>
                <p>Jl. Kalisombo No.18</p>
                <p>Salatiga, Kec. Sidorejo, Kota Salatiga,</p>
                <p>Jawa Tengah 50711</p>
                <p class="mt-4"><strong>Telpon:</strong> <span>0821-3820-8122</span></p>
                <p><strong>Email:</strong> <span>smk@gamelab.com</span></p>
            </div>
        </div>
    </div>
    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">SMK Gamelab</strong> <span>All Rights
                Reserved</span>
        </p>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<!-- Preloader -->
<div id="preloader"></div>
<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<!-- Main JS File -->
<script src="assets/js/main.js"></script>
</body>

</html>
