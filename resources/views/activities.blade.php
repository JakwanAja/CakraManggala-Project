@extends('layouts.app')

@section('title', 'Kegiatan - UKM Cakra Manggala')

@push('styles')
<style>
    .activity-card {
        position: relative;
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
    }

    .activity-card__top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
    }

    .activity-card__date {
        min-width: 88px;
        padding: 0.85rem 0.75rem;
        border: 1px solid rgba(26, 67, 49, 0.1);
        background: rgba(26, 67, 49, 0.05);
        text-align: center;
    }

    .activity-card__day {
        display: block;
        font-family: 'Montserrat', sans-serif;
        font-size: 1.8rem;
        line-height: 1;
        color: var(--primary-color);
    }

    .activity-card__month {
        display: block;
        margin-top: 0.35rem;
        font-size: 0.82rem;
        color: var(--muted-color);
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .activity-card__title {
        margin: 0;
        color: var(--primary-color);
        font-size: 1.32rem;
        line-height: 1.25;
    }

    .activity-card__meta {
        display: grid;
        gap: 0.75rem;
    }

    .activity-card__meta-item {
        display: flex;
        gap: 0.75rem;
        align-items: flex-start;
        color: var(--muted-color);
        line-height: 1.6;
    }

    .activity-card__meta-item i {
        color: var(--secondary-color);
        margin-top: 0.2rem;
    }

    .activity-card__footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding-top: 1rem;
        border-top: 1px solid var(--border-soft);
        margin-top: auto;
        flex-wrap: wrap;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.5rem 0.8rem;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .status-pill--done {
        background: rgba(18, 33, 25, 0.1);
        color: var(--primary-color);
    }

    .status-pill--upcoming {
        background: rgba(242, 182, 97, 0.18);
        color: #7d5313;
    }

    .empty-state {
        text-align: center;
        padding: clamp(2rem, 4vw, 3rem);
    }
</style>
@endpush

@section('content')
@php
    $heroImage = asset('image/fotobersejarah2.jpg');
@endphp

<section class="page-hero">
    <div class="page-hero__media" aria-hidden="true">
        <div class="page-hero__fallback" style="background-image: url('{{ $heroImage }}'); position: absolute; inset: -4%; background-size: cover; background-position: center; filter: saturate(0.8) contrast(1.1); transform: scale(1.05);"></div>
        <div class="page-hero__overlay"></div>
    </div>
    <div class="container">
        <div class="page-hero__inner" data-aos="fade-up">
            <span class="page-hero__eyebrow">
                <i class="bi bi-calendar-event"></i>
                Jejak Petualang
            </span>
            <h1 class="page-hero__title">Galeri<br><span>Aktivitas</span></h1>
            <p class="page-hero__lead">
                Rekam jejak kegiatan lapangan, pendidikan, dan aksi organisasi yang membentuk sejarah perjalanan Cakra Manggala.
            </p>
        </div>
    </div>
</section>

<section class="section-shell section-shell--soft">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-12 col-xl-8">
                <div class="section-intro text-xl-start mx-xl-0 mb-0" data-aos="fade-up">
                    <span class="section-kicker">
                        <i class="bi bi-search"></i>
                        Filter Kegiatan
                    </span>
                    <h2 class="section-heading">Cari agenda tertentu</h2>
                    <p class="section-lead">
                        Temukan informasi tempat, judul, atau tahun kegiatan yang pernah dilaksanakan.
                    </p>
                </div>
            </div>
            <div class="col-12 col-xl-4" data-aos="fade-up" data-aos-delay="100">
                <div class="surface-card p-4">
                    <form action="{{ route('activities') }}" method="GET" class="d-flex gap-2">
                        <input type="text" name="search" class="form-control" placeholder="Cari kegiatan..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-shell">
    <div class="container">
        <div class="section-intro" data-aos="fade-up">
            <span class="section-kicker">
                <i class="bi bi-grid-3x3-gap-fill"></i>
                Arsip Kegiatan
            </span>
            <h2 class="section-heading">Tersusun rapi, tetap mudah dibaca</h2>
            <p class="section-lead mx-auto">
                Setiap kegiatan ditampilkan dalam format yang lebih ringkas agar informasi inti tetap jelas di desktop maupun mobile.
            </p>
        </div>

        @if(isset($kegiatans) && $kegiatans->count() > 0)
            <div class="row g-4">
                @foreach($kegiatans as $kegiatan)
                    <div class="col-12 col-lg-6 col-xl-4" id="activity-{{ $kegiatan->id }}" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                        <article class="surface-card activity-card">
                            <div class="activity-card__top">
                                <div class="activity-card__date">
                                    <span class="activity-card__day">{{ $kegiatan->tanggal_pelaksanaan->format('d') }}</span>
                                    <span class="activity-card__month">{{ $kegiatan->tanggal_pelaksanaan->format('M Y') }}</span>
                                </div>
                                <span class="status-pill {{ $kegiatan->status == 'selesai' ? 'status-pill--done' : 'status-pill--upcoming' }}">
                                    <i class="bi bi-{{ $kegiatan->status == 'selesai' ? 'check-circle-fill' : 'clock-fill' }}"></i>
                                    {{ ucfirst(str_replace('_', ' ', $kegiatan->status)) }}
                                </span>
                            </div>

                            <div>
                                <h3 class="activity-card__title">{{ $kegiatan->judul_kegiatan }}</h3>
                            </div>

                            <div class="activity-card__meta">
                                <div class="activity-card__meta-item">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>{{ $kegiatan->tempat }}</span>
                                </div>
                                @if($kegiatan->materi)
                                    <div class="activity-card__meta-item">
                                        <i class="bi bi-book-fill"></i>
                                        <span>{{ $kegiatan->materi }}</span>
                                    </div>
                                @endif
                                @if($kegiatan->kapel_pj)
                                    <div class="activity-card__meta-item">
                                        <i class="bi bi-person-badge-fill"></i>
                                        <span>{{ $kegiatan->kapel_pj }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="activity-card__footer">
                                <div class="chip-list">
                                    <span class="chip"><i class="bi bi-tag-fill"></i>{{ ucfirst($kegiatan->sifat) }}</span>
                                    <span class="chip"><i class="bi bi-calendar3"></i>Tahun {{ $kegiatan->tahun }}</span>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        @else
            <div class="surface-card empty-state text-center p-5" data-aos="fade-up">
                <span class="icon-badge mb-4"><i class="bi bi-calendar-x"></i></span>
                <h2 class="section-heading mb-3">
                    {{ request('search') ? 'Tidak ada hasil yang cocok' : 'Belum ada kegiatan yang tersedia' }}
                </h2>
                <p class="section-lead mx-auto mb-4" style="max-width: 720px;">
                    {{ request('search') ? 'Coba gunakan kata kunci lain untuk mencari tempat atau nama kegiatan.' : 'Saat data kegiatan tersedia, halaman ini akan menampilkan arsip yang lebih rapi.' }}
                </p>
                @if(request('search'))
                    <a href="{{ route('activities') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-counterclockwise me-2"></i>Reset Pencarian
                    </a>
                @endif
            </div>
        @endif
    </div>
</section>
@endsection
