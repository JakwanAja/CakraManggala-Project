{{-- File: resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Beranda - UKM Cakra Manggala')
@section('body_class', 'page-home')

@push('styles')
    <style>
        .home-hero {
            min-height: 100svh !important;
            padding-top: 12rem !important;
            padding-bottom: clamp(4rem, 7vw, 7.5rem) !important;
            display: flex !important;
            align-items: flex-end !important;
        }

        .home-hero .page-hero__title {
            font-size: clamp(3rem, 9.5vw, 5.4rem);
            line-height: 0.92;
            margin-bottom: 1.5rem;
        }

        .home-hero .page-hero__lead {
            font-size: clamp(1rem, 2.2vw, 1.25rem);
            line-height: 1.6;
            max-width: 720px;
        }

        .home-hero.is-video-ready .home-hero__video {
            opacity: 1 !important;
        }

        .home-hero__scroll {
            position: absolute;
            left: 50%;
            bottom: 2rem;
            z-index: 5;
            width: 2rem;
            height: 3.2rem;
            transform: translateX(-50%);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 0;
            display: flex;
            justify-content: center;
            padding-top: 0.6rem;
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(10px);
        }

        .home-hero__scroll span {
            display: block;
            width: 0.3rem;
            height: 0.65rem;
            background: #fff;
            animation: heroScroll 1.8s ease-in-out infinite;
        }

        @keyframes heroScroll {
            0%, 100% { transform: translateY(0); opacity: 1; }
            50% { transform: translateY(0.75rem); opacity: 0.3; }
        }

        .news-card {
            border-radius: 0;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .cta-section {
            padding: 3.5rem 0;
            background: linear-gradient(135deg, #1b4f3a 0%, #143626 100%);
        }

        .cta-title {
            margin-bottom: 1rem;
            font-size: clamp(1.8rem, 4vw, 2.4rem);
            color: #fff;
        }

        .cta-subtitle {
            max-width: 720px;
            margin: 0 auto 2rem;
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.78);
        }
    </style>
@endpush

@section('content')
    <section class="page-hero home-hero" id="homeHero" data-hero-video>
        <div class="page-hero__media" aria-hidden="true">
            <div class="page-hero__fallback" style="background-image: url('{{ asset('image/fotobersejarah2.jpg') }}'); position: absolute; inset: -4%; background-size: cover; background-position: center; filter: saturate(0.9) contrast(1.1); transform: scale(1.05);"></div>
            <video class="home-hero__video" autoplay muted loop playsinline preload="metadata" poster="{{ asset('image/fotobersejarah2.jpg') }}" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center bottom; opacity: 0; transition: opacity 1s ease-in-out;">
                <source src="{{ asset('videos/cinematic.mp4') }}" type="video/mp4">
            </video>
            <div class="page-hero__overlay"></div>
        </div>

        <div class="container">
            <div class="page-hero__inner text-center mx-auto">
                {{-- <span class="page-hero__eyebrow" data-aos="fade-up">
                    <i class="bi bi-tree-fill"></i>
                    <span>UKM Pecinta Alam | Politeknik Negeri Madiun</span>
                </span> --}}
                <h1 class="page-hero__title" data-aos="fade-up" data-aos-delay="100">
                    Mendaki Tinggi,<br>
                    <span>Menjaga Bumi</span>
                </h1>
                <p class="page-hero__lead mx-auto" data-aos="fade-up" data-aos-delay="200">
                    Tempat bertumbuh lewat kegiatan, pendidikan alam bebas, dan aksi konservasi untuk mereka yang ingin menantang diri tanpa kehilangan rasa hormat pada alam.
                </p>
                <div class="mt-4 mt-lg-5" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{ route('join') }}" class="btn-premium">
                        <i class="bi bi-compass me-2"></i>
                        <span>Gabung Petualangan</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="home-hero__scroll" aria-hidden="true">
            <span></span>
        </div>
    </section>

    <section class="news-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">
                <i class="bi bi-newspaper me-2"></i>
                Berita, Artikel & Catatan Perjalanan
            </h2>

            @if($artikels->count() > 0)
                <div class="row g-3 g-md-4">
                    @foreach($artikels as $artikel)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card news-card h-100" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                @if($artikel->gambar_utama)
                                    <img src="{{ asset($artikel->gambar_utama) }}" class="card-img-top" alt="{{ $artikel->judul }}" loading="lazy" style="height: 200px; object-fit: cover;">
                                @else
                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
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

                                    <a href="{{ route('artikel.show', $artikel->slug) }}" class="btn btn-outline-primary btn-sm mt-auto">
                                        <span class="d-none d-sm-inline">Baca Selengkapnya</span>
                                        <span class="d-sm-none">Baca</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($artikels->count() >= 6)
                    <div class="text-center mt-4" data-aos="fade-up">
                        <a href="{{ route('artikel.index') }}" class="btn btn-primary">
                            <i class="bi bi-arrow-right"></i> Lihat Semua Artikel
                        </a>
                    </div>
                @endif
            @else
                <div class="text-center py-5" data-aos="fade-up">
                    <i class="bi bi-newspaper display-1 text-muted"></i>
                    <h5 class="mt-3 text-muted">Belum Ada Artikel</h5>
                    <p class="text-muted">Artikel dan berita terbaru akan segera hadir.</p>
                </div>
            @endif
        </div>
    </section>

    <section class="cta-section">
        <div class="container text-center">
            <div data-aos="fade-up">
                <h2 class="cta-title">Siap Memulai Petualangan Baru?</h2>
                <p class="cta-subtitle">Bergabunglah dengan keluarga besar Cakra Manggala dan temukan pengalaman alam bebas yang membentuk keberanian, solidaritas, dan kepedulian lingkungan.</p>
                <a href="{{ route('join') }}" class="cta-button">
                    <i class="bi bi-arrow-right-circle"></i>
                    <span>Mulai Perjalananmu</span>
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        (() => {
            const hero = document.querySelector('[data-hero-video]');
            const video = hero?.querySelector('video');

            if (!hero || !video) {
                return;
            }

            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            const saveDataEnabled = Boolean(navigator.connection && navigator.connection.saveData);

            if (prefersReducedMotion || saveDataEnabled) {
                hero.classList.add('is-video-fallback');
                video.pause();
                return;
            }

            const revealVideo = () => {
                hero.classList.add('is-video-ready');
            };

            video.addEventListener('playing', revealVideo, { once: true });

            const playAttempt = video.play();

            if (playAttempt && typeof playAttempt.then === 'function') {
                playAttempt.then(revealVideo).catch(() => {
                    hero.classList.add('is-video-fallback');
                });
            } else if (!video.paused) {
                revealVideo();
            }
        })();
    </script>
@endpush
