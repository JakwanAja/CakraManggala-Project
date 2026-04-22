{{-- File: resources/views/artikel/show.blade.php --}}
@extends('layouts.app')

@section('title', $artikel->judul)
@section('meta_description', $artikel->excerpt ?: Str::limit(strip_tags($artikel->konten), 160))

@push('styles')
<style>
    .article-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.4fr) minmax(300px, 0.7fr);
        gap: 1.5rem;
        align-items: start;
    }

    .article-main,
    .article-sidebar-card,
    .article-share-bar {
        border: 1px solid rgba(18, 33, 25, 0.08);
        background: rgba(255, 255, 255, 0.84);
        box-shadow: var(--shadow-soft);
    }

    .article-main {
        overflow: hidden;
    }

    .article-main__body {
        padding: clamp(1.25rem, 3vw, 2rem);
    }

    .article-breadcrumb {
        display: flex;
        flex-wrap: wrap;
        gap: 0.55rem;
        margin-bottom: 1.25rem;
        color: var(--muted-color);
        font-size: 0.88rem;
    }

    .article-breadcrumb a {
        color: var(--secondary-color);
        text-decoration: none;
    }

    .article-breadcrumb span[aria-hidden="true"] {
        color: rgba(18, 33, 25, 0.28);
    }

    .article-head__title {
        margin-bottom: 1rem;
        color: var(--primary-color);
        font-size: clamp(2rem, 5vw, 3.4rem);
        line-height: 1.04;
        text-transform: none;
    }

    .article-head__meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.85rem 1.25rem;
        color: var(--muted-color);
        font-size: 0.92rem;
        line-height: 1.6;
    }

    .article-author {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
    }

    .article-author__badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
        color: #fff;
        font-weight: 700;
    }

    .article-summary {
        margin-top: 1.5rem;
        padding: 1rem 1.1rem;
        border: 1px solid rgba(37, 91, 68, 0.12);
        background: rgba(37, 91, 68, 0.08);
        color: var(--primary-color);
        line-height: 1.8;
    }

    .article-figure {
        margin: 1.8rem 0 0;
        overflow: hidden;
        background: #d8dfd8;
    }

    .article-figure img {
        width: 100%;
        max-height: 540px;
        object-fit: cover;
        display: block;
    }

    .article-figure figcaption {
        padding: 0.8rem 1rem;
        color: var(--muted-color);
        font-size: 0.86rem;
        background: rgba(255, 255, 255, 0.84);
    }

    .article-content {
        margin-top: 1.8rem;
        color: #334139;
        font-size: 1.05rem;
        line-height: 1.95;
    }

    .article-content p {
        margin-bottom: 1.4rem;
    }

    .article-content img {
        max-width: 100%;
        height: auto;
    }

    .article-content blockquote {
        margin: 1.8rem 0;
        padding: 1rem 1.2rem;
        border-left: 4px solid var(--accent-color);
        background: rgba(242, 182, 97, 0.12);
        color: var(--primary-color);
    }

    .article-share-bar {
        margin-top: 2rem;
        padding: 1.2rem;
    }

    .article-share-bar h2,
    .article-sidebar-card h2 {
        margin-bottom: 0.9rem;
        color: var(--primary-color);
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .article-share-actions {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .article-share-action,
    .article-sidebar-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.55rem;
        min-height: 48px;
        padding: 0.8rem 1rem;
        border: 1px solid rgba(18, 33, 25, 0.1);
        background: rgba(255, 255, 255, 0.86);
        color: var(--primary-color);
        text-decoration: none;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        transition: transform 0.22s ease, background 0.22s ease;
    }

    .article-share-action:hover,
    .article-share-action:focus-visible,
    .article-sidebar-action:hover,
    .article-sidebar-action:focus-visible {
        color: var(--primary-color);
        background: rgba(26, 67, 49, 0.08);
        transform: translateY(-2px);
    }

    .article-sidebar {
        display: grid;
        gap: 1.5rem;
        position: sticky;
        top: 6.8rem;
    }

    .article-sidebar-card {
        padding: 1.2rem;
    }

    .article-related-list {
        display: grid;
        gap: 1rem;
    }

    .article-related-item {
        display: grid;
        grid-template-columns: 88px 1fr;
        gap: 0.85rem;
        align-items: start;
        text-decoration: none;
        color: inherit;
    }

    .article-related-item:hover .article-related-item__title,
    .article-related-item:focus-visible .article-related-item__title {
        color: var(--secondary-color);
    }

    .article-related-item__media {
        aspect-ratio: 4 / 3;
        background: #dfe4df;
        overflow: hidden;
    }

    .article-related-item__media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .article-related-item__placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: rgba(18, 33, 25, 0.3);
    }

    .article-related-item__title {
        margin: 0 0 0.35rem;
        color: var(--primary-color);
        font-size: 0.98rem;
        line-height: 1.45;
        transition: color 0.22s ease;
    }

    .article-related-item__meta {
        color: var(--muted-color);
        font-size: 0.82rem;
        line-height: 1.6;
    }

    @media (max-width: 991px) {
        .article-layout {
            grid-template-columns: 1fr;
        }

        .article-sidebar {
            position: static;
        }
    }

    @media (max-width: 575px) {
        .article-share-action,
        .article-sidebar-action {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')
<section class="section-shell">
    <div class="container">
        <div class="article-layout">
            <article class="article-main" data-aos="fade-up">
                <div class="article-main__body">
                    <nav class="article-breadcrumb" aria-label="Breadcrumb">
                        <a href="{{ route('home') }}">Beranda</a>
                        <span aria-hidden="true">/</span>
                        <a href="{{ route('artikel.index') }}">Artikel</a>
                        <span aria-hidden="true">/</span>
                        <span>{{ Str::limit($artikel->judul, 48) }}</span>
                    </nav>

                    <header class="article-head">
                        <span class="section-kicker mb-3">
                            <i class="bi bi-journal-richtext"></i>
                            Artikel
                        </span>
                        <h1 class="article-head__title">{{ $artikel->judul }}</h1>
                        <div class="article-head__meta">
                            <span class="article-author">
                                <span class="article-author__badge">{{ strtoupper(substr($artikel->user->name, 0, 1)) }}</span>
                                <span>{{ $artikel->user->name }}</span>
                            </span>
                            <span><i class="bi bi-calendar3 me-1"></i>{{ $artikel->created_at->format('d F Y') }}</span>
                            <span><i class="bi bi-eye me-1"></i>{{ number_format($artikel->views) }} views</span>
                            <span><i class="bi bi-clock me-1"></i>{{ ceil(str_word_count(strip_tags($artikel->konten)) / 200) }} menit baca</span>
                        </div>

                        @if($artikel->excerpt)
                            <div class="article-summary">
                                <strong>Ringkasan:</strong> {{ $artikel->excerpt }}
                            </div>
                        @endif
                    </header>

                    @if($artikel->gambar_utama)
                        <figure class="article-figure">
                            <img src="{{ asset($artikel->gambar_utama) }}" alt="{{ $artikel->judul }}">
                            <figcaption>{{ $artikel->judul }}</figcaption>
                        </figure>
                    @endif

                    <div class="article-content">
                        {!! nl2br(e($artikel->konten)) !!}
                    </div>

                    <div class="article-share-bar">
                        <h2>Bagikan artikel</h2>
                        <div class="article-share-actions">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="article-share-action">
                                <i class="bi bi-facebook"></i>
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($artikel->judul) }}" target="_blank" class="article-share-action">
                                <i class="bi bi-twitter-x"></i>
                                X / Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($artikel->judul . ' - ' . request()->fullUrl()) }}" target="_blank" class="article-share-action">
                                <i class="bi bi-whatsapp"></i>
                                WhatsApp
                            </a>
                            <button type="button" class="article-share-action" onclick="copyToClipboard('{{ request()->fullUrl() }}')">
                                <i class="bi bi-link-45deg"></i>
                                Salin link
                            </button>
                        </div>
                    </div>
                </div>
            </article>

            <aside class="article-sidebar">
                @if($relatedArtikels->count() > 0)
                    <div class="article-sidebar-card" data-aos="fade-up" data-aos-delay="100">
                        <h2>Artikel terkait</h2>
                        <div class="article-related-list">
                            @foreach($relatedArtikels as $related)
                                <a href="{{ route('artikel.show', $related->slug) }}" class="article-related-item">
                                    <div class="article-related-item__media">
                                        @if($related->gambar_utama)
                                            <img src="{{ asset($related->gambar_utama) }}" alt="{{ $related->judul }}">
                                        @else
                                            <div class="article-related-item__placeholder">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h3 class="article-related-item__title">{{ Str::limit($related->judul, 62) }}</h3>
                                        <div class="article-related-item__meta">
                                            <i class="bi bi-calendar3 me-1"></i>{{ $related->created_at->format('d M Y') }}
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="article-sidebar-card" data-aos="fade-up" data-aos-delay="150">
                    <h2>Jelajahi artikel lain</h2>
                    <p class="section-lead mb-4">
                        Kembali ke daftar artikel untuk menemukan tulisan lain dari Cakra Manggala.
                    </p>
                    <a href="{{ route('artikel.index') }}" class="article-sidebar-action">
                        <i class="bi bi-arrow-left"></i>
                        Semua artikel
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        const toast = document.createElement('div');
        toast.className = 'toast align-items-center text-white bg-success border-0 position-fixed';
        toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999;';
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle me-2"></i>Link berhasil disalin
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;
        document.body.appendChild(toast);

        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();

        toast.addEventListener('hidden.bs.toast', () => {
            document.body.removeChild(toast);
        });
    });
}
</script>
@endpush
