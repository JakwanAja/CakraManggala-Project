{{-- File: resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UKM Mapala Cakra Manggala')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #2e7d32;
            --secondary-color: #4caf50;
            --accent-color: #ff6b35;
            --dark-color: #1b5e20;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* Sticky Navbar */
        .navbar {
            background: rgba(46, 125, 50, 0.95) !important;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .navbar.scrolled {
            background: rgba(46, 125, 50, 0.98) !important;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
        }
        
        .navbar-nav .nav-link {
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover {
            color: #ffeb3b !important;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-section {
        position: relative;
        height: 80vh;
        display: flex;
        align-items: center;
        color: white;
        overflow: hidden;
        z-index: 1;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            animation: bgSlider 18s infinite;
            z-index: -2;
            opacity: 0.5;
        }
        .hero-section::after {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6); /* lapisan hitam transparan */
            z-index: -1;
        }

        @keyframes bgSlider {
            0%   { background-image: url('/image/fotobersejarah1.jpg'); }
            33%  { background-image: url('/image/fotobersejarah2.jpg'); }
            66%  { background-image: url('/image/fotobersejarah3.jpg'); }
            100% { background-image: url('/image/fotobersejarah1.jpg'); }
        }

        .hero-title,
        .hero-subtitle {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
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
        }
        
        .btn-oprec:hover {
            background: #e55722;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);
        }
        
        /* Statistics Section */
        .stats-section {
            background: var(--primary-color);
            color: white;
            padding: 4rem 0;
        }
        
        .stat-item {
            text-align: center;
            padding: 2rem;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            color: var(--accent-color);
        }
        
        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        /* News Section */
        .news-section {
            padding: 5rem 0;
            background: #f8f9fa;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .news-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        .news-card .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        
        .news-meta {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        /* Quick Links */
        .quick-links {
            padding: 4rem 0;
            background: white;
        }
        
        .quick-link-item {
            text-align: center;
            padding: 2rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            border: 2px solid #e9ecef;
        }
        
        .quick-link-item:hover {
            border-color: var(--secondary-color);
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(76, 175, 80, 0.1);
        }
        
        .quick-link-icon {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }
        
        /* Footer */
        .footer {
            background: var(--dark-color);
            color: white;
            padding: 3rem 0 1rem;
        }
        
        .footer-content {
            margin-bottom: 2rem;
        }
        
        .footer-title {
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--accent-color);
        }
        
        .social-links a {
            color: white;
            font-size: 1.5rem;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            color: var(--accent-color);
            transform: translateY(-3px);
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .stat-number {
                font-size: 2rem;
            }
            
            .navbar-nav {
                background: rgba(46, 125, 50, 0.95);
                border-radius: 10px;
                margin-top: 1rem;
                padding: 1rem;
            }
        }
        
        /* Animation */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .fade-in-up.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success py-4">
    <div class="container d-flex justify-content-between align-items-center">
        
        <!-- Kiri: Logo + Judul + Garis + Jargon -->
        <div class="d-flex align-items-center">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" style="width: 70px; height: 70px;" class="me-3">

            <div class="d-flex flex-column">
                <span class="fw-bold text-white fs-3">Cakra Manggala</span>
                
                <!-- Garis horizontal pendek -->
                <div style="width: 160px; height: 2px; background-color: black; margin: 2px 0;"></div>
                <small class="fst-italic text-light">Tabah, tangguh, terampil</small>
            </div>
        </div>

        <!-- Kanan: Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link text-light" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="{{ route('about') }}">Profil</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="{{ route('activities') }}">Galeri</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="{{ route('contact') }}">Kontak dan Sosial Media</a></li>
                <li class="nav-item ms-3">
                    <a href="{{ route('login') }}" class="btn btn-light rounded-pill px-4 py-2">
                        <i class="bi bi-box-arrow-in-right"></i> Masuk
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row footer-content">
                <div class="col-md-4">
                    <h5 class="footer-title">UKM Mapala Cakra Manggala</h5>
                    <p>Mahasiswa Pecinta Alam tidak akan memelonco Anda, melainkan akan membimbing Anda. Alam lah yang akan mendidik Anda setiap saat, dalam setiap kondisi, setiap medan, dan setiap situasi. Bila semua itu mampu Anda hadapi, menjelmalah anda menjadi seorang putra putri alam yang TABAH,TANGGUH, TERAMPIL.”</p>
                </div>
                <div class="col-md-4">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}" class="text-light text-decoration-none">Tentang Kami</a></li>
                        <li><a href="{{ route('activities') }}" class="text-light text-decoration-none">Kegiatan</a></li>
                        <li><a href="{{ route('join') }}" class="text-light text-decoration-none">Bergabung</a></li>
                        <li><a href="{{ route('contact') }}" class="text-light text-decoration-none">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="footer-title">Ikuti Sosial Media Cakra Manggala</h5>
                    <div class="social-links">
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; {{ date('Y') }}Cakra Manggala. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Counter animation
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                element.textContent = Math.floor(current);
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                }
            }, 20);
        }
        
        // Trigger counter animation when in view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    animateCounter(counter, target);
                    observer.unobserve(counter);
                }
            });
        });
        
        document.querySelectorAll('.stat-number').forEach(counter => {
            observer.observe(counter);
        });
    </script>
    
    @stack('scripts')
</body>
</html>