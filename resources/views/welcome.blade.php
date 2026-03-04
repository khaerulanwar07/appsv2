<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Landing page portofolio pribadi Khaerul Anwar, berisi profil, skill, proyek, dan kontak.">
    <title>Khaerul Anwar | Portofolio</title>
    <style>
        :root {
            --bg: #0a0f1f;
            --panel: rgba(16, 21, 44, 0.62);
            --text: #e9ecff;
            --muted: #9ba8d3;
            --line: rgba(165, 186, 255, 0.2);
            --accent: #66e3ff;
            --accent-2: #8d7dff;
            --accent-3: #3cffc7;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            scroll-behavior: smooth;
            font-family: Inter, "Segoe UI", Roboto, Arial, sans-serif;
            background: radial-gradient(circle at 10% 10%, #1a2a5d 0%, transparent 30%),
                        radial-gradient(circle at 80% 20%, #482b7a 0%, transparent 30%),
                        radial-gradient(circle at 70% 80%, #1f5f7a 0%, transparent 30%),
                        var(--bg);
            color: var(--text);
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            background-size: 34px 34px;
            pointer-events: none;
            z-index: -1;
        }

        .container {
            width: min(1140px, 92%);
            margin-inline: auto;
        }

        .glass {
            background: var(--panel);
            border: 1px solid var(--line);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
        }

        nav {
            position: sticky;
            top: 18px;
            z-index: 20;
            margin: 20px auto 0;
            width: min(1140px, 92%);
        }

        .nav-wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 18px;
        }

        .brand {
            font-weight: 700;
            letter-spacing: 0.4px;
        }

        .brand span {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            gap: 18px;
            list-style: none;
        }

        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.92rem;
            transition: 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--text);
        }

        .hero {
            min-height: 90vh;
            display: grid;
            place-items: center;
            padding: 80px 0 40px;
        }

        .hero-card {
            padding: 46px;
            width: 100%;
            display: grid;
            grid-template-columns: 1.3fr 0.9fr;
            gap: 28px;
            align-items: center;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--line);
            border-radius: 999px;
            padding: 8px 14px;
            font-size: 0.82rem;
            color: var(--muted);
            margin-bottom: 16px;
        }

        h1 {
            font-size: clamp(2rem, 3.7vw, 3.6rem);
            line-height: 1.13;
            margin-bottom: 14px;
        }

        .gradient-text {
            background: linear-gradient(90deg, var(--accent), var(--accent-3), var(--accent-2));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .lead {
            color: var(--muted);
            line-height: 1.7;
            max-width: 560px;
            margin-bottom: 26px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            border: none;
            border-radius: 12px;
            padding: 11px 18px;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.95rem;
            transition: transform 0.2s ease, opacity 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn:hover {
            transform: translateY(-2px);
            opacity: 0.94;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent-2), var(--accent));
            color: #031126;
        }

        .btn-outline {
            background: transparent;
            color: var(--text);
            border: 1px solid var(--line);
        }

        .hero-side {
            display: grid;
            gap: 14px;
        }

        .metric {
            padding: 16px;
            border-radius: 14px;
            border: 1px solid var(--line);
            background: rgba(14, 19, 40, 0.74);
        }

        .metric strong {
            display: block;
            font-size: 1.45rem;
            margin-bottom: 4px;
            color: var(--accent);
        }

        .metric span {
            font-size: 0.9rem;
            color: var(--muted);
        }

        section {
            padding: 34px 0;
        }

        .section-card {
            padding: 30px;
        }

        .section-title {
            font-size: 1.45rem;
            margin-bottom: 18px;
        }

        .section-text {
            color: var(--muted);
            line-height: 1.75;
        }

        .chips {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 14px;
        }

        .chip {
            padding: 9px 12px;
            border-radius: 12px;
            border: 1px solid var(--line);
            font-size: 0.86rem;
            color: #d9e4ff;
            background: rgba(16, 24, 47, 0.75);
        }

        .project-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-top: 8px;
        }

        .project {
            padding: 14px;
            border-radius: 14px;
            border: 1px solid var(--line);
            background: rgba(14, 18, 37, 0.76);
        }

        .project-thumb {
            height: 160px;
            border-radius: 10px;
            margin-bottom: 12px;
            border: 1px solid var(--line);
            display: grid;
            place-items: center;
            font-size: 0.8rem;
            letter-spacing: 0.6px;
            color: #dbe4ff;
            text-align: center;
            padding: 10px;
        }

        .thumb-yppit {
            background: linear-gradient(135deg, #2a4fff, #26b6ff);
        }

        .thumb-jdih-jateng {
            background: linear-gradient(135deg, #1f9f71, #6cdf8f);
        }

        .thumb-jdih-semarang {
            background: linear-gradient(135deg, #b36f00, #ffc266);
        }

        .thumb-zilenial {
            background: linear-gradient(135deg, #6c2bff, #d15dff);
        }

        .project h3 {
            margin-bottom: 8px;
            font-size: 1.03rem;
        }

        .project p {
            color: var(--muted);
            line-height: 1.6;
            font-size: 0.93rem;
        }

        .project a {
            margin-top: 12px;
            display: inline-block;
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin-top: 16px;
        }

        .contact-item {
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 14px;
            background: rgba(14, 18, 37, 0.66);
        }

        .contact-item small {
            display: block;
            color: var(--muted);
            margin-bottom: 5px;
        }

        .contact-item a {
            color: var(--text);
            text-decoration: none;
            font-weight: 600;
        }

        footer {
            text-align: center;
            color: var(--muted);
            padding: 36px 0 30px;
            font-size: 0.88rem;
        }

        @media (max-width: 980px) {
            .hero-card {
                grid-template-columns: 1fr;
                padding: 28px;
            }

            .project-grid,
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 680px) {
            .nav-wrap {
                flex-direction: column;
                gap: 8px;
            }

            .nav-links {
                gap: 12px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                min-height: auto;
                padding-top: 42px;
            }
        }
    </style>
</head>
<body>
    <nav class="glass">
        <div class="nav-wrap">
            <div class="brand">Khaerul<span>Anwar</span></div>
            <ul class="nav-links">
                <li><a href="#about">Tentang</a></li>
                <li><a href="#skills">Skill</a></li>
                <li><a href="#projects">Proyek</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </div>
    </nav>

    <header class="hero container">
        <div class="hero-card glass">
            <div>
                <div class="badge">Available for Collaboration - 2026 Style</div>
                <h1>
                    Halo, saya <span class="gradient-text">Khaerul Anwar</span><br>
                    Web Developer & Creative Builder
                </h1>
                <p class="lead">
                    Saya membangun website dan aplikasi digital dengan perpaduan performa, estetika modern, dan pengalaman
                    pengguna yang rapi. Fokus saya adalah membuat produk yang cepat, elegan, dan berdampak.
                </p>
                <div class="actions">
                    <a class="btn btn-primary" href="#projects">Lihat Portofolio</a>
                    <a class="btn btn-outline" href="#contact">Hubungi Saya</a>
                </div>
            </div>
            <aside class="hero-side">
                <div class="metric">
                    <strong>5+ Tahun</strong>
                    <span>Pengalaman pengembangan web dan sistem internal</span>
                </div>
                <div class="metric">
                    <strong>30+ Proyek</strong>
                    <span>Website bisnis, dashboard, dan landing page conversion-focused</span>
                </div>
                <div class="metric">
                    <strong>99%</strong>
                    <span>Komitmen pada kualitas delivery dan support pasca-rilis</span>
                </div>
            </aside>
        </div>
    </header>

    <main class="container">
        <section id="about">
            <div class="section-card glass">
                <h2 class="section-title">Tentang Saya</h2>
                <p class="section-text">
                    Saya adalah pribadi yang senang merancang solusi digital dari nol hingga siap digunakan. Mulai dari
                    riset kebutuhan, desain antarmuka, hingga pengembangan backend. Saya percaya karya terbaik lahir dari
                    detail yang konsisten, komunikasi yang baik, dan eksekusi yang disiplin.
                </p>
            </div>
        </section>

        <section id="skills">
            <div class="section-card glass">
                <h2 class="section-title">Tech Stack & Skill</h2>
                <p class="section-text">Teknologi yang sering saya gunakan untuk membangun produk modern:</p>
                <div class="chips">
                    <span class="chip">HTML5</span>
                    <span class="chip">CSS3 / Modern UI</span>
                    <span class="chip">JavaScript</span>
                    <span class="chip">PHP & Laravel</span>
                    <span class="chip">MySQL</span>
                    <span class="chip">REST API</span>
                    <span class="chip">UI/UX Thinking</span>
                    <span class="chip">Performance Optimization</span>
                </div>
            </div>
        </section>

        <section id="projects">
            <div class="section-card glass">
                <h2 class="section-title">Proyek Pilihan</h2>
                <div class="project-grid">
                    <article class="project">
                        <div class="project-thumb thumb-yppit">THUMBNAIL<br>SIAKAD YPPIT TEXMACO</div>
                        <h3>Sistem Informasi Akademik YPPIT Texmaco</h3>
                        <p>Platform akademik terintegrasi untuk pengelolaan data siswa, nilai, jadwal, absensi, dan administrasi sekolah.</p>
                    </article>
                    <article class="project">
                        <div class="project-thumb thumb-jdih-jateng">THUMBNAIL<br>JDIH PROVINSI JAWA TENGAH</div>
                        <h3>JDIH Provinsi Jawa Tengah</h3>
                        <p>Situs dokumentasi dan pencarian produk hukum daerah Provinsi Jawa Tengah dengan struktur data yang rapi dan mudah diakses publik.</p>
                    </article>
                    <article class="project">
                        <div class="project-thumb thumb-jdih-semarang">THUMBNAIL<br>JDIH KOTA SEMARANG</div>
                        <h3>JDIH Kota Semarang</h3>
                        <p>Portal layanan informasi hukum Kota Semarang untuk publikasi peraturan, keputusan, dan dokumen hukum secara digital.</p>
                    </article>
                    <article class="project">
                        <div class="project-thumb thumb-zilenial">THUMBNAIL<br>ZILENIAL JATENG</div>
                        <h3>Zilenial Jateng</h3>
                        <p>Website program kepemudaan Jawa Tengah dengan pendekatan visual modern untuk publikasi kegiatan dan engagement komunitas.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="contact">
            <div class="section-card glass">
                <h2 class="section-title">Kontak</h2>
                <p class="section-text">Terbuka untuk project freelance, kolaborasi, atau full-time opportunity.</p>
                <div class="contact-grid">
                    <div class="contact-item">
                        <small>Email</small>
                        <a href="mailto:khaerul@sevenmediatech.co.id">khaerul@sevenmediatech.co.id</a>
                    </div>
                    <div class="contact-item">
                        <small>LinkedIn</small>
                        <a href="https://linkedin.com" target="_blank" rel="noreferrer">linkedin.com/in/khaerulanwar</a>
                    </div>
                    <div class="contact-item">
                        <small>Instagram</small>
                        <a href="https://instagram.com" target="_blank" rel="noreferrer">@khaerulanwar.id</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        © {{ date('Y') }} Khaerul Anwar. Crafted with clean code and modern aesthetics.
    </footer>
</body>
</html>
