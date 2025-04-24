<?php 
    include('includes/config.php');
?>


<!doctype html>
<html class="no-js" lang="zxx">
    <head>
    <?php include('pages/header.php'); ?>
   </head>

   <body>
       
    <!-- Preloader Start -->
    <?php include('pages/loading.php'); ?>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        <?php include('pages/topbar.php');?>
        <!-- Header End -->
    </header>
    
    <main>
    <!-- About US Start -->
    <div class="about-area">
        <div class="container">
            <!-- Hot Aimated News Tittle-->
            <div class="row">
                <?php include('pages/trending.php'); ?>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Profil Fasharkan Surabaya -->
                    <div class="about-right mb-90 text-center">
                        <div class="section-tittle mb-30 pt-30">
                            <h3>Profil Fasharkan Surabaya</h3>
                        </div>
                        <div class="about-prea">
                            <p class="about-pera1 mb-25 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo totam quia dolor pariatur officia perferendis reprehenderit corporis ipsam consequuntur deserunt. Assumenda dolorum delectus asperiores rerum similique voluptatibus, sit itaque eveniet?
                            Rerum similique, voluptates iste aliquid non eaque reprehenderit maiores sunt ab dolore obcaecati excepturi distinctio numquam hic consequuntur? Dicta totam hic expedita quibusdam harum id magnam dolorum similique debitis perferendis!
                            Cupiditate ab veritatis, aliquam, voluptas, modi laboriosam aperiam delectus beatae cum eum unde quas. Eligendi eius placeat molestiae odio unde commodi, quidem, blanditiis provident sapiente, quisquam at hic nam libero.</p>
                        </div>
                    </div>

                    <!-- Sejarah -->
                    <div class="about-right mb-90 text-center">
                        <div class="section-tittle mb-30 pt-30">
                            <h3>Sejarah</h3>
                        </div>
                        <div class="about-prea">
                            <p class="about-pera1 mb-25 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla nihil repudiandae beatae, atque omnis sapiente inventore nobis sit quidem amet architecto id rerum hic. Placeat, earum. At quisquam porro repellat.</p>
                            <p class="about-pera1 mb-25 text-justify">
                            Iste, tenetur repellat? Nostrum repellat quas aspernatur molestiae numquam, rerum assumenda, velit vero excepturi cumque eius, animi et eligendi at nulla atque enim odio voluptas eveniet esse perspiciatis. Quisquam, neque!
                            Dolorum omnis qui quasi velit perspiciatis magni aliquam iusto suscipit autem, similique culpa repudiandae architecto quis modi consequatur a? Hic obcaecati amet at maiores iste soluta inventore esse veniam nobis.</p>
                            Impedit, quos facere asperiores animi sequi rem. Nam doloremque culpa sit vero? Minus excepturi deleniti molestiae rerum dolores, delectus neque quisquam vero necessitatibus voluptatem qui harum, quae laborum velit doloremque.
                            <p class="about-pera1 mb-25 text-justify">
                            Omnis possimus perferendis ducimus labore quas amet doloremque, odit reprehenderit? Adipisci ipsa, eum possimus, nemo consequuntur numquam eos laudantium reprehenderit voluptatem voluptatibus distinctio accusamus? Voluptate sequi recusandae similique iure aut..</p>
                        </div>
                    </div>

                    <!-- Visi & Misi -->
                    <div class="about-right mb-90 text-center">
                        <div class="section-tittle mb-30 pt-30">
                            <h3>Visi & Misi</h3>
                        </div>
                        <div class="about-prea">
                            <h4>Visi</h4>
                            <p>Untuk mewujudkan kesiapan serta kemampuan FASHARKAN SURABAYA dalam mendukung kegiatan harkan KRI/KAL yang akan melaksanakan operasi</p>
                            <h4>Misi</h4>
                            <ul>
                                <li> 1. Mampu melaksanakan dukungan harkan KRI/KAL</li>
                                <li> 2. Mampu melaksakan peeliharaan terencana maupun darurat meliputi harorganik dan harmen </li>
                                <li> 3. Pengembangan dan penyempurnaan sarana prasarana bengkel dan sumber daya manusia yang profesional </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Struktur Organisasi -->
                    <div class="about-right mb-90 text-center">
                        <div class="section-tittle mb-30 pt-30">
                            <!-- <h3>Struktur Organisasi</h3> -->
                        </div>
                        <div class="about-prea">
                            <!-- <p>Struktur organisasi Fasharkan Surabaya...</p> -->
                            <!-- Bisa juga menambahkan gambar struktur organisasi -->
                            <img src="assets/img/hero/STRUKTUR.jpg" alt="Struktur Organisasi" style="width:100%; max-width:800px;">
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
    </div>
    <!-- About US End -->
</main>

   <footer>
       <!-- Footer Start-->
       <?php include('pages/footer.php');?>
       <!-- Footer End-->
   </footer>
	<!-- JS here -->
    <?php include('pages/script.php');?>
    </body>
</html>