<?php
session_start();
include('includes/config.php'); // koneksi DB
?>


<style>
    /* === POPUP === */
    .vote-popup {
        position: fixed;
        bottom: 160px;
        right: 30px;
        z-index: 1000;
        display: none;
        transform: translateY(20px);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    #vote-box.show {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }


    .vote-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        width: 280px;
        overflow: hidden;
        animation: slideUp 0.3s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .vote-header {
        background: #000BAD;
        color: #fff;
        padding: 12px 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: bold;
    }

    .vote-question {
        padding: 16px;
        font-size: 15px;
        text-align: center;

        margin: 0;
    }

    .vote-options {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 0 16px 16px;
    }

    .vote-btn {
        padding: 10px;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        cursor: pointer;
        color: #000000;
        transition: all 0.3s ease;
        background-color: #f0f0f0;
        font-weight: 500;
    }

    .vote-btn:hover {
        background-color: #000BAD;
        color: #fff;
        transform: scale(1.03);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .vote-btn.selected {
        background-color: #000BAD;
        color: white;
    }

    .close-btn {
        background: transparent;
        border: none;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
    }

    /* Notification */
    .notification {
        position: fixed;
        bottom: 100px;
        right: 20px;
        background-color: #4caf50;
        color: white;
        padding: 12px 16px;
        border-radius: 8px;
        display: none;
        opacity: 0;
        transition: all 0.4s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .elfsight-app-77e1bea3-6f0f-4065-b003-64174f31761c {
        max-width: 100%;
        margin: 0 auto;
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
                                <div class="card-header border-0" style="background-color: #FF0C0A;">
                                    <h6 class="fw-semibold" style="margin-bottom:0px; padding: 8px; color:#FFF !important;">Kepala Fasharkan Surabaya</h6>
                                </div>

                                <?php
                                $kafas_query = mysqli_query($con, "SELECT * FROM tblkafas");
                                while ($kafas = mysqli_fetch_array($kafas_query)) {

                                ?>
                                    <!-- Foto -->
                                    <img src="admin/assets/images/users/<?= $kafas['foto'] ?>" class="card-img-top rounded shadow-sm mx-auto mt-4 mb-2" alt="Kafasharkan Surabaya" style="width: 90%; max-width: 280px;">

                                    <!-- Nama dan pangkat -->
                                    <div class="card-body">
                                        <h6 class="card-title mb-0"><?= $kafas['nama'] ?></h6>
                                    </div>

                                <?php } ?>
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
                                <h3>Berita Terkini</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly-news-active dot-style d-flex dot-style">
                                <?php $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by PostingDate desc LIMIT 8");
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
        <dßiv class="youtube-area video-padding">
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
                    </div>
                </div>


            </div>
        </dßiv>
        <!-- End Start youtube -->

        <!--   Weekly-News start -->
        <div class="weekly-news-area pt-50">
            <div class="container">
                <div class="weekly-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Berita Terpopuler </h3>
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

        <!-- Instagram Feed dari Elfsight -->

        <div class="weekly-news-area pt-30 pb-50">
            <div class="container">
                <div id="instagram-feed text_center">
                    <script src="https://static.elfsight.com/platform/platform.js" async></script>
                    <div class="elfsight-app-77e1bea3-6f0f-4065-b003-64174f31761c" data-elfsight-app-lazy></div>
                </div>
            </div>
        </div>



    </main>

    <footer>
        <!-- Footer Start-->
        <?php include('pages/footer.php'); ?>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->


    <?php include('pages/script.php'); ?>


    <!-- Floating Vote Box -->
    <div id="vote-box" class="vote-popup">
        <div class="vote-container">
            <div class="vote-header">
                <span>Beri Penilaian</span>
                <button id="close-vote" class="close-btn">×</button>
            </div>
            <div class="vote-content">
                <p class="vote-question">Bagaimana pendapatmu?</p>
                <div class="vote-options">
                    <button class="vote-btn" data-vote="puas">😊 Puas</button>
                    <button class="vote-btn" data-vote="cukup">😐 Cukup</button>
                    <button class="vote-btn" data-vote="tidak">😞 Tidak Puas</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifikasi -->
    <div id="vote-notification" class="notification">
        <span id="notification-message"></span>
    </div>

    <script>
        let voteBoxShown = false;

        // Tombol close
        document.getElementById("close-vote").addEventListener("click", function() {
            const voteBox = document.getElementById("vote-box");
            voteBox.classList.remove("show");
            setTimeout(() => {
                voteBox.style.display = "none";
            }, 300); // biar animasinya smooth dulu
        });

        function getCookies(name) {
            const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            if (match) return match[2];
            return null;
        }

        window.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY + window.innerHeight;
            const pageHeight = document.documentElement.scrollHeight;

            const alreadyVoted = getCookies("vote_done");

            if (!voteBoxShown && !alreadyVoted && scrollPosition > pageHeight * 0.6) {
                document.getElementById('vote-box').style.display = 'block';
                voteBoxShown = true;
            }
        });
    </script>

    <script>
        // Cookie Handler
        function getCookie(name) {
            const value = "; " + document.cookie;
            const parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
        }

        function setCookie(name, value, days) {
            const d = new Date();
            d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }

        function generateRandomID() {
            return 'cid-' + Math.random().toString(36).substr(2, 9);
        }

        let cookieID = getCookie('cookie_id');
        if (!cookieID) {
            cookieID = generateRandomID();
            setCookie('cookie_id', cookieID, 30);
        }

        // Fungsi notifikasi
        function showNotification(message, type = 'success') {
            const notif = document.getElementById('vote-notification');
            const msg = document.getElementById('notification-message');
            msg.innerText = message;
            notif.style.backgroundColor = type === 'success' ? '#4caf50' : '#f44336';
            notif.style.display = 'block';
            notif.style.opacity = '1';

            setTimeout(() => {
                notif.style.opacity = '0';
                setTimeout(() => notif.style.display = 'none', 300);
            }, 3000);
        }

        // Handle vote click
        document.querySelectorAll('.vote-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const voteType = this.getAttribute('data-vote');

                // Kirim ke server
                let formData = new URLSearchParams();
                formData.append('vote_type', voteType);
                formData.append('cookie_id', cookieID);

                fetch('action/voting.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: formData.toString()
                    })
                    .then(res => res.json())
                    .then(data => {
                        console.log('Parsed JSON:', data);

                        // Setelah berhasil vote, set cookie vote_done
                        document.cookie = "vote_done=true; path=/; max-age=" + 60 * 60 * 24 * 30; // Berlaku 30 hari

                        // Tutup popup setelah vote
                        const voteBox = document.getElementById("vote-box");
                        voteBox.classList.remove("show");
                        setTimeout(() => {
                            voteBox.style.display = "none";
                        }, 300); // animasi smooth

                        if (data.vote === 'success' || data.saran === 'saran_success') {
                            showNotification('Terima kasih atas penilaiannya!', 'success');
                        } else if (data.vote === 'already_voted') {
                            showNotification('Kamu sudah memberikan penilaian.', 'error');
                        } else if (data.saran === 'saran_already') {
                            showNotification('Saran sudah diberikan sebelumnya.', 'error');
                        } else {
                            alert('Terjadi kesalahan. Silakan coba lagi.');
                        }

                        document.getElementById('saran-box').style.display = 'none';
                    })

            });
        });
    </script>




</body>

</html>