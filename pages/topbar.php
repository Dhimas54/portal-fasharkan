<style>
    .hero-banner {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .hero-img {
        width: 100%;
        max-height: 700px;
        object-fit: cover;
        display: block;
    }

    /* Responsive Logo */
    @media (max-width: 768px) {
        #responsive-logo {
            max-height: 50px;
        }
    }

    @media (max-width: 576px) {
        #responsive-logo {
            max-height: 40px;
        }
    }
</style>


<!-- Header Start -->
<div class="header-area">
    <div class="main-header ">
        <div class="header-top black-bg d-none d-md-block">
            <div class="container">
                <div class="col-xl-12">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="header-info-left">
                            <ul style="margin-bottom:0px">
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
                                    } else if (($a > 10) && ($a <= 13)) {
                                        echo ", Selamat Siang";
                                    } else if (($a > 13) && ($a <= 15)) {
                                        echo ", Selamat Sore";
                                    } else if (($a > 15) && ($a <= 17)) {
                                        echo ", Selamat Petang";
                                    } else {
                                        echo ", Selamat Malam";
                                    } ?>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <!-- Hero Banner Start -->
            <div class="hero-banner">
                <img src="assets/img/banner/banner_utama.jpg" alt="Hero Banner" class="img-fluid w-100 hero-img">
            </div>

        </div>


        <div class="header-bottom header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-10 col-lg-10 col-md-12 header-flex d-flex justify-content-between">
                        <!-- sticky -->
                        <div class="sticky-logo">
                            <a href="index.php"><img src="assets/img/logo/fsbanner_2.png" alt="Logo" class="img-fluid" style="max-height: 80px;" id="responsive-logo"></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-md-block">
                            <nav>
                                <ul id="navigation" style="margin-bottom:0px">
                                    <li><a href="index.php">Beranda</a></li>
                                    <li><a href="profil.php">Profil</a></li>
                                    <!-- <li><a href="visimisi.php">Visi & Misi</a></li> -->
                                    <li><a href="berita.php">Berita</a></li>
                                    <li><a href="galeri.php">Galeri</a></li>
                                    <li><a href="pelayanan.php">Pelayanan Publik</a></li>

                                    <!-- <li><a href="about.php">Sejarah</a></li> -->
                                    <li><a href="contact.php">Kontak</a></li>
                                </ul>
                            </nav>
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