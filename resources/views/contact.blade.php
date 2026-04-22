@extends('layouts.app')

@section('title', 'Kontak dan Sosial Media - UKM Cakra Manggala')

@push('styles')
<style>
    .contact-logo-strip {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1.5rem;
        flex-wrap: wrap;
        padding: 1.5rem;
        border: 1px solid var(--border-soft);
        background: rgba(255, 255, 255, 0.72);
        box-shadow: var(--shadow-soft);
    }

    .contact-logo-item {
        text-align: center;
    }

    .contact-logo-item img {
        width: clamp(72px, 10vw, 92px);
        height: clamp(72px, 10vw, 92px);
        object-fit: contain;
        margin-bottom: 0.8rem;
    }

    .contact-logo-divider {
        width: 1px;
        align-self: stretch;
        background: rgba(26, 67, 49, 0.12);
    }

    .contact-detail {
        display: grid;
        gap: 0.95rem;
    }

    .contact-detail__item {
        display: flex;
        gap: 0.85rem;
        align-items: flex-start;
        color: var(--muted-color);
        line-height: 1.7;
    }

    .contact-detail__item i {
        color: var(--secondary-color);
        margin-top: 0.2rem;
    }

    .contact-link {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        word-break: break-word;
    }

    .contact-link:hover,
    .contact-link:focus-visible {
        text-decoration: underline;
    }

    .social-card {
        text-align: center;
    }

    .social-card__handle {
        margin-top: 0.75rem;
        margin-bottom: 1.25rem;
        color: var(--muted-color);
    }

    .social-card__cta {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.55rem;
        width: 100%;
        min-height: 48px;
        padding: 0.85rem 1rem;
        color: #fff;
        text-decoration: none;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        transition: transform 0.22s ease, filter 0.22s ease;
    }

    .social-card__cta:hover,
    .social-card__cta:focus-visible {
        color: #fff;
        transform: translateY(-2px);
        filter: brightness(1.03);
    }

    .social-card__cta--instagram {
        background: linear-gradient(135deg, #f09433 0%, #dc2743 55%, #bc1888 100%);
    }

    .social-card__cta--youtube {
        background: linear-gradient(135deg, #e52d27 0%, #b31217 100%);
    }

    .social-card__cta--tiktok {
        background: linear-gradient(135deg, #ff0050 0%, #00f2ea 100%);
        color: #09110d;
    }

    .social-card__cta--tiktok:hover,
    .social-card__cta--tiktok:focus-visible {
        color: #09110d;
    }

    .map-frame {
        overflow: hidden;
        border: 1px solid var(--border-soft);
        box-shadow: var(--shadow-soft);
    }

    .map-frame iframe {
        display: block;
        width: 100%;
        min-height: 420px;
        border: 0;
    }

    @media (max-width: 767px) {
        .contact-logo-divider {
            display: none;
        }

        .map-frame iframe {
            min-height: 280px;
        }
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
                <i class="bi bi-chat-dots"></i>
                Komunikasi
            </span>
            <h1 class="page-hero__title">Hubungi<br><span>Kami</span></h1>
            <p class="page-hero__lead">
                Ingin bertanya, berkolaborasi, atau sekadar menyapa? Sampaikan pesan Anda melalui kanal resmi Cakra Manggala.
            </p>
        </div>
    </div>
</section>

<section class="section-shell">
    <div class="container">
        <div class="contact-logo-strip" data-aos="fade-up">
            <div class="contact-logo-item">
                <img src="{{ asset('image/logo-pnm.png') }}" alt="Logo Politeknik Negeri Madiun">
                <h2 class="h6 mb-0" style="color: var(--primary-color);">Politeknik Negeri Madiun</h2>
            </div>
            <div class="contact-logo-divider" aria-hidden="true"></div>
            <div class="contact-logo-item">
                <img src="{{ asset('image/logo.png') }}" alt="Logo Cakra Manggala">
                <h2 class="h6 mb-0" style="color: var(--primary-color);">UKM Pecinta Alam Cakra Manggala</h2>
            </div>
        </div>
    </div>
</section>

<section class="section-shell section-shell--soft">
    <div class="container">
        <div class="section-intro" data-aos="fade-up">
            <span class="section-kicker">
                <i class="bi bi-telephone-fill"></i>
                Hubungi Kami
            </span>
            <h2 class="section-heading">Informasi yang penting langsung terlihat</h2>
            <p class="section-lead mx-auto">
                Alamat, email, dan situs resmi ditampilkan dengan pola yang lebih rapi agar mudah ditemukan dari perangkat apa pun.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-12 col-lg-6" data-aos="fade-up">
                <article class="surface-card">
                    <span class="icon-badge mb-4"><i class="bi bi-geo-alt-fill"></i></span>
                    <h3 class="h2 mb-3" style="color: var(--primary-color);">Alamat Sekretariat</h3>
                    <div class="contact-detail">
                        <div class="contact-detail__item">
                            <i class="bi bi-buildings-fill"></i>
                            <span>Sekretariat UKM Pecinta Alam Cakra Manggala, Lantai 1 Gedung Perkuliahan Kampus 1</span>
                        </div>
                        <div class="contact-detail__item">
                            <i class="bi bi-bank"></i>
                            <span>Politeknik Negeri Madiun</span>
                        </div>
                        <div class="contact-detail__item">
                            <i class="bi bi-pin-map-fill"></i>
                            <span>Jl. Serayu No.84, Pandean, Taman, Kota Madiun, Jawa Timur 63133</span>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-12 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <article class="surface-card">
                    <span class="icon-badge mb-4"><i class="bi bi-globe2"></i></span>
                    <h3 class="h2 mb-3" style="color: var(--primary-color);">Email dan Website</h3>
                    <div class="contact-detail">
                        <div class="contact-detail__item">
                            <i class="bi bi-envelope-fill"></i>
                            <div>
                                <div class="fw-semibold" style="color: var(--primary-color);">Email Resmi</div>
                                <a href="mailto:sekretariat.cakramanggala@pnm.ac.id" class="contact-link">sekretariat.cakramanggala@pnm.ac.id</a>
                            </div>
                        </div>
                        <div class="contact-detail__item">
                            <i class="bi bi-browser-chrome"></i>
                            <div>
                                <div class="fw-semibold" style="color: var(--primary-color);">Website</div>
                                <a href="https://cakramanggala.pnm.ac.id" target="_blank" class="contact-link">cakramanggala.pnm.ac.id</a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="section-shell">
    <div class="container">
        @if(session('success_contact'))
            <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-3 fs-4"></i>
                    <div>{{ session('success_contact') }}</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4 justify-content-center">
            <div class="col-12 col-xl-11">
                <div class="surface-card p-4 p-lg-5">
                    <div class="row g-5">
                        <div class="col-12 col-lg-5">
                            <span class="section-kicker">
                                <i class="bi bi-pencil-square"></i>
                                Form Kontak
                            </span>
                            <h2 class="section-heading text-start mx-0">Kirim Pesan</h2>
                            <p class="section-lead text-start mx-0 mb-4">
                                Ada pertanyaan mendesak atau butuh informasi lebih lanjut? Isi form di samping dan tim kami akan segera merespons.
                            </p>
                            
                            <div class="contact-detail mt-5">
                                <div class="contact-detail__item border-0 p-0 mb-4">
                                    <i class="bi bi-clock-history"></i>
                                    <div>
                                        <div class="fw-semibold" style="color: var(--primary-color);">Waktu Operasional</div>
                                        <div class="small text-muted">Senin - Jumat: 08:00 - 16:00 WIB</div>
                                    </div>
                                </div>
                                <div class="contact-detail__item border-0 p-0">
                                    <i class="bi bi-shield-check"></i>
                                    <div>
                                        <div class="fw-semibold" style="color: var(--primary-color);">Privasi Terjamin</div>
                                        <div class="small text-muted">Data Anda hanya digunakan untuk keperluan komunikasi organisasi.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7">
                            <form action="{{ route('contact.send') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label small fw-bold text-uppercase">Nama Lengkap</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama Anda" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label small fw-bold text-uppercase">Alamat Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="nama@email.com" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="subject" class="form-label small fw-bold text-uppercase">Subjek</label>
                                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Apa yang ingin dibahas?" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="message" class="form-label small fw-bold text-uppercase">Pesan Anda</label>
                                        <textarea name="message" id="message" rows="5" class="form-control" placeholder="Tuliskan pesan lengkap Anda di sini..." required></textarea>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn-premium w-100 border-0">
                                            <i class="bi bi-send-fill me-2"></i>
                                            Kirim Pesan Sekarang
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-shell">
    <div class="container">
        <div class="section-intro" data-aos="fade-up">
            <span class="section-kicker">
                <i class="bi bi-share-fill"></i>
                Sosial Media
            </span>
            <h2 class="section-heading">Satu bahasa visual untuk semua kanal</h2>
            <p class="section-lead mx-auto">
                Tombol aksi diperjelas dan kartu sosial disusun ulang supaya tetap enak dibaca di layar kecil.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-12 col-md-6 col-xl-4" data-aos="fade-up">
                <article class="surface-card social-card">
                    <span class="icon-badge mb-4" style="background: linear-gradient(135deg, #f09433 0%, #bc1888 100%);"><i class="bi bi-instagram"></i></span>
                    <h3 class="h3 mb-2" style="color: var(--primary-color);">Instagram</h3>
                    <p class="social-card__handle">@cakramanggala.pnm</p>
                    <a href="https://instagram.com/cakramanggala.pnm" target="_blank" class="social-card__cta social-card__cta--instagram">
                        <i class="bi bi-instagram"></i>
                        Follow
                    </a>
                </article>
            </div>
            <div class="col-12 col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="100">
                <article class="surface-card social-card">
                    <span class="icon-badge mb-4" style="background: linear-gradient(135deg, #e52d27 0%, #b31217 100%);"><i class="bi bi-youtube"></i></span>
                    <h3 class="h3 mb-2" style="color: var(--primary-color);">YouTube</h3>
                    <p class="social-card__handle">Cakra Manggala Official</p>
                    <a href="https://youtube.com/" target="_blank" class="social-card__cta social-card__cta--youtube">
                        <i class="bi bi-youtube"></i>
                        Subscribe
                    </a>
                </article>
            </div>
            <div class="col-12 col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="200">
                <article class="surface-card social-card">
                    <span class="icon-badge mb-4" style="background: linear-gradient(135deg, #ff0050 0%, #00f2ea 100%); color: #09110d;"><i class="bi bi-music-note"></i></span>
                    <h3 class="h3 mb-2" style="color: var(--primary-color);">TikTok</h3>
                    <p class="social-card__handle">@cakramanggala.pnm</p>
                    <a href="https://tiktok.com/" target="_blank" class="social-card__cta social-card__cta--tiktok">
                        <i class="bi bi-music-note"></i>
                        Follow
                    </a>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="section-shell section-shell--soft">
    <div class="container">
        <div class="section-intro" data-aos="fade-up">
            <span class="section-kicker">
                <i class="bi bi-geo-alt-fill"></i>
                Lokasi
            </span>
            <h2 class="section-heading">Akses lokasi lebih nyaman</h2>
            <p class="section-lead mx-auto">
                Bingkai peta dibuat lebih proporsional agar tetap nyaman digunakan di desktop maupun mobile.
            </p>
        </div>

        <div class="map-frame" data-aos="fade-up" data-aos-delay="100">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.7234567890123!2d111.52123456789012!3d-7.612345678901234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be35b3456789%3A0x1234567890abcdef!2sPoliteknik%20Negeri%20Madiun!5e0!3m2!1sid!2sid!4v1234567890123!5m2!1sid!2sid"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
@endsection
