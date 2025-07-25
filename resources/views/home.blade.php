{{-- File: resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Beranda - UKM Mapala Cakra Manggala')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="hero-content text-center text-lg-start">
                        <h1 class="hero-title" data-aos="fade-up">
                            UKM MAPALA<br>
                            <span style="color: #ff6b35;">CAKRA MANGGALA</span>
                        </h1>
                        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                            Bergabunglah dengan komunitas pecinta alam yang berkomitmen menjaga kelestarian lingkungan dan mengembangkan jiwa petualang
                        </p>
                        <div class="hero-buttons" data-aos="fade-up" data-aos-delay="400">
                            <a href="{{ route('join') }}" class="btn btn-oprec btn-lg mb-2 mb-md-0 me-0 me-md-3">
                                <i class="bi bi-person-plus"></i> 
                                <span class="d-none d-sm-inline">Daftar Sekarang</span>
                                <span class="d-sm-none">Daftar</span>
                            </a>
                            <a href="{{ route('activities') }}" class="btn btn-outline-light btn-lg">
                                <i class="bi bi-images"></i> 
                                <span class="d-none d-sm-inline">Lihat Kegiatan</span>
                                <span class="d-sm-none">Kegiatan</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <i class="bi bi-chevron-down text-white fs-3"></i>
        </div>
    </section>

        <!-- News Section -->
    <section class="news-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">
                <i class="bi bi-newspaper me-2"></i>
                Berita & Artikel Terbaru
            </h2>
            
            @if($artikels->count() > 0)
                <div class="row g-3 g-md-4">
                    @foreach($artikels as $artikel)
                    <!-- News Card -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card news-card h-100" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            @if($artikel->gambar_utama)
                                <img src="{{ asset('storage/' . $artikel->gambar_utama) }}" 
                                    class="card-img-top" 
                                    alt="{{ $artikel->judul }}" 
                                    loading="lazy"
                                    style="height: 200px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                    style="height: 200px;">
                                    <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                            
                            <div class="card-body d-flex flex-column">
                                <div class="news-meta">
                                    <i class="bi bi-calendar"></i> 
                                    <span class="d-none d-sm-inline">{{ $artikel->created_at->format('d F Y') }}</span>
                                    <span class="d-sm-none">{{ $artikel->created_at->format('d/m/y') }}</span> | 
                                    <i class="bi bi-person"></i> {{ $artikel->user->name }}
                                    @if($artikel->views > 0)
                                        | <i class="bi bi-eye"></i> {{ number_format($artikel->views) }}
                                    @endif
                                </div>
                                
                                <h5 class="card-title">{{ $artikel->judul }}</h5>
                                
                                <p class="card-text flex-grow-1">
                                    {{ $artikel->excerpt ?: Str::limit(strip_tags($artikel->konten), 120) }}
                                </p>
                                
                                <a href="{{ route('artikel.show', $artikel->slug) }}" 
                                class="btn btn-outline-primary btn-sm mt-auto">
                                    <span class="d-none d-sm-inline">Baca Selengkapnya</span>
                                    <span class="d-sm-none">Baca</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Link ke halaman artikel lengkap -->
                @if($artikels->count() >= 6)
                    <div class="text-center mt-4" data-aos="fade-up">
                        <a href="{{ route('artikel.index') }}" class="btn btn-primary">
                            <i class="bi bi-arrow-right"></i> Lihat Semua Artikel
                        </a>
                    </div>
                @endif
            @else
                <!-- Jika belum ada artikel -->
                <div class="text-center py-5" data-aos="fade-up">
                    <i class="bi bi-newspaper display-1 text-muted"></i>
                    <h5 class="mt-3 text-muted">Belum Ada Artikel</h5>
                    <p class="text-muted">Artikel dan berita terbaru akan segera hadir.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Quick Links Section 
    <section class="quick-links">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">
                <i class="bi bi-lightning me-2"></i>
                Akses Cepat
            </h2>
            
            <div class="row g-3 g-md-4">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="quick-link-item h-100" data-aos="fade-up">
                        <div class="quick-link-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5>Profil Organisasi</h5>
                        <p class="quick-link-desc">Pelajari sejarah, visi misi, dan struktur kepengurusan UKM Mapala Cakra Manggala</p>
                        <a href="{{ route('about') }}" class="btn btn-outline-success btn-sm mt-auto">
                            <span class="d-none d-sm-inline">Lihat Detail</span>
                            <span class="d-sm-none">Detail</span>
                        </a>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="quick-link-item h-100" data-aos="fade-up" data-aos-delay="100">
                        <div class="quick-link-icon">
                            <i class="bi bi-images"></i>
                        </div>
                        <h5>Galeri Kegiatan</h5>
                        <p class="quick-link-desc">Dokumentasi lengkap ekspedisi, pendakian, susur sungai, dan kegiatan konservasi kami</p>
                        <a href="{{ route('activities') }}" class="btn btn-outline-success btn-sm mt-auto">
                            <span class="d-none d-sm-inline">Jelajahi</span>
                            <span class="d-sm-none">Galeri</span>
                        </a>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="quick-link-item h-100" data-aos="fade-up" data-aos-delay="200">
                        <div class="quick-link-icon">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <h5>Pendaftaran Anggota</h5>
                        <p class="quick-link-desc">Bergabung dengan komunitas pecinta alam terbesar di kampus dan wujudkan jiwa petualangmu</p>
                        <a href="{{ route('join') }}" class="btn btn-warning btn-sm mt-auto">
                            <span class="d-none d-sm-inline">Daftar Sekarang</span>
                            <span class="d-sm-none">Daftar</span>
                        </a>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="quick-link-item h-100" data-aos="fade-up" data-aos-delay="300">
                        <div class="quick-link-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h5>Hubungi Kami</h5>
                        <p class="quick-link-desc">Informasi kontak, lokasi sekretariat, dan akses ke media sosial resmi kami</p>
                        <a href="{{ route('contact') }}" class="btn btn-outline-success btn-sm mt-auto">
                            <span class="d-none d-sm-inline">Kontak</span>
                            <span class="d-sm-none">Kontak</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container text-center text-white">
            <div data-aos="fade-up">
                <h2 class="cta-title">Siap Memulai Petualangan?</h2>
                <p class="cta-subtitle">Bergabunglah dengan keluarga besar Mapala Cakra Manggala dan temukan pengalaman tak terlupakan di alam bebas</p>
                <a href="{{ route('join') }}" class="btn btn-oprec btn-lg cta-button">
                    <i class="bi bi-arrow-right-circle"></i> 
                    <span class="d-none d-sm-inline">Mulai Perjalananmu</span>
                    <span class="d-sm-none">Mulai Sekarang</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Additional Responsive Styles -->
    <style>
        /* Hero Section */
        .hero-section {
        position: relative;
        height: 80vh;
        display: flex;
        align-items: center;
        color: white;
        overflow: hidden;
        z-index: 1;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            animation: bgSlider 18s infinite;
            z-index: -2;
            opacity: 0.5;
        }
        .hero-section::after {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6); /* lapisan hitam transparan */
            z-index: -1;
        }

        @keyframes bgSlider {
            0%   { background-image: url('/image/fotobersejarah1.jpg'); }
            33%  { background-image: url('/image/fotobersejarah2.jpg'); }
            66%  { background-image: url('/image/fotobersejarah3.jpg'); }
            100% { background-image: url('/image/fotobersejarah1.jpg'); }
        }

        .hero-title,
        .hero-subtitle {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
          
        .btn-oprec {
            background: var(--accent-color);
            border: none;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-oprec:hover {
            background: #e55722;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);
        }
    
        
        /* Statistics Section */
        .stats-section {
            padding: 3rem 0;
        }
        
        .stat-item {
            padding: 1.5rem 1rem;
            text-align: center;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            color: var(--accent-color);
        }
        
        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
        }
        
        /* News Cards */
        .news-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .news-card .card-img-top {
            height: 180px;
            object-fit: cover;
        }
        
        .news-meta {
            color: #666;
            font-size: 0.85rem;
            margin-bottom: 0.75rem;
        }
        
        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: var(--primary-color);
        }
        
        .card-text {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.5;
        }
        
        /* Quick Links */
        .quick-link-item {
            text-align: center;
            padding: 2rem 1.5rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            border: 2px solid #e9ecef;
            background: white;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        .quick-link-item:hover {
            border-color: var(--secondary-color);
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(76, 175, 80, 0.15);
        }
        
        .quick-link-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }
        
        .quick-link-item h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .quick-link-desc {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.5;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }
        
        /* CTA Section */
        .cta-section {
            padding: 3rem 0;
            background: var(--primary-color);
        }
        
        .cta-title {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        
        .cta-subtitle {
            font-size: 0.9rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .cta-button {
            font-size: 1rem;
            padding: 1rem 2rem;
        }
        
        /* Mobile Responsive Breakpoints */
        @media (max-width: 991px) {
            .hero-buttons {
                flex-direction: column;
                align-items: stretch;
            }
            
            .hero-buttons .btn {
                width: 100%;
                max-width: 300px;
                margin: 0 auto;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section {
                min-height: 60vh; /* diperkecil dari biasanya 100vh */
                padding: 2.5rem 1rem 4rem;
            }

            .hero-section::before {
                background-size: cover;
                background-position: center top;
                opacity: 0.35;
            }

            .hero-section::after {
                background: rgba(0, 0, 0, 0.6); /* pastikan teks tetap terbaca */
            }

            .hero-buttons {
                justify-content: center;
            }

            .btn-oprec {
                padding: 0.8rem 1.8rem;
                font-size: 1rem;
                width: 100%;
                justify-content: center;
            }

            .hero-buttons .btn {
                width: 100%;
                justify-content: center;
            }
            
            .news-section, .quick-links {
                padding: 3rem 0;
            }
            
            .section-title {
                font-size: 1.8rem;
                margin-bottom: 2rem;
            }
            
            .quick-link-item {
                padding: 1.5rem 1rem;
            }
            
            .quick-link-icon {
                font-size: 2rem;
            }
            
            .cta-section {
                padding: 2rem 0;
            }
            
            .cta-title {
                font-size: 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .hero-section::before {
                background-size: cover;
                background-position: center;
                opacity: 0.4; /* Sedikit dikurangi agar teks lebih jelas di layar kecil */
            }

            .hero-section::after {
                background: rgba(0, 0, 0, 0.7); /* Gelapkan sedikit layer overlay agar teks tetap terbaca */
            }

            .hero-title {
                font-size: 1.5rem;
                margin-bottom: 0.75rem;
            }

            .hero-subtitle {
                font-size: 0.9rem;
                margin-bottom: 1rem;
            }

            .hero-buttons .btn {
                font-size: 0.85rem;
                padding: 0.6rem 1.2rem;
            }

            .btn-oprec {
                padding: 0.8rem 1.5rem;
                font-size: 1rem;
            }
            
           
            .news-card .card-img-top {
                height: 160px;
            }
            
            .card-body {
                padding: 1rem;
            }
            
            .quick-link-item {
                padding: 1.25rem 0.75rem;
            }
            
            .quick-link-item h5 {
                font-size: 1rem;
            }
            
            .quick-link-desc {
                font-size: 0.85rem;
            }
            
            .cta-title {
                font-size: 1.75rem;
            }
            
            .cta-subtitle {
                font-size: 1rem;
            }
            
            .scroll-indicator {
                bottom: 1rem;
            }
        }
        
        /* Extra small devices */
        @media (max-width: 350px) {
            .container {
                padding-left: 10px;
                padding-right: 10px;
            }
            
            .hero-title {
                font-size: 1.8rem;
            }
            
            .btn-lg {
                font-size: 0.9rem;
                padding: 0.75rem 1.25rem;
            }
            
            .news-card .card-img-top {
                height: 140px;
            }
        }
        
        /* Ensure equal height for cards */
        .news-card,
        .quick-link-item {
            height: 100%;
        }
        
        /* Better button spacing on mobile */
        @media (max-width: 575px) {
            .btn + .btn {
                margin-left: 0 !important;
                margin-top: 0.5rem;
            }
        }
    </style>
@endsection