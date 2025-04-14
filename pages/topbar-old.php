
<!-- Header Start -->
<div class="header-area">
    <div class="main-header ">
        <div class="header-top black-bg d-none d-md-block">
            <div class="container">
                <div class="col-xl-12">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="header-info-left">
                            <ul>     
                                <li> 
                                    <?php
                                    $tanggal = date("d");
                                    $bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                    $bulan = $bulan[date("n")]; 
                                    $tahun = date("Y");
                                    echo $tanggal . " " . $bulan . " " . $tahun;
                                    date_default_timezone_set('Asia/Jakarta');
                                    $jam = date("H:i");
                                    echo " | " . $jam . " " . "";
                                    $a = date("H");
                                    if (($a >= 1) && ($a <= 10)) {
                                        echo ", Selamat Pagi";
                                        } else if (($a > 10) && ($a <= 13)) { echo ", Selamat Siang"; } else if (($a > 13) && ($a <= 15)) { echo ", Selamat Sore"; } else if (($a > 15) && ($a <= 17)) { echo ", Selamat Petang"; } else { echo ", Selamat Malam"; } ?>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="header-info-right">
                            <ul class="header-social">    
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mid d-none d-md-block">
            <div class="container">
                <div class="row d-flex align-items-center">
                            <!-- Logo -->
                    <!-- <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo/logo2.png" alt=""></a>
                        </div>
                    </div> -->
                    <div class="col-xl-12 col-lg-12 col-md-12">
    <div id="topBarCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/banner/bannerutama1.jpg" class="d-block w-100" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="assets/img/banner/slider2.jpg" class="d-block w-100" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="assets/img/banner/slider3.jpg" class="d-block w-100" alt="Banner 3">
            </div>
        </div>
        <!-- Tombol Navigasi -->
        <button class="carousel-control-prev" type="button" data-bs-target="#topBarCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#topBarCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Tambahkan Bootstrap di bawah jika belum ada -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

                </div>
            </div>
        </div>
        <div class="header-bottom header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                                <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="index.php"><img src="assets/img/logo/fsbanner.png" alt=""></a>
                            </div>
                                <!-- Main-menu -->
                        <div class="main-menu d-none d-md-block">
                            <nav>                  
                                <ul id="navigation">    
                                    <li><a href="index.php">Beranda</a></li>
                                    <li><a href="visimisi.php">Visi & Misi</a></li>
                                    <li><a href="news-list.php">Berita</a></li>
                                    <li><a href="galeri.php">Galeri</a></li>
                                   
                                    <li><a href="about.php">Tentang</a></li>
                                    <li><a href="contact.php">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>             
                    <div class="col-xl-2 col-lg-2 col-md-4">
                        <div class="header-right-btn f-right d-none d-lg-block">
                            <i class="fas fa-search special-tag"></i>
                            <div class="search-box">
                                <form name="search" action="searchh.php" method="post">
                                    <input name="searchtitle" type="text" placeholder="Search">      
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-md-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Header End -->
    