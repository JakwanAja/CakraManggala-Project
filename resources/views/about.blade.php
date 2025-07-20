@extends('layouts.app')

@section('content')

@php
    $bgImage = asset('image/fotobersejarah2.jpg');
@endphp

<!-- Hero Section -->
<section class="hero-section" style="height: 60vh; background: linear-gradient(rgba(46, 125, 50, 0.8), rgba(27, 94, 32, 0.9)), url('{{ $bgImage }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row align-items-center h-100">
            <div class="col-12 text-center text-white">
                <h1 class="display-4 fw-bold mb-3" data-aos="fade-up">Tentang Kami</h1>
                <p class="lead" data-aos="fade-up" data-aos-delay="200">
                    Mengenal lebih dalam Unit Kegiatan Mahasiswa Pecinta Alam Cakra Manggala
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Profil Organisasi Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="{{ asset('image/fotobersejarah1.jpg') }}" 
                     class="img-fluid rounded shadow" alt="Tim Mapala">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="mb-4" style="color: var(--primary-color);">
                    <i class="bi bi-tree me-2"></i>Awal Berdiri
                </h2>
                <p class="lead mb-4">
                    Kegiatan kepencintaalaman di Politeknik Negeri Madiun tumbuh dari semangat mahasiswa yang mencintai alam dan ingin menyalurkan kegemarannya melalui aktivitas positif. Melihat belum adanya wadah resmi, sekelompok mahasiswa berinisiatif mendirikan sebuah organisasi pada 26 Juli 2013 dengan nama GEMAPALA (Generasi Mahasiswa Pecinta Alam). Organisasi ini menjadi tempat berkumpul, belajar, dan bergerak bersama dalam melestarikan alam, membentuk karakter, serta mempererat solidaritas antaranggota melalui kegiatan di alam bebas. Pada 19 Oktober 2014, GEMAPALA resmi berganti nama menjadi CAKRA MANGGALA, yang membawa semangat baru dalam menjalankan misi kepencintaalaman.
                </p>
                <p class="mb-4">
                    CAKRA MANGGALA hadir bukan hanya sebagai komunitas pecinta alam, tetapi juga sebagai wadah pembentukan pribadi tangguh, berjiwa sosial, dan peduli lingkungan. Berasaskan Pancasila dan UUD 1945, organisasi ini tetap netral dari politik dan konsisten menjalankan perannya sebagai pelopor kegiatan alam bebas yang edukatif, ilmiah, dan humanis di lingkungan Politeknik Negeri Madiun.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Visi Misi Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <i class="bi bi-eye fs-1" style="color: var(--primary-color);"></i>
                            <h3 class="mt-3" style="color: var(--primary-color);">Visi</h3>
                        </div>
                        <p class="text-center fs-5 lh-lg">
                            "Mahasiswa Pecinta Alam Cakra Manggala Politeknik Negeri Madiun sebagai organisasi yang mengembangkan intelektualitas, jasmani, dan rohani serta menumbuhkan kesadaran terhadap alam, sehingga menjadi panutan bagi Pemuda Indonesia pada umumnya dan Politeknik Negeri Madiun Khususnya."
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <i class="bi bi-bullseye fs-1" style="color: var(--primary-color);"></i>
                            <h3 class="mt-3" style="color: var(--primary-color);">Misi</h3>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Menjalankan organisasi dengan prinsip tata kelola yang baik dan mengikat
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Meningkatkan kemampuan teknis, fisik, dan kesadaran terhadap lingkungan hidup.
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Membangun hubungan yang baik dan saling menguntungkan dengan pihak internal maupun eksternal Mahasiswa Pecinta Alam Cakra Manggala Politeknik Negeri Madiun.
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Mengembangkan kegiatan yang mendukung kemajuan ilmu pengetahuan.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Nilai-nilai Organisasi 
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" style="color: var(--primary-color);" data-aos="fade-up">
                <i class="bi bi-heart me-2"></i>Nilai-nilai Organisasi
            </h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="text-center p-4">
                        <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-shield-check text-white fs-2"></i>
                        </div>
                        <h5>Integritas</h5>
                        <p class="text-muted">Berpegang teguh pada kejujuran, transparansi, dan konsistensi dalam setiap tindakan dan keputusan.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-center p-4">
                        <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-trophy text-white fs-2"></i>
                        </div>
                        <h5>Prestasi</h5>
                        <p class="text-muted">Berusaha memberikan yang terbaik dan mencapai keunggulan dalam setiap kegiatan yang dilakukan.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-center p-4">
                        <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-book text-white fs-2"></i>
                        </div>
                        <h5>Pembelajaran</h5>
                        <p class="text-muted">Senantiasa belajar, mengembangkan diri, dan berbagi pengetahuan dengan sesama anggota.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="text-center p-4">
                        <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-lightning text-white fs-2"></i>
                        </div>
                        <h5>Petualang</h5>
                        <p class="text-muted">Memiliki jiwa penjelajah yang berani menghadapi tantangan dan selalu siap untuk petualangan baru.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Struktur Pengurus -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5" style="color: var(--primary-color);" data-aos="fade-up">
                <i class="bi bi-diagram-3 me-2"></i>Struktur Kepengurusan 2024/2025
            </h2>
            
            <!-- Ketua & Wakil -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                 class="rounded-circle mb-3" width="120" height="120" style="object-fit: cover;" alt="Ketua">
                            <h5 class="mb-1">Satria Dwi Saputra</h5>
                            <p class="text-success fw-bold">Ketua Umum</p>
                            <p class="text-muted small">Teknik Listrik '23</p>
                            <p class="small">"Tidak perlu kata-kata yang penting bukti nyata"</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengurus Inti -->
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-3">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                 class="rounded-circle mb-3" width="80" height="80" style="object-fit: cover;" alt="Sekretaris">
                            <h6 class="mb-1">Naufal Rohmanul Muhaimin</h6>
                            <p class="text-success fw-bold small">Sekretaris</p>
                            <p class="text-muted small">Teknik Komputer Kontrol '23</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-3">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                 class="rounded-circle mb-3" width="80" height="80" style="object-fit: cover;" alt="Bendahara">
                            <h6 class="mb-1">Alvina Qorik Cahyani</h6>
                            <p class="text-success fw-bold small">Bendahara</p>
                            <p class="text-muted small">Akuntansi '23</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-3">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                 class="rounded-circle mb-3" width="80" height="80" style="object-fit: cover;" alt="Koordinator">
                            <h6 class="mb-1">Muhammad Dzakwan Alfaris</h6>
                            <p class="text-success fw-bold small">Kepala Bidang Publikasi dan Dokumentasi</p>
                            <p class="text-muted small">Teknologi Rekayasa Perangkat Lunak '23</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-3">
                            <img src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                 class="rounded-circle mb-3" width="80" height="80" style="object-fit: cover;" alt="Humas">
                            <h6 class="mb-1">Maulaya Ilyasa Jayamagusta</h6>
                            <p class="text-success fw-bold small">Kepala Bidang Kaderisasi, Penelitian dan PSDM</p>
                            <p class="text-muted small">Perkeretaapian '23</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-3">
                            <img src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                 class="rounded-circle mb-3" width="80" height="80" style="object-fit: cover;" alt="Humas">
                            <h6 class="mb-1">Erzal Abilla Saputra</h6>
                            <p class="text-success fw-bold small">Kepala Bidang Lingkungan dan Pengabdian Masyarakat</p>
                            <p class="text-muted small">Teknologi Informasi '23</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-3">
                            <img src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                 class="rounded-circle mb-3" width="80" height="80" style="object-fit: cover;" alt="Humas">
                            <h6 class="mb-1">Rindu Resty Ananda Faradilla</h6>
                            <p class="text-success fw-bold small">Anggota Bidang Lingkungan dan Pengabdian Masyarakat</p>
                            <p class="text-muted small">Akuntansi Sektor Publik '22</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-3">
                            <img src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                 class="rounded-circle mb-3" width="80" height="80" style="object-fit: cover;" alt="Humas">
                            <h6 class="mb-1">Bidang Lingkungan dan Pengabdian Masyarakat</h6>
                            <p class="text-success fw-bold small">Kepala Bidang Logistik</p>
                            <p class="text-muted small">Teknik Rekayasa Otomotif '22</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5" style="background: var(--primary-color);">
        <div class="container text-center text-white">
            <div data-aos="fade-up">
                <h2 class="mb-3">Tertarik Bergabung dengan Kami?</h2>
                <p class="lead mb-4">Jadilah bagian dari keluarga besar Mapala Cakra Manggala dan wujudkan impian petualanganmu!</p>
                <a href="{{ route('join') }}" class="btn btn-oprec btn-lg me-3">
                    <i class="bi bi-person-plus"></i> Bergabung Sekarang
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                    <i class="bi bi-chat-dots"></i> Hubungi Kami
                </a>
            </div>
        </div>
    </section>
@endsection