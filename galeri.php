<?php 
    include('includes/config.php');

    // Tentukan jumlah gambar per halaman
    $limit = 12; 

    // Ambil nomor halaman dari URL, default = 1
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page = max($page, 1); // Pastikan halaman minimal 1

    // Hitung offset untuk query
    $offset = ($page - 1) * $limit;

    // Query untuk mengambil gambar dengan pagination
    $query = "SELECT * FROM tblimage ORDER BY id DESC LIMIT $limit OFFSET $offset";
    $result = mysqli_query($con, $query);

    // Hitung total gambar di database
    $countQuery = "SELECT COUNT(*) AS total FROM tblimage";
    $countResult = mysqli_query($con, $countQuery);
    $totalImages = mysqli_fetch_assoc($countResult)['total'];

    // Hitung jumlah halaman
    $totalPages = ceil($totalImages / $limit);
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
            cursor: pointer;
        }
        .gallery-item img:hover {
            transform: scale(1.05);
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            max-width: 80%;
            max-height: 80%;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.2);
        }
        .close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 35px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            z-index: 1100;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 5px;
        }

        .pagination a, .pagination span {
            padding: 10px 15px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
            border: 2px solid #007bff;
        }

        .pagination a {
            background-color: #007bff;
            color: white;
        }

        .pagination a:hover {
            background-color: #0056b3;
        }

        .pagination .active {
            background-color: #28a745;
            border-color: #28a745;
        }

        .pagination .disabled {
            background-color: #ccc;
            border-color: #ccc;
            color: #777;
            pointer-events: none;
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
                    // $query = "SELECT * FROM tblimage ORDER BY id DESC";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="gallery-item">';
                        echo '<img src="admin/postgambar/' . $row['gambar_url'] . '" alt="' . $row['judul'] . '" onclick="openModal(this.src)">';
                        echo '</div>';
                    }
                ?>
            </div>

            <!-- Pagination Links -->
            <div class="pagination">
                <?php if ($page > 1) { ?>
                    <a href="?page=<?php echo $page - 1; ?>">⟨ Prev</a>
                <?php } else { ?>
                    <span class="disabled">⟨ Prev</span>
                <?php } ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <a href="?page=<?php echo $i; ?>" 
                    class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php } ?>

                <?php if ($page < $totalPages) { ?>
                    <a href="?page=<?php echo $page + 1; ?>">Next ⟩</a>
                <?php } else { ?>
                    <span class="disabled">Next ⟩</span>
                <?php } ?>
            </div>

        </div>
    </section>

    <!-- Modal -->
    <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImg">
    </div>

    <script>
        function openModal(src) {
            document.getElementById("imageModal").style.display = "flex";
            document.getElementById("modalImg").src = src;
        }
        function closeModal() {
            document.getElementById("imageModal").style.display = "none";
        }
    </script>

    <footer>
        <!-- Footer Start-->
        <?php include('pages/footer.php');?>
        <!-- Footer End-->
    </footer>
    <!-- JS here -->
    <?php include('pages/script.php');?>
</body>
</html>
