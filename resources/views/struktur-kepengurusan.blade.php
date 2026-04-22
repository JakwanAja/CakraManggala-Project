@extends('layouts.app')

@section('title', 'Struktur Kepengurusan - UKM Cakra Manggala')

@push('styles')
<style>
    .org-period-card {
        padding: 1.2rem 1.3rem;
        border: 1px solid rgba(18, 33, 25, 0.08);
        background: rgba(255, 255, 255, 0.75);
        box-shadow: var(--shadow-soft);
        text-align: center;
    }

    .org-grid {
        display: grid;
        gap: 1.5rem;
    }

    .org-member-card {
        height: 100%;
        text-align: center;
    }

    .org-member-card__avatar-wrap {
        position: relative;
        display: inline-flex;
        margin-bottom: 1rem;
    }

    .org-member-card__avatar {
        width: 112px;
        height: 112px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid rgba(26, 67, 49, 0.08);
        background: #e2ddd4;
        box-shadow: 0 18px 34px rgba(7, 17, 12, 0.1);
    }

    .org-member-card--leader .org-member-card__avatar {
        width: 136px;
        height: 136px;
    }

    .org-member-card__badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        right: 0.15rem;
        bottom: 0.15rem;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: linear-gradient(135deg, #f2c57b 0%, #de9541 100%);
        color: #15120d;
        box-shadow: 0 10px 20px rgba(222, 149, 65, 0.24);
    }

    .org-member-card__name {
        margin-bottom: 0.45rem;
        color: var(--primary-color);
        font-size: 1.1rem;
        line-height: 1.35;
    }

    .org-member-card__role {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.48rem 0.85rem;
        margin-bottom: 0.7rem;
        border: 1px solid rgba(26, 67, 49, 0.12);
        background: rgba(26, 67, 49, 0.06);
        color: var(--primary-color);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .org-member-card__study {
        margin: 0;
        color: var(--muted-color);
        line-height: 1.7;
    }

    .org-member-card__quote {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid var(--border-soft);
        color: var(--muted-color);
        font-style: italic;
        line-height: 1.7;
    }

    @media (max-width: 575px) {
        .org-member-card__avatar {
            width: 96px;
            height: 96px;
        }

        .org-member-card--leader .org-member-card__avatar {
            width: 116px;
            height: 116px;
        }
    }
</style>
@endpush

@section('content')
@php
    $heroImage = asset('image/fotobersejarah2.jpg');
    $emptyPhoto = asset('image/profilkosong.png');

    $leader = [
        'name' => 'Satria Dwi Saputra',
        'role' => 'Ketua Umum',
        'study' => "Teknik Listrik '23",
        'quote' => 'Tidak perlu kata-kata yang penting bukti nyata',
    ];

    $coreMembers = [
        ['name' => 'Naufal Rohmanul Muhaimin', 'role' => 'Sekretaris', 'study' => "Teknik Komputer Kontrol '23"],
        ['name' => 'Alvina Qorik Cahyani', 'role' => 'Bendahara', 'study' => "Akuntansi '23"],
        ['name' => 'Albert Setya Candra Wijaya', 'role' => 'Kepala Bidang Logistik', 'study' => "Teknik Rekayasa Otomotif '22"],
    ];

    $divisionHeads = [
        ['name' => 'Muhammad Dzakwan Alfaris', 'role' => 'Kepala Bidang Publikasi dan Dokumentasi', 'study' => "Teknologi Rekayasa Perangkat Lunak '23"],
        ['name' => 'Maulaya Ilyasa Jayamagusta', 'role' => 'Kepala Bidang Kaderisasi, Penelitian dan PSDM', 'study' => "Perkeretaapian '23"],
        ['name' => 'Erzal Abilla Saputra', 'role' => 'Kepala Bidang Lingkungan dan Pengabdian Masyarakat', 'study' => "Teknologi Informasi '23"],
    ];

    $divisionMembers = [
        ['name' => 'Rindu Resty Ananda Faradilla', 'role' => 'Anggota Bidang Lingkungan dan Pengabdian Masyarakat', 'study' => "Akuntansi Sektor Publik '22"],
    ];
@endphp

<section class="page-hero">
    <div class="page-hero__media" aria-hidden="true">
        <div class="page-hero__fallback" style="background-image: url('{{ $heroImage }}'); position: absolute; inset: -4%; background-size: cover; background-position: center; filter: saturate(0.8) contrast(1.1); transform: scale(1.05);"></div>
        <div class="page-hero__overlay"></div>
    </div>
    <div class="container">
        <div class="page-hero__inner" data-aos="fade-up">
            <span class="page-hero__eyebrow">
                <i class="bi bi-people"></i>
                Keluarga Besar
            </span>
            <h1 class="page-hero__title">Struktur<br><span>Kepengurusan</span></h1>
            <p class="page-hero__lead">
                Sinergi antar bidang dan tanggung jawab kolektif yang menjaga keberlangsungan roda organisasi Cakra Manggala.
            </p>
        </div>
    </div>
</section>

<section class="section-shell">
    <div class="container">
        <div class="org-period-card" data-aos="fade-up">
            <span class="section-kicker mb-3">
                <i class="bi bi-calendar-check-fill"></i>
                Periode Aktif
            </span>
            <h2 class="section-heading mb-2">2024-2025</h2>
            <p class="section-lead mx-auto mb-0">
                Pengurus aktif Unit Kegiatan Mahasiswa Pecinta Alam Cakra Manggala untuk satu periode kepengurusan berjalan.
            </p>
        </div>
    </div>
</section>

<section class="section-shell section-shell--soft">
    <div class="container">
        <div class="section-intro" data-aos="fade-up">
            <span class="section-kicker">
                <i class="bi bi-award-fill"></i>
                Pimpinan Organisasi
            </span>
            <h2 class="section-heading">Ketua umum</h2>
            <p class="section-lead mx-auto">
                Peran sentral yang menjaga arah organisasi, ritme kerja, dan semangat kepengurusan tetap satu jalur.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5" data-aos="fade-up">
                <article class="surface-card org-member-card org-member-card--leader">
                    <div class="org-member-card__avatar-wrap">
                        <img src="{{ $emptyPhoto }}" alt="{{ $leader['name'] }}" class="org-member-card__avatar">
                        <span class="org-member-card__badge"><i class="bi bi-star-fill"></i></span>
                    </div>
                    <h3 class="org-member-card__name">{{ $leader['name'] }}</h3>
                    <div class="org-member-card__role">{{ $leader['role'] }}</div>
                    <p class="org-member-card__study">{{ $leader['study'] }}</p>
                    <p class="org-member-card__quote">"{{ $leader['quote'] }}"</p>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="section-shell">
    <div class="container">
        <div class="section-intro" data-aos="fade-up">
            <span class="section-kicker">
                <i class="bi bi-diagram-2-fill"></i>
                Pengurus Inti
            </span>
            <h2 class="section-heading">Peran yang menjaga operasional tetap jalan</h2>
            <p class="section-lead mx-auto">
                Tim inti menjadi penghubung antara arah organisasi, administrasi, logistik, dan kebutuhan pelaksanaan kegiatan.
            </p>
        </div>

        <div class="row g-4">
            @foreach($coreMembers as $member)
                <div class="col-12 col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                    <article class="surface-card org-member-card">
                        <div class="org-member-card__avatar-wrap">
                            <img src="{{ $emptyPhoto }}" alt="{{ $member['name'] }}" class="org-member-card__avatar">
                        </div>
                        <h3 class="org-member-card__name">{{ $member['name'] }}</h3>
                        <div class="org-member-card__role">{{ $member['role'] }}</div>
                        <p class="org-member-card__study">{{ $member['study'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-shell section-shell--soft">
    <div class="container">
        <div class="section-intro" data-aos="fade-up">
            <span class="section-kicker">
                <i class="bi bi-grid-3x3-gap-fill"></i>
                Kepala Bidang
            </span>
            <h2 class="section-heading">Fokus kerja dibagi lebih jelas</h2>
            <p class="section-lead mx-auto">
                Setiap bidang memegang area tanggung jawab yang berbeda agar ritme organisasi tetap terarah dan terukur.
            </p>
        </div>

        <div class="row g-4">
            @foreach($divisionHeads as $member)
                <div class="col-12 col-lg-6 {{ $loop->last ? 'col-xl-12' : 'col-xl-6' }}" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                    <article class="surface-card org-member-card">
                        <div class="org-member-card__avatar-wrap">
                            <img src="{{ $emptyPhoto }}" alt="{{ $member['name'] }}" class="org-member-card__avatar">
                        </div>
                        <h3 class="org-member-card__name">{{ $member['name'] }}</h3>
                        <div class="org-member-card__role">{{ $member['role'] }}</div>
                        <p class="org-member-card__study">{{ $member['study'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-shell">
    <div class="container">
        <div class="section-intro" data-aos="fade-up">
            <span class="section-kicker">
                <i class="bi bi-person-check-fill"></i>
                Anggota Bidang
            </span>
            <h2 class="section-heading">Tim pendukung pelaksana</h2>
            <p class="section-lead mx-auto">
                Peran pelaksana memperkuat tiap bidang supaya program kerja benar-benar bisa berjalan di lapangan.
            </p>
        </div>

        <div class="row justify-content-center">
            @foreach($divisionMembers as $member)
                <div class="col-12 col-md-8 col-lg-5" data-aos="fade-up">
                    <article class="surface-card org-member-card">
                        <div class="org-member-card__avatar-wrap">
                            <img src="{{ $emptyPhoto }}" alt="{{ $member['name'] }}" class="org-member-card__avatar">
                        </div>
                        <h3 class="org-member-card__name">{{ $member['name'] }}</h3>
                        <div class="org-member-card__role">{{ $member['role'] }}</div>
                        <p class="org-member-card__study">{{ $member['study'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-shell section-shell--soft">
    <div class="container">
        <div class="surface-card text-center" data-aos="fade-up">
            <span class="icon-badge mb-4"><i class="bi bi-people-fill"></i></span>
            <h2 class="section-heading mb-3">Semangat kerja kolektif</h2>
            <p class="section-lead mx-auto mb-0" style="max-width: 860px;">
                "Bersama-sama kita membangun organisasi yang kuat, berkarakter, dan bermanfaat bagi semua. Setiap pengurus adalah <strong>pemimpin</strong> yang bertanggung jawab atas kemajuan UKM Pecinta Alam Cakra Manggala."
            </p>
        </div>
    </div>
</section>
@endsection
