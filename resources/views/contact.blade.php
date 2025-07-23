{{-- File: resources/views/contact.blade.php --}}
@extends('layouts.app')

@section('title', 'Kontak dan Sosial Media - UKM Mapala Cakra Manggala')

@section('content')
<!-- Hero Section -->
<section class="hero-section d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up">
                <h1 class="hero-title display-4 fw-bold mb-4">Kontak dan Sosial Media</h1>
                <p class="hero-subtitle lead mb-4">Hubungi kami untuk informasi lebih lanjut tentang UKM Mapala Cakra Manggala</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Logos Section -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-6 text-center" data-aos="fade-up">
                <div class="d-flex justify-content-center align-items-center gap-4 flex-wrap">
                    <div class="logo-item">
                        <img src="{{ asset('image/logo-pnm.png') }}" alt="Logo Cakra Manggala" class="img-fluid mb-2" style="max-width: 120px; height: auto;">
                        <h6 class="text-success fw-bold">UKM Mapala<br>Cakra Manggala</h6>
                    </div>
                    <div class="logo-divider d-none d-md-block" style="width: 2px; height: 80px; background: #2e7d32;"></div>
                    <div class="logo-item">
                        <img src="{{ asset('image/logo.png') }}" alt="Logo Politeknik Negeri Madiun" class="img-fluid mb-2" style="max-width: 120px; height: auto;">
                        <h6 class="text-success fw-bold">Politeknik Negeri<br>Madiun</h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Cards -->
        <div class="row g-4">
            <!-- Alamat Sekretariat -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-card h-100">
                    <div class="contact-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h4>Alamat Sekretariat</h4>
                    <div class="contact-info">
                        <p class="mb-2"><strong>Sekretariat UKM Mapala Cakra Manggala</strong></p>
                        <p class="mb-2">Lantai 1 Gedung Perkuliahan Kampus 1</p>
                        <p class="mb-2">Politeknik Negeri Madiun</p>
                        <p class="mb-2">Jl. Serayu No.84, Pandean, Taman, Pandean, Kec. Taman,Kota Madiun, Jawa Timur (63133) </p>
                    </div>  
                </div>
            </div>

            <!-- Kontak Pengurus -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-card h-100">
                    <div class="contact-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <h4>Kontak Pengurus</h4>
                    <div class="contact-info">
                        <div class="contact-person mb-3">
                            <p class="mb-1"><strong>Ketua Umum</strong></p>
                            <p class="mb-1">Satria Dwi Saputra</p>
                            <p class="mb-0"><i class="bi bi-whatsapp text-success me-2"></i>+62 823-3266-7197</p>
                        </div>
                        <div class="contact-person mb-3">
                            <p class="mb-1"><strong>Sekretaris</strong></p>
                            <p class="mb-1">Naufal Rohmanul Muhaimin</p>
                            <p class="mb-0"><i class="bi bi-whatsapp text-success me-2"></i>+62 851-1705-2306</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Email & Website -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="contact-card h-100">
                    <div class="contact-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h4>Email & Website</h4>
                    <div class="contact-info">
                        <div class="mb-3">
                            <p class="mb-1"><strong>Email Resmi</strong></p>
                            <a href="mailto:sekretariat.cakramanggala@pnm.ac.id" class="text-decoration-none">
                                <i class="bi bi-envelope me-2"></i>sekretariat.cakramanggala@pnm.ac.id
                            </a>
                        </div>
                        <div>
                            <p class="mb-1"><strong>Website</strong></p>
                            <a href="https://cakramanggala.pnm.ac.id" class="text-decoration-none" target="_blank">
                                <i class="bi bi-globe me-2"></i>cakramanggala.pnm.ac.id
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Media Section -->
<section class="py-5" style="background: linear-gradient(135deg, #2e7d32 0%, #4caf50 100%);">
    <div class="container">
        <div class="row justify-content-center text-center text-white">
            <div class="col-lg-8 mb-5" data-aos="fade-up">
                <h2 class="fw-bold mb-3">Ikuti Sosial Media Kami</h2>
                <p class="lead">Dapatkan update terbaru tentang kegiatan, event, dan informasi penting lainnya dari UKM Mapala Cakra Manggala</p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Instagram -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                <div class="social-card">
                    <div class="social-icon instagram">
                        <i class="bi bi-instagram"></i>
                    </div>
                    <h5>Instagram</h5>
                    <p class="mb-3">@cakramanggala.pnm</p>
                    <a href="https://instagram.com/cakramanggala.pnm" target="_blank" class="btn btn-light btn-sm">
                        <i class="bi bi-instagram me-2"></i>Follow
                    </a>
                </div>
            </div>

            <!-- Facebook -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                <div class="social-card">
                    <div class="social-icon facebook">
                        <i class="bi bi-facebook"></i>
                    </div>
                    <h5>Facebook</h5>
                    <p class="mb-3">Cakra Manggala PNM</p>
                    <a href="..." target="_blank" class="btn btn-light btn-sm">
                        <i class="bi bi-facebook me-2"></i>Like
                    </a>
                </div>
            </div>

            <!-- YouTube -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                <div class="social-card">
                    <div class="social-icon youtube">
                        <i class="bi bi-youtube"></i>
                    </div>
                    <h5>YouTube</h5>
                    <p class="mb-3">Cakra Manggala Official</p>
                    <a href="https://youtube.com/" target="_blank" class="btn btn-light btn-sm">
                        <i class="bi bi-youtube me-2"></i>Subscribe
                    </a>
                </div>
            </div>

            <!-- TikTok -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="400">
                <div class="social-card">
                    <div class="social-icon tiktok">
                        <i class="bi bi-music-note"></i>
                    </div>
                    <h5>TikTok</h5>
                    <p class="mb-3">@cakramanggala.pnm</p>
                    <a href="https://tiktok.com/" target="_blank" class="btn btn-light btn-sm">
                        <i class="bi bi-music-note me-2"></i>Follow
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-success mb-3">Lokasi Kami</h2>
                    <p class="lead">Temukan lokasi sekretariat UKM Mapala Cakra Manggala di Politeknik Negeri Madiun</p>
                </div>
                
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.7234567890123!2d111.52123456789012!3d-7.612345678901234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be35b3456789%3A0x1234567890abcdef!2sPoliteknik%20Negeri%20Madiun!5e0!3m2!1sid!2sid!4v1234567890123!5m2!1sid!2sid" 
                        width="100%" 
                        height="400" 
                        style="border:0; border-radius: 15px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.contact-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.contact-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    border-color: var(--secondary-color);
}

.contact-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: white;
    font-size: 2rem;
}

.contact-card h4 {
    color: var(--primary-color);
    font-weight: 700;
    margin-bottom: 1.5rem;
}

.contact-info {
    text-align: left;
}

.contact-info a {
    color: var(--primary-color);
    transition: all 0.3s ease;
}

.contact-info a:hover {
    color: var(--secondary-color);
    text-decoration: underline !important;
}

.social-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 2rem;
    border-radius: 15px;
    text-align: center;
    transition: all 0.3s ease;
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.social-card:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: translateY(-10px);
    border-color: rgba(255, 255, 255, 0.4);
}

.social-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 2.5rem;
    color: white;
}

.social-icon.instagram {
    background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
}

.social-icon.facebook {
    background: #1877f2;
}

.social-icon.youtube {
    background: #ff0000;
}

.social-icon.tiktok {
    background: linear-gradient(45deg, #ff0050, #00f2ea);
}

.social-card h5 {
    color: white;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.social-card p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
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
    color: white;
    text-decoration: none;
}

.btn-oprec:hover {
    background: #e55722;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);
    color: white;
}

.logo-item h6 {
    margin-bottom: 0;
    line-height: 1.2;
}

.map-container {
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border-radius: 15px;
    overflow: hidden;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .contact-card {
        padding: 1.5rem;
    }
    
    .social-card {
        padding: 1.5rem;
    }
    
    .contact-icon,
    .social-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .logo-divider {
        display: none !important;
    }
    
    .logo-item {
        margin-bottom: 2rem;
    }
    
    .logo-item:last-child {
        margin-bottom: 0;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .contact-person {
        padding: 1rem;
        background: rgba(46, 125, 50, 0.05);
        border-radius: 8px;
        margin-bottom: 1rem !important;
    }
}
</style>
@endsection