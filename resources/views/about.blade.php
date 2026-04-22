@extends('layouts.app')

@section('title', 'Tentang Kami - UKM Cakra Manggala')

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
                <i class="bi bi-info-circle"></i>
                Jati Diri
            </span>
            <h1 class="page-hero__title">Mengenal<br><span>Cakra Manggala</span></h1>
            <p class="page-hero__lead">
                Sebuah wadah pembinaan karakter mahasiswa melalui media alam bebas yang telah berdiri sebagai saksi sejarah petualangan di Politeknik Negeri Madiun.
            </p>
        </div>
    </div>
</section>

<section class="section-shell">
    <div class="container">
        <div class="row g-4 g-lg-5 align-items-stretch">
            <div class="col-12 col-lg-5" data-aos="fade-right">
                <div class="media-panel">
                    <img src="{{ asset('image/fotobersejarah1.jpg') }}" alt="Kegiatan tim Cakra Manggala">
                </div>
            </div>
            <div class="col-12 col-lg-7" data-aos="fade-left">
                <div class="surface-card">
                    <span class="section-kicker">
                        <i class="bi bi-compass"></i>
                        Sejarah Singkat
                    </span>
                    <h2 class="section-heading">Tumbuh dari kebutuhan akan wadah yang nyata</h2>
                    <p class="section-lead mb-3">
                        Kegiatan kepencintaalaman di Politeknik Negeri Madiun lahir dari semangat mahasiswa yang ingin belajar, bergerak, dan bertanggung jawab di alam bebas. Dari inisiatif itu, pada <strong>26 Juli 2013</strong> terbentuklah <strong>GEMAPALA</strong> sebagai ruang awal untuk menyalurkan minat yang sama.
                    </p>
                    <p class="section-lead mb-3">
                        Seiring berkembangnya identitas dan arah organisasi, pada <strong>19 Oktober 2014</strong> nama tersebut berubah menjadi <strong>Cakra Manggala</strong>. Perubahan ini tidak sekadar simbolik, tetapi menegaskan karakter organisasi yang lebih matang, disiplin, dan berorientasi pada pembentukan anggota.
                    </p>
                    <p class="section-lead mb-0">
                        Hari ini Cakra Manggala berjalan sebagai ruang pembelajaran teknis, fisik, mental, dan sosial. Fokusnya bukan hanya aktivitas lapangan, tetapi juga cara berpikir, cara bekerja sama, dan cara menjaga alam dengan sikap yang benar.
                    </p>

                    <div class="metric-strip">
                        <div class="metric-item">
                            <span class="metric-value">2013</span>
                            <span class="metric-label">Awal berdiri sebagai ruang bersama mahasiswa pecinta alam.</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-value">2014</span>
                            <span class="metric-label">Resmi memakai nama Cakra Manggala sebagai identitas organisasi.</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-value">1 Arah</span>
                            <span class="metric-label">Bertumbuh lewat petualangan, kedisiplinan, dan pelestarian alam.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-shell section-shell--soft">
    <div class="container">
        <div class="section-intro" data-aos="fade-up">
            <span class="section-kicker">
                <i class="bi bi-stars"></i>
                Arah Organisasi
            </span>
            <h2 class="section-heading">Visi yang jelas, misi yang operasional</h2>
            <p class="section-lead mx-auto">
                Organisasi yang sehat membutuhkan arah yang bisa dipahami anggota dan diterjemahkan ke kegiatan nyata.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-12 col-lg-6" data-aos="fade-up">
                <article class="surface-card">
                    <span class="icon-badge mb-4"><i class="bi bi-eye-fill"></i></span>
                    <h3 class="h2 mb-3" style="color: var(--primary-color);">Visi</h3>
                    <p class="section-lead mb-0">
                        Mahasiswa Pecinta Alam Cakra Manggala Politeknik Negeri Madiun sebagai organisasi yang mengembangkan intelektualitas, jasmani, dan rohani serta menumbuhkan kesadaran terhadap alam, sehingga menjadi panutan bagi Pemuda Indonesia pada umumnya dan Politeknik Negeri Madiun khususnya.
                    </p>
                </article>
            </div>

            <div class="col-12 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <article class="surface-card">
                    <span class="icon-badge mb-4"><i class="bi bi-bullseye"></i></span>
                    <h3 class="h2 mb-3" style="color: var(--primary-color);">Misi</h3>
                    <div class="d-grid gap-3">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-check-circle-fill mt-1" style="color: var(--secondary-color);"></i>
                            <span class="section-lead">Menjalankan organisasi dengan prinsip tata kelola yang baik dan mengikat.</span>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-check-circle-fill mt-1" style="color: var(--secondary-color);"></i>
                            <span class="section-lead">Meningkatkan kemampuan teknis, fisik, dan kesadaran terhadap lingkungan hidup.</span>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-check-circle-fill mt-1" style="color: var(--secondary-color);"></i>
                            <span class="section-lead">Membangun hubungan yang baik dan saling menguntungkan dengan pihak internal maupun eksternal.</span>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-check-circle-fill mt-1" style="color: var(--secondary-color);"></i>
                            <span class="section-lead">Mengembangkan kegiatan yang mendukung kemajuan ilmu pengetahuan.</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="section-shell">
    <div class="container">
        <div class="section-intro" data-aos="fade-up">
            <span class="section-kicker">
                <i class="bi bi-diagram-3-fill"></i>
                Bidang Minat
            </span>
            <h2 class="section-heading">Dua divisi, dua karakter latihan</h2>
            <p class="section-lead mx-auto">
                Setiap divisi dirancang untuk membangun kemampuan teknis yang berbeda, tetapi tetap berpijak pada keselamatan, disiplin, dan solidaritas.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-12 col-lg-6" data-aos="fade-up">
                <article class="surface-card">
                    <span class="icon-badge mb-4"><i class="bi bi-tree-fill"></i></span>
                    <h3 class="h2 mb-3" style="color: var(--primary-color);">Gunung Hutan</h3>
                    <p class="section-lead mb-4">
                        Fokus pada pendakian, navigasi darat, survival, dan pemahaman ekosistem alam bebas. Divisi ini menuntut kesiapan fisik dan pengambilan keputusan yang tenang di lapangan.
                    </p>
                    <div class="chip-list">
                        <span class="chip"><i class="bi bi-mountain"></i>Pendakian</span>
                        <span class="chip"><i class="bi bi-compass"></i>Navigasi</span>
                        <span class="chip"><i class="bi bi-flower1"></i>Konservasi</span>
                    </div>
                </article>
            </div>

            <div class="col-12 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <article class="surface-card">
                    <span class="icon-badge mb-4"><i class="bi bi-triangle-fill"></i></span>
                    <h3 class="h2 mb-3" style="color: var(--primary-color);">Rock Climbing</h3>
                    <p class="section-lead mb-4">
                        Berfokus pada teknik panjat tebing, penggunaan alat, manajemen risiko, dan kesiapan anggota dalam aktivitas vertikal yang membutuhkan presisi serta kepatuhan prosedur keselamatan.
                    </p>
                    <div class="chip-list">
                        <span class="chip"><i class="bi bi-shield-check"></i>Keselamatan</span>
                        <span class="chip"><i class="bi bi-gear"></i>Peralatan</span>
                        <span class="chip"><i class="bi bi-trophy"></i>Kompetisi</span>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="section-shell section-shell--soft">
    <div class="container">
        <div class="section-intro" data-aos="fade-up">
            <span class="section-kicker">
                <i class="bi bi-heart-fill"></i>
                Nilai Organisasi
            </span>
            <h2 class="section-heading">Yang dibentuk bukan hanya kemampuan teknis</h2>
            <p class="section-lead mx-auto">
                Nilai-nilai ini menjadi standar perilaku yang menjaga organisasi tetap sehat dan relevan.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-12 col-sm-6 col-xl-3" data-aos="fade-up">
                <article class="surface-card surface-card--compact">
                    <span class="icon-badge mb-3"><i class="bi bi-shield-check"></i></span>
                    <h3 class="h4 mb-2" style="color: var(--primary-color);">Integritas</h3>
                    <p class="section-lead mb-0">Jujur, konsisten, dan bertanggung jawab dalam tindakan maupun keputusan.</p>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">
                <article class="surface-card surface-card--compact">
                    <span class="icon-badge mb-3"><i class="bi bi-trophy"></i></span>
                    <h3 class="h4 mb-2" style="color: var(--primary-color);">Prestasi</h3>
                    <p class="section-lead mb-0">Mendorong anggota memberi performa terbaik dalam latihan dan kegiatan.</p>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-xl-3" data-aos="fade-up" data-aos-delay="200">
                <article class="surface-card surface-card--compact">
                    <span class="icon-badge mb-3"><i class="bi bi-book"></i></span>
                    <h3 class="h4 mb-2" style="color: var(--primary-color);">Pembelajaran</h3>
                    <p class="section-lead mb-0">Belajar terus, berbagi pengalaman, dan memperkuat budaya evaluasi.</p>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-xl-3" data-aos="fade-up" data-aos-delay="300">
                <article class="surface-card surface-card--compact">
                    <span class="icon-badge mb-3"><i class="bi bi-lightning-charge"></i></span>
                    <h3 class="h4 mb-2" style="color: var(--primary-color);">Ketangguhan</h3>
                    <p class="section-lead mb-0">Siap menghadapi tantangan lapangan dengan sikap tabah, tangguh, dan terampil.</p>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="section-shell">
    <div class="container">
        <div class="surface-card text-center" data-aos="fade-up">
            <span class="icon-badge mb-4"><i class="bi bi-quote"></i></span>
            <h2 class="section-heading mb-3">Semangat yang terus dijaga</h2>
            <p class="section-lead mx-auto mb-0" style="max-width: 860px;">
                "Mahasiswa Pecinta Alam tidak akan memelonco Anda, melainkan akan membimbing Anda. Alam lah yang akan mendidik Anda setiap saat, dalam setiap kondisi, setiap medan, dan setiap situasi. Bila semua itu mampu Anda hadapi, menjelmalah Anda menjadi seorang putra putri alam yang <strong>TABAH, TANGGUH, TERAMPIL</strong>."
            </p>
        </div>
    </div>
</section>
@endsection
