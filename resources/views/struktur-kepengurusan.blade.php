@extends('layouts.app')

@section('title', 'Struktur Kepengurusan - UKM Mapala Cakra Manggala')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-success text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-3" data-aos="fade-up">Struktur Kepengurusan</h1>
                <div class="mt-3" data-aos="fade-up" data-aos-delay="200">
                    <span class="badge bg-light text-success fs-6 px-3 py-2">Tabah • Tangguh • Terampil</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Struktur Kepengurusan Section -->
<section class="py-5">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title mb-3">Pengurus UKM Mapala Cakra Manggala Periode 2024-2025</h2>
            <p class="text-muted">Tim solid yang berkomitmen memajukan organisasi dan mengembangkan potensi anggota</p>
        </div>

        <!-- Ketua Umum -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                <div class="card border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                             class="rounded-circle mb-3" width="120" height="120" style="object-fit: cover;" alt="Ketua">
                        <h5 class="mb-1">Satria Dwi Saputra</h5>
                        <p class="text-success fw-bold">Ketua Umum</p>
                        <p class="text-muted small">Teknik Listrik '23</p>
                        <p class="small fst-italic">"Tidak perlu kata-kata yang penting bukti nyata"</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengurus Inti -->
        <div class="mb-4" data-aos="fade-up">
            <h4 class="text-center mb-4 text-success">Pengurus Inti</h4>
        </div>
        
        <div class="row g-4 mb-5">
            <!-- Sekretaris -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                             class="rounded-circle mb-3" width="100" height="100" style="object-fit: cover;" alt="Sekretaris">
                        <h6 class="mb-1">Naufal Rohmanul Muhaimin</h6>
                        <p class="text-success fw-bold">Sekretaris</p>
                        <p class="text-muted small">Teknik Komputer Kontrol '23</p>
                    </div>
                </div>
            </div>

            <!-- Bendahara -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                             class="rounded-circle mb-3" width="100" height="100" style="object-fit: cover;" alt="Bendahara">
                        <h6 class="mb-1">Alvina Qorik Cahyani</h6>
                        <p class="text-success fw-bold">Bendahara</p>
                        <p class="text-muted small">Akuntansi '23</p>
                    </div>
                </div>
            </div>

            <!-- Kepala Bidang Logistik -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                             class="rounded-circle mb-3" width="100" height="100" style="object-fit: cover;" alt="Logistik">
                        <h6 class="mb-1">Nama Lengkap</h6>
                        <p class="text-success fw-bold">Kepala Bidang Logistik</p>
                        <p class="text-muted small">Teknik Rekayasa Otomotif '22</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kepala Bidang -->
        <div class="mb-4" data-aos="fade-up">
            <h4 class="text-center mb-4 text-success">Kepala Bidang</h4>
        </div>

        <div class="row g-4 mb-5">
            <!-- Kepala Bidang Publikasi dan Dokumentasi -->
            <div class="col-lg-6 col-md-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                             class="rounded-circle mb-3" width="100" height="100" style="object-fit: cover;" alt="Publikasi">
                        <h6 class="mb-1">Muhammad Dzakwan Alfaris</h6>
                        <p class="text-success fw-bold">Kepala Bidang Publikasi dan Dokumentasi</p>
                        <p class="text-muted small">Teknologi Rekayasa Perangkat Lunak '23</p>
                    </div>
                </div>
            </div>

            <!-- Kepala Bidang Kaderisasi, Penelitian dan PSDM -->
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                             class="rounded-circle mb-3" width="100" height="100" style="object-fit: cover;" alt="Kaderisasi">
                        <h6 class="mb-1">Maulaya Ilyasa Jayamagusta</h6>
                        <p class="text-success fw-bold">Kepala Bidang Kaderisasi, Penelitian dan PSDM</p>
                        <p class="text-muted small">Perkeretaapian '23</p>
                    </div>
                </div>
            </div>

            <!-- Kepala Bidang Lingkungan dan Pengabdian Masyarakat -->
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                             class="rounded-circle mb-3" width="100" height="100" style="object-fit: cover;" alt="Lingkungan">
                        <h6 class="mb-1">Erzal Abilla Saputra</h6>
                        <p class="text-success fw-bold">Kepala Bidang Lingkungan dan Pengabdian Masyarakat</p>
                        <p class="text-muted small">Teknologi Informasi '23</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Anggota Bidang -->
        <div class="mb-4" data-aos="fade-up">
            <h4 class="text-center mb-4 text-success">Anggota Bidang</h4>
        </div>

        <div class="row g-4">
            <!-- Anggota Bidang Lingkungan dan Pengabdian Masyarakat -->
            <div class="col-lg-12" data-aos="fade-up">
                <div class="card border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                             class="rounded-circle mb-3" width="100" height="100" style="object-fit: cover;" alt="Anggota">
                        <h6 class="mb-1">Rindu Resty Ananda Faradilla</h6>
                        <p class="text-success fw-bold">Anggota Bidang Lingkungan dan Pengabdian Masyarakat</p>
                        <p class="text-muted small">Akuntansi Sektor Publik '22</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.hero-section {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
    pointer-events: none;
}

.section-title {
    position: relative;
    color: #343a40;
}

.section-title::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: -10px;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: linear-gradient(135deg, #28a745, #20c997);
    border-radius: 2px;
}

.card {
    transition: all 0.3s ease;
    border-radius: 15px;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
}

.card img {
    border: 3px solid #fff;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.card:hover img {
    transform: scale(1.05);
}

.badge {
    border-radius: 25px;
    font-weight: 500;
}

@media (max-width: 768px) {
    .display-4 {
        font-size: 2.5rem;
    }
    
    .card-body {
        padding: 1.5rem !important;
    }
    
    .card img {
        width: 80px !important;
        height: 80px !important;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Initialize AOS
AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true,
    offset: 100
});
</script>
@endpush