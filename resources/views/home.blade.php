{{-- File: resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Beranda - UKM Mapala Cakra Manggala')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 hero-content">
                    <h1 class="hero-title" data-aos="fade-up">
                        UKM MAPALA<br>
                        <span style="color: #ff6b35;">CAKRA MANGGALA</span>
                    </h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                        Bergabunglah dengan komunitas pecinta alam yang berkomitmen menjaga kelestarian lingkungan dan mengembangkan jiwa petualang
                    </p>
                    <div data-aos="fade-up" data-aos-delay="400">
                        <a href="{{ route('join') }}" class="btn btn-oprec btn-lg me-3">
                            <i class="bi bi-person-plus"></i> Daftar Sekarang
                        </a>
                        <a href="{{ route('activities') }}" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-images"></i> Lihat Kegiatan
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-4">
            <i class="bi bi-chevron-down text-white fs-3 animate__animated animate__bounce animate__infinite"></i>
        </div>
    </section>


    <!-- News Section -->
    <section class="news-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">
                <i class="bi bi-newspaper me-2"></i>
                Berita & Artikel Terbaru
            </h2>
            
            <div class="row g-4">
                <!-- News Card 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card news-card" data-aos="fade-up">
                        <img src="{{ asset('image/img2.jpeg') }}" class="card-img-top" alt="Pendakian Lawu">
                        <div class="card-body">
                            <div class="news-meta">
                                <i class="bi bi-calendar"></i> 19 April 2025 | 
                                <i class="bi bi-person"></i> AdminCM
                            </div>
                            <h5 class="card-title">Musim Pengembaraan I: Menuju Puncak Tertinggi ke 6 Jawa</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et</p>
                            <a href="#" class="btn btn-outline-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                
                <!-- News Card 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card news-card" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('image/img1.jpeg') }}" class="card-img-top" alt="Training SAR">
                        <div class="card-body">
                            <div class="news-meta">
                                <i class="bi bi-calendar"></i> 4 Juli 2025 | 
                                <i class="bi bi-person"></i> Kegiatan
                            </div>
                            <h5 class="card-title">Diklat Akhir XIII : Cakra Manggala Siap Melaju Tanpa Batas</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et</p>
                            <a href="#" class="btn btn-outline-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                
                <!-- News Card 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card news-card" data-aos="fade-up" data-aos-delay="200">
                        <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Konservasi Hutan">
                        <div class="card-body">
                            <div class="news-meta">
                                <i class="bi bi-calendar"></i> 5 Juli 2025 | 
                                <i class="bi bi-person"></i> Konservasi
                            </div>
                            <h5 class="card-title">Ekspedisi Merah Putih di Tebing Kertoembo</h5>
                            <p class="card-text">Dalam rangka memperingati Hari Kemerdekaan Republik Indonesia ke-78, tim Cakra Manggala melakukan pendakian dan pengibaran bendera Merah Putih di puncak tebing Kertoembo</p>
                            <a href="#" class="btn btn-outline-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4" data-aos="fade-up">
                <a href="#" class="btn btn-primary btn-lg">
                    <i class="bi bi-journal-text"></i> Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>

    <!-- Quick Links Section -->
    <section class="quick-links">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">
                <i class="bi bi-lightning me-2"></i>
                Akses Cepat
            </h2>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="quick-link-item" data-aos="fade-up">
                        <div class="quick-link-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5>Profil Organisasi</h5>
                        <p>Pelajari sejarah, visi misi, dan struktur kepengurusan UKM Mapala Cakra Manggala</p>
                        <a href="{{ route('about') }}" class="btn btn-outline-success">Lihat Detail</a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="quick-link-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="quick-link-icon">
                            <i class="bi bi-images"></i>
                        </div>
                        <h5>Galeri Kegiatan</h5>
                        <p>Dokumentasi lengkap ekspedisi, pendakian, susur sungai, dan kegiatan konservasi kami</p>
                        <a href="{{ route('activities') }}" class="btn btn-outline-success">Jelajahi</a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="quick-link-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="quick-link-icon">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <h5>Pendaftaran Anggota</h5>
                        <p>Bergabung dengan komunitas pecinta alam terbesar di kampus dan wujudkan jiwa petualangmu</p>
                        <a href="{{ route('join') }}" class="btn btn-warning">Daftar Sekarang</a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="quick-link-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="quick-link-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h5>Hubungi Kami</h5>
                        <p>Informasi kontak, lokasi sekretariat, dan akses ke media sosial resmi kami</p>
                        <a href="{{ route('contact') }}" class="btn btn-outline-success">Kontak</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5" style="background: var(--primary-color);">
        <div class="container text-center text-white">
            <div data-aos="fade-up">
                <h2 class="mb-3">Siap Memulai Petualangan?</h2>
                <p class="lead mb-4">Bergabunglah dengan keluarga besar Mapala Cakra Manggala dan temukan pengalaman tak terlupakan di alam bebas</p>
                <a href="{{ route('join') }}" class="btn btn-oprec btn-lg">
                    <i class="bi bi-arrow-right-circle"></i> Mulai Perjalananmu
                </a>
            </div>
        </div>
    </section>
@endsection