{{-- File: resources/views/artikel/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Artikel - UKM Cakra Manggala')

@push('styles')
<style>
    .article-search-card {
        padding: 1.25rem;
        border: 1px solid rgba(18, 33, 25, 0.08);
        background: rgba(255, 255, 255, 0.8);
        box-shadow: var(--shadow-soft);
    }

    .article-search-form {
        display: flex;
        gap: 0.75rem;
        align-items: stretch;
    }

    .article-search-input {
        width: 100%;
        min-height: 52px;
        border: 1px solid rgba(18, 33, 25, 0.12);
        background: rgba(255, 255, 255, 0.92);
        padding: 0.9rem 1rem;
        color: var(--text-color);
    }

    .article-search-input:focus {
        outline: none;
        border-color: rgba(37, 91, 68, 0.5);
        box-shadow: 0 0 0 4px rgba(37, 91, 68, 0.1);
    }

    .article-search-btn,
    .article-card__action,
    .article-empty__action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.55rem;
        min-height: 52px;
        padding: 0.9rem 1.1rem;
        border: 1px solid rgba(26, 67, 49, 0.14);
        background: rgba(26, 67, 49, 0.06);
        color: var(--primary-color);
        text-decoration: none;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        transition: transform 0.22s ease, background 0.22s ease;
    }

    .article-search-btn:hover,
    .article-card__action:hover,
    .article-empty__action:hover,
    .article-search-btn:focus-visible,
    .article-card__action:focus-visible,
    .article-empty__action:focus-visible {
        color: var(--primary-color);
        background: rgba(26, 67, 49, 0.12);
        transform: translateY(-2px);
    }

    .article-results-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
        padding: 1rem 1.2rem;
        border: 1px solid rgba(37, 91, 68, 0.12);
        background: rgba(37, 91, 68, 0.08);
        color: var(--primary-color);
    }

    .article-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        border: 1px solid rgba(18, 33, 25, 0.08);
        background: rgba(255, 255, 255, 0.82);
        box-shadow: var(--shadow-soft);
        overflow: hidden;
        transition: transform 0.24s ease, box-shadow 0.24s ease;
    }

    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
    }

    .article-card__media {
        position: relative;
        overflow: hidden;
        aspect-ratio: 16 / 10;
        background: #dde3dc;
    }

    .article-card__media img,
    .article-card__placeholder {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .article-card__placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(18, 33, 25, 0.32);
        font-size: 2.3rem;
    }

    .article-card__body {
        display: grid;
        gap: 0.9rem;
        padding: 1.25rem;
        flex: 1;
    }

    .article-card__meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.8rem;
        color: var(--muted-color);
        font-size: 0.86rem;
        line-height: 1.5;
    }

    .article-card__title {
        margin: 0;
        color: var(--primary-color);
        font-size: 1.2rem;
        line-height: 1.35;
    }

    .article-card__title a {
        text-decoration: none;
        color: inherit;
    }

    .article-card__excerpt {
        margin: 0;
        color: var(--muted-color);
        line-height: 1.8;
    }

    .article-empty {
        text-align: center;
        padding: clamp(2rem, 5vw, 3rem);
    }

    @media (max-width: 767px) {
        .article-search-form {
            flex-direction: column;
        }

        .article-search-btn,
        .article-card__action,
        .article-empty__action {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')
@php
    $heroImage = asset('image/fotobersejarah2.jpg');
@endphp

<section class="page-hero" style="--hero-image: url('{{ $heroImage }}');">
    <div class="container">
        <div class="page-hero__inner">
            <span class="page-hero__eyebrow" data-aos="fade-up">
                <i class="bi bi-journal-richtext"></i>
                Ruang Artikel
            </span>
            <h1 class="page-hero__title" data-aos="fade-up" data-aos-delay="100">Artikel, cerita, dan catatan perjalanan</h1>
            <p class="page-hero__lead" data-aos="fade-up" data-aos-delay="200">
                Kumpulan tulisan dari Cakra Manggala yang kini disusun lebih rapi agar mudah dijelajahi, dibaca, dan dicari dari desktop maupun mobile.
            </p>
        </div>
    </div>
</section>

<section class="section-shell">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-12 col-xl-8">
                <div class="section-intro text-xl-start mx-xl-0 mb-0" data-aos="fade-up">
                    <span class="section-kicker">
                        <i class="bi bi-compass-fill"></i>
                        Jelajahi Tulisan
                    </span>
                    <h2 class="section-heading">Cari konten yang paling relevan</h2>
                    <p class="section-lead">
                        Gunakan pencarian untuk menemukan judul, topik, atau ringkasan artikel yang sedang dibutuhkan.
                    </p>
                </div>
            </div>
            <div class="col-12 col-xl-4" data-aos="fade-up" data-aos-delay="100">
                <div class="article-search-card">
                    <form method="GET" action="{{ route('artikel.index') }}" class="article-search-form">
                        <input
                            type="text"
                            class="article-search-input"
                            name="search"
                            value="{{ $search }}"
                            placeholder="Cari artikel..."
                            aria-label="Cari artikel"
                        >
                        <button type="submit" class="article-search-btn">
                            <i class="bi bi-search"></i>
                            Cari
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-shell section-shell--soft pt-0">
    <div class="container">
        @if($search)
            <div class="article-results-bar mb-4" data-aos="fade-up">
                <div>
                    Hasil pencarian untuk <strong>"{{ $search }}"</strong> ditemukan sebanyak <strong>{{ $artikels->total() }}</strong> artikel.
                </div>
                <a href="{{ route('artikel.index') }}" class="article-card__action">
                    <i class="bi bi-arrow-counterclockwise"></i>
                    Reset
                </a>
            </div>
        @endif

        @if($artikels->count() > 0)
            <div class="row g-4">
                @foreach($artikels as $artikel)
                    <div class="col-12 col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                        <article class="article-card">
                            <div class="article-card__media">
                                @if($artikel->gambar_utama)
                                    <img src="{{ asset($artikel->gambar_utama) }}" alt="{{ $artikel->judul }}" loading="lazy">
                                @else
                                    <div class="article-card__placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="article-card__body">
                                <div class="article-card__meta">
                                    <span><i class="bi bi-calendar3 me-1"></i>{{ $artikel->created_at->format('d F Y') }}</span>
                                    <span><i class="bi bi-person me-1"></i>{{ $artikel->user->name }}</span>
                                    @if($artikel->views > 0)
                                        <span><i class="bi bi-eye me-1"></i>{{ number_format($artikel->views) }}</span>
                                    @endif
                                </div>

                                <h3 class="article-card__title">
                                    <a href="{{ route('artikel.show', $artikel->slug) }}">{{ $artikel->judul }}</a>
                                </h3>

                                <p class="article-card__excerpt">
                                    {{ $artikel->excerpt ?: Str::limit(strip_tags($artikel->konten), 140) }}
                                </p>

                                <div class="mt-auto">
                                    <a href="{{ route('artikel.show', $artikel->slug) }}" class="article-card__action">
                                        <span>Baca artikel</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $artikels->appends(request()->query())->links() }}
            </div>
        @else
            <div class="surface-card article-empty" data-aos="fade-up">
                <span class="icon-badge mb-4"><i class="bi bi-newspaper"></i></span>
                <h2 class="section-heading mb-3">
                    {{ $search ? 'Tidak ada hasil yang cocok' : 'Belum ada artikel yang dipublikasikan' }}
                </h2>
                <p class="section-lead mx-auto mb-4" style="max-width: 720px;">
                    {{ $search ? 'Coba ganti kata kunci pencarian atau kembali ke daftar seluruh artikel.' : 'Saat artikel tersedia, daftar ini akan menampilkan tulisan terbaru dari Cakra Manggala.' }}
                </p>
                @if($search)
                    <a href="{{ route('artikel.index') }}" class="article-empty__action">
                        <i class="bi bi-arrow-left"></i>
                        Kembali ke semua artikel
                    </a>
                @endif
            </div>
        @endif
    </div>
</section>
@endsection
