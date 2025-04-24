<?php
session_start();
include('includes/config.php');
?>

<style>
    #saran-box {
        position: fixed;
        bottom: 80px;
        /* Lebih tinggi dari tombol scroll */
        right: 20px;
        width: 250px;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        padding: 15px;
        z-index: 9999;
        font-family: sans-serif;
        display: none;
        /* Kotak saran awalnya disembunyikan */
    }

    .saran-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: bold;
        margin-bottom: 10px;
    }

    #close-saran {
        background: none;
        color: #000000;
        border: none;
        font-size: 18px;
        cursor: pointer;
    }

    .vote-btn {
        display: block;
        width: 100%;
        margin-top: 8px;
        padding: 8px;
        border: none;
        background-color: #000BAD;
        color: white;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
    }

    .vote-btn:hover {
        background-color: #000980;
    }

    #user-saran {
        resize: none;
        border: 1px solid #ccc;
        border-radius: 6px;
        padding: 8px;
        font-size: 14px;
        font-family: sans-serif;
        color: #333;
    }

    #send-saran {
        background-color: #28a745;
    }

    #send-saran:hover {
        background-color: rgb(7, 98, 27);
    }
</style>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php
    include('pages/header.php'); ?>
</head>

<body>

    <!-- Preloader Start -->

    <!-- Preloader Start -->

    <!-- Header -->
    <header>
        <?php include('pages/topbar.php'); ?>
        <!--  End -->
    </header>
    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <?php include('pages/trending.php'); ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <?php
                            $query2 = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by viewCounter desc LIMIT 1");
                            while ($row2 = mysqli_fetch_array($query2)) {
                            ?>
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="admin/postimages/<?php echo htmlentities($row2['PostImage']); ?>" alt="<?php echo htmlentities($row2['posttitle']); ?>">
                                        <div class="trend-top-cap">
                                            <span><?php echo htmlentities($row2['subcategory']); ?></span>
                                            <h2><a href="details.php?nid=<?php echo htmlentities($row2['pid']) ?>"><?php echo htmlentities($row2['posttitle']); ?></a></h2>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                    <?php
                                    $query3 = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by viewCounter>=3 AND viewCounter <= 5 desc LIMIT 3");
                                    while ($row3 = mysqli_fetch_array($query3)) {
                                    ?>
                                        <div class="col-lg-4">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img mb-30">
                                                    <img src="admin/postimages/<?php echo htmlentities($row3['PostImage']); ?>" alt="<?php echo htmlentities($row3['posttitle']); ?>">
                                                </div>
                                                <div class="trend-bottom-cap">
                                                    <span class="color1"><?php echo htmlentities($row3['subcategory']); ?></span>
                                                    <h4><a href="details.php?nid=<?php echo htmlentities($row3['pid']) ?>"><?php echo htmlentities($row3['posttitle']); ?></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- Right content -->
                        <div class="col-lg-4">

                            <div class="card text-center shadow" style="max-width: 320px; margin: 0 auto; margin-bottom:40px;">
                                <!-- Judul di atas foto -->
                                <div class="card-header text-white border-0" style="background-color: #FF0C0A;">
                                    <h6 class="fw-semibold" style="margin-bottom:0px; padding: 8px">Kepala Fasharkan Surabaya</h6>
                                </div>

                                <!-- Foto -->
                                <img src="assets/img/elements/dummy-prod-1.jpg" class="card-img-top rounded shadow-sm mx-auto mt-4 mb-2" alt="Kafasharkan Surabaya" style="width: 90%; max-width: 280px;">

                                <!-- Nama dan pangkat -->
                                <div class="card-body">
                                    <h6 class="card-title mb-0">Kolonel Laut (T) Martin Sitorus, S.T., M.Tr.Hanla.</h6>
                                </div>
                            </div>

                            <hr style="margin-bottom:40px;">

                            <?php $query = mysqli_query($con, "select id,CategoryName,Description from tblcategory limit 5");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img">
                                        <!-- <img src="assets/img/trending/right1.jpg" alt=""> -->
                                    </div>
                                    <div class="trand-right-cap">
                                        <a href="kategori.php?catid=<?php echo htmlentities($row['id']) ?>"><span class="color1"><?php echo htmlentities($row['CategoryName']); ?></span></a>

                                        <h4><a href="kategori.php?catid=<?php echo htmlentities($row['id']) ?>"></a></h4>
                                        <h6>
                                            <?php echo htmlentities($row['Description']); ?>
                                        </h6>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->
        <!--   Weekly-News start -->
        <div class="weekly-news-area pt-50">
            <div class="container">
                <div class="weekly-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Berita Unggulan</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly-news-active dot-style d-flex dot-style">
                                <?php $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by viewCounter desc LIMIT 8");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <div class="weekly-single">
                                        <div class="weekly-img">
                                            <img src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
                                        </div>
                                        <div class="weekly-caption">
                                            <span class="color1" href="category.php?catid=<?php echo htmlentities($row['cid']) ?>"><?php echo htmlentities($row['category']); ?></span>
                                            <h4><a href="details.php?nid=<?php echo htmlentities($row['pid']) ?>"><?php echo substr($row['posttitle'], 0, 50); ?>...</a></h4>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->
        <!-- Whats New Start -->

        <!-- Whats New End -->
        <!--   Weekly2-News start -->

        <!-- End Weekly-News -->
        <!-- Start Youtube -->
        <div class="youtube-area video-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="video-items-active">
                            <div class="video-items text-center">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/nmPR9xPrStw?si=tw8zc-YGLYKfl7k7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                            <div class="video-items text-center">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/VLUTukodc0M?si=sySIV90g7ITnY8Ht" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="video-items text-center">
                                <iframe src="https://www.youtube.com/embed/VLUTukodc0M?si=sySIV90g7ITnY8Ht" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="video-info">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="video-caption">
                                <div class="top-caption">
                                    <span class="color1">Video</span>
                                </div>
                                <div class="bottom-caption">
                                    <h2>Kegiatan Magang Di Fasharkan Surabaya</h2>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="testmonial-nav text-center">
                                <div class="single-video">
                                    <iframe src="https://youtu.be/nmPR9xPrStw?si=zpg6w46Ox5-l_RGL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    <div class="video-intro">
                                        <h4>OVER THE HORIZON : PROFIL KODIKLATAL</h4>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Start youtube -->

    </main>

    <footer>
        <!-- Footer Start-->
        <?php include('pages/footer.php'); ?>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->


    <?php include('pages/script.php'); ?>

    <!-- Kotak saran -->
    <div id="saran-box">
        <div class="saran-header">
            <span>Beri Penilaian</span>
            <button id="close-saran">×</button> <!-- Tombol Close -->
        </div>
        <div class="saran-content">
            <p>Bagaimana menurutmu?</p>
            <!-- Pilihan Vote -->
            <button class="vote-btn" data-vote="puas">😊 Puas</button>
            <button class="vote-btn" data-vote="cukup">😐 Cukup</button>
            <button class="vote-btn" data-vote="tidak">😞 Tidak Puas</button>
            <!-- Input untuk saran -->
            <textarea id="user-saran" placeholder="Tulis saranmu di sini..." rows="4" style="width: 100%; margin-top: 10px; padding: 8px; border-radius: 6px;"></textarea>
            <!-- Tombol Kirim -->
            <button id="send-saran" class="vote-btn" style="background-color: #28a745; margin-top: 10px;">Kirim Saran</button>
        </div>
    </div>

    <script>
        // Fungsi untuk menutup kotak saran
        document.getElementById('close-saran').addEventListener('click', function() {
            document.getElementById('saran-box').style.display = 'none';
        });

        // Menangani vote yang dipilih
        document.querySelectorAll('.vote-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const vote = this.getAttribute('data-vote');
                alert('Vote kamu: ' + vote); // Bisa diganti dengan AJAX untuk kirim vote
            });
        });

        // Menangani kirim saran
        document.getElementById('send-saran').addEventListener('click', function() {
            const saran = document.getElementById('user-saran').value;

            if (saran.trim() === '') {
                alert('Harap isi saran terlebih dahulu.');
            } else {
                // Kirim saran ke backend, misalnya menggunakan AJAX
                alert('Saran kamu: ' + saran); // Sementara hanya alert saja

                // Setelah kirim, kosongkan textarea
                document.getElementById('user-saran').value = '';
                document.getElementById('saran-box').style.display = 'none'; // Menutup kotak saran setelah kirim
            }
        });

        // Menampilkan kotak saran setelah 10 detik
        window.onload = function() {
            setTimeout(function() {
                document.getElementById('saran-box').style.display = 'block';
            }, 10000); // 10 detik setelah halaman dimuat
        };
    </script>


</body>

</html>