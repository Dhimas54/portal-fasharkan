<?php 
    include('includes/config.php');
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include('pages/header.php'); ?>
    <style>
        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            padding: 20px;
        }
        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .gallery-item img:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <!-- Preloader Start -->
    <?php include('pages/loading.php'); ?>
    <!-- Preloader End -->

    <header>
        <!-- Header Start -->
        <?php include('pages/topbar.php');?>
        <!-- Header End -->
    </header>

    <section class="contact-section">
        <div class="container">
            <h2 class="text-center mb-4">Galeri</h2>
            <div class="gallery-container">
                <?php 
                    $query = "SELECT * FROM tblimage ORDER BY id DESC";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="gallery-item">';
                        echo '<img src="admin/postgambar/' . $row['gambar_url'] . '" alt="' . $row['judul'] . '">';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </section>

    <footer>
        <!-- Footer Start-->
        <?php include('pages/footer.php');?>
        <!-- Footer End-->
    </footer>
    <!-- JS here -->
    <?php include('pages/script.php');?>
</body>
</html>
