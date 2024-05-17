<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Peminjaman Siap Dana</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">
    <link href="{{ asset('favicon.ico') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('home/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('home/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('home/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('home/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">
    <style>

    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="{{ route('index') }}">Siap Dana</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto " href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="#simulasi">Simulasi</a></li>
                    <li><a class="nav-link scrollto" href="#cara_pengajuan">Cara Pengajuan</a></li>
                    <li><a class="nav-link scrollto" href="#faq">Faq</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                        data-aos="fade-up" data-aos-delay="200">
                        <h1>Peminjaman Siap Dana</h1>
                        <h2>Solusi Terbaik bagi Anda yang terkendala di masalah Finansial Anda!!</h2>
                        <div class="d-flex justify-content-center justify-content-lg-start">
                            <a href="{{ route('register') }}" class="btn-get-started">Daftar Sekarang</a>
                            <a href="{{ route('login') }}" class="btn-watch-video"><i
                                    class="bi bi-play-circle"></i><span>Login</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                        <img src="{{ asset('home/img/hero-img.png') }}" class="img-fluid animated"
                            alt="">
                    </div>
                </div>
            </div>

        </section><!-- End Hero -->

        <!-- ======= About Us Section ======= -->
        <section id="tentang" class="about text-center">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Tentang Siap Dana</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                            Wujudkan impian dan kebutuhan finansial Anda dengan Siap Dana, solusi kredit multiguna yang
                            memberikan kemudahan pencairan dana tunai hingga 500 juta rupiah hanya dengan jaminan BPKB
                            mobil Anda. Nikmati proses yang cepat dan bunga yang bersaing, serta tenor fleksibel dari
                            1-4 tahun. Dengan Siap Dana, apapun kebutuhan Anda, kami siap membantu dengan proses yang
                            mudah dan pembayaran yang praktis
                        </p>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            Untuk informasi lebih lanjut, Anda dapat mengunjungi situs resmi atau menghubungi kantor
                            cabang TAF terdekat.
                        </p>
                        <a href="#" class="btn-learn-more">Learn More</a>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Simulasi Section ======= -->
        <section id="simulasi" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row">

                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content">
                            <h3>Simulasi <strong>Cicilan Peminjaman</strong> per bulan</h3>
                            <div class="mb-2 mt-2">
                                <div class="slidecontainer">
                                    <div class="slidecontainer">
                                        <p>Pokok Pinjaman:
                                        <h3 id="pokok_pinjaman"></h3>
                                        </p>
                                        <input type="range" min="1000000" max="500000000" value="1000000"
                                            class="slider" id="range_pokok" step="1000000">
                                    </div>
                                </div>
                                <div class="mb-2 mt-2">
                                    <div class="slidecontainer">
                                        <div class="slidecontainer">
                                            <p>Tenor:
                                            <h3 id="tenor"></h3>
                                            </p>
                                            <input type="range" min="3" max="60" value="1"
                                                class="slider" id="range_tenor">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <h3>Angsuran : <strong id="angsuran"></strong></h3>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("{{ asset('home/img/why-us.png') }}");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
                </div>

            </div>
        </section><!-- End Simulasi Section -->

        <!-- ======= Cara Pengajuan Section ======= -->
        <section id="cara_pengajuan" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Cara Pengajuan</h2>
                    <p>Temukan kemudahan mengakses dana impian Anda dengan <strong>Siap Dana</strong>. Ikuti
                        langkah-langkah sederhana ini dan mulailah perjalanan menuju kebebasan finansial.</p>
                </div>

                <div class="row">
                    <div class="col-xl-2 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-registered"></i></div>
                            <h4><a href="">Daftar Sekarang</a></h4>
                            <p>Mulai langkah pertama Anda dengan mendaftar di platform kami.</p>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-log-in"></i></div>
                            <h4><a href="">Masuk ke Akun Anda</a></h4>
                            <p>Gunakan kredensial Anda untuk masuk dan mulai pengalaman Siap Dana.</p>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">Lengkapi Profil Anda</a></h4>
                            <p>Isi informasi pribadi Anda untuk mempercepat proses validasi.</p>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-time-five"></i></div>
                            <h4><a href="">Verifikasi Data</a></h4>
                            <p>Tenang dan biarkan tim kami memverifikasi data Anda dengan cepat.</p>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxs-bank"></i></div>
                            <h4><a href="">Konfirmasi Rekening Bank</a></h4>
                            <p>Setelah verifikasi, konfirmasikan rekening bank Anda untuk menerima dana.</p>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-check-double"></i></div>
                            <h4><a href="">Dana Disetujui</a></h4>
                            <p>Cheers! Dana Anda telah disetujui dan siap untuk digunakan.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Cara Pengajuan Section -->

        <!-- ======= Paling Sering ditanya Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>FAQ: Jawaban untuk Pertanyaan Anda</h2>
                    <p>Apakah Anda memiliki pertanyaan tentang <strong>Siap Dana</strong>? Temukan jawaban untuk semua
                        pertanyaan Anda di sini! Dari proses aplikasi hingga tips pengelolaan dana, kami telah
                        mengumpulkan informasi penting untuk membantu Anda memahami layanan kami lebih baik. Jangan ragu
                        untuk menjelajahi dan mendapatkan wawasan yang Anda butuhkan.</p>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#faq-list-1">Ingin Tahu Lebih Tentang Keuntungan Finansial Anda?
                                Temukan Detail Suku Bunga dan Biaya Pinjaman Siap Dana Disini! <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    Dengan <strong>Siap Dana</strong>, nikmati suku bunga yang kompetitif dan biaya
                                    transparan yang dirancang untuk memberikan nilai terbaik bagi Anda. Kami berkomitmen
                                    untuk memastikan bahwa Anda mendapatkan solusi pembiayaan yang sesuai dengan
                                    kebutuhan Anda, tanpa biaya tersembunyi. Biaya peminjaman kami dihitung untuk
                                    mendukung keberlanjutan finansial Anda, memungkinkan Anda untuk merencanakan masa
                                    depan dengan lebih pasti.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i>
                            <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Pilihan
                                Fleksibel Cicilan Siap Dana: Temukan yang Sesuai dengan Rencana Anda! <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Pilih jangka waktu cicilan yang sesuai dengan kebutuhan Anda, mulai dari <strong>3
                                        bulan hingga 60 bulan</strong>. Dengan fleksibilitas ini, Anda dapat mengatur
                                    kembali anggaran dan memastikan bahwa cicilan tidak membebani keuangan Anda.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i>
                            <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Kriteria
                                Pengajuan Siap Dana: Apa yang Dibutuhkan untuk Memulai? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <div class="faq-content">
                                    <p>Siapkan diri Anda untuk kesempatan memperoleh dana dengan memenuhi syarat-syarat
                                        berikut:</p>
                                    <ul>
                                        <li><strong>Rekening Bank:</strong> Pastikan Anda memiliki rekening Bank.</li>
                                        <li><strong>Usia:</strong> Anda harus berusia minimal 21 tahun saat mengajukan
                                            dan tidak lebih dari 55 tahun saat pinjaman jatuh tempo.</li>
                                        <li><strong>Kewarganegaraan:</strong> Warga Negara Indonesia dengan e-KTP.</li>
                                        <li><strong>Penghasilan:</strong> Penghasilan bulanan minimum Rp 3.000.000,-.
                                        </li>
                                        <li><strong>Jenis Pekerjaan:</strong> Terbuka untuk berbagai profesi, termasuk:
                                            <ul>
                                                <li>Karyawan (permanen/kontrak)</li>
                                                <li>Pegawai Pemerintah</li>
                                                <li>Wiraswasta</li>
                                                <li>Profesional</li>
                                                <li>Pekerja Informal</li>
                                                <li>Ibu Rumah Tangga</li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <p>Persiapkan dokumen dan informasi ini untuk memulai perjalanan finansial Anda
                                        dengan <strong>Siap Dana</strong>.</p>
                                </div>
                            </div>
                        </li>


                    </ul>
                </div>

            </div>
        </section><!-- End Paling Sering ditanya Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Siap Dana</h3>
                        <p>
                            Gedung Perkantoran The Tower, Lt.8 & 9
                            Jl. Jend Gatot Subroto Kav.12-13
                            Kota Adm. Jakarta Selatan
                            DKI Jakarta 12930.<br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Navigasi</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#tentang">Tentang</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#simulasi">Simulasi</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#cara_pengajuan">Cara Pengajuan</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="login.php">Login</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Perusahaan</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Tentang Kami</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Investor</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Tata Kelola</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">CSR</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Karir</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Berita Terbaru</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Sosial Media</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://instagram.com/isannsss_">Ichsan Hanifdeal</a>
            </div>
        </div>
    </footer>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('home/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('home/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('home/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('home/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('home/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('home/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('home/js/main.js') }}"></script>

    <script>
        var slider = document.getElementById("range_pokok");
        var output = document.getElementById("pokok_pinjaman");

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp" + rupiah : "";
        }

        output.innerHTML = formatRupiah(slider.value, "Rp");

        slider.oninput = function() {
            output.innerHTML = formatRupiah(this.value, "Rp");
        };
        document.addEventListener("DOMContentLoaded", function() {
            var slider = document.getElementById("range_tenor");
            var output = document.getElementById("tenor");
            output.innerHTML = slider.value + " Bulan";

            slider.oninput = function() {
                output.innerHTML = this.value + " Bulan";
            };
        });

        function hitungAngsuran(pokokPinjaman, tenor) {
            var angsuranDasar = pokokPinjaman / tenor;
            var angsuran = angsuranDasar * 1.1;
            return angsuran;
        }

        function formatRupiah(angka) {
            var reverse = angka.toString().split("").reverse().join(""),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join(".").split("").reverse().join("");
            return "Rp" + ribuan;
        }

        document.addEventListener("DOMContentLoaded", function() {
            var sliderPokok = document.getElementById("range_pokok");
            var sliderTenor = document.getElementById("range_tenor");
            var outputAngsuran = document.getElementById("angsuran");

            function perbaruiAngsuran() {
                var pokokPinjaman = parseInt(sliderPokok.value);
                var tenor = parseInt(sliderTenor.value);
                var angsuran = hitungAngsuran(pokokPinjaman, tenor);
                outputAngsuran.innerHTML = formatRupiah(angsuran.toFixed(0));
            }

            sliderPokok.addEventListener("input", perbaruiAngsuran);
            sliderTenor.addEventListener("input", perbaruiAngsuran);

            perbaruiAngsuran();
        });
    </script>
</body>

</html>
