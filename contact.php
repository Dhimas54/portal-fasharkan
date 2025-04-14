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

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">
                    <div class="gm-style">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.4020286230057!2d112.74292407499905!3d-7.194885992810423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f89a23ba3b11%3A0xa64f72fc7b82bbd1!2sBengkel%20Fasharkan%20Surabaya!5e0!3m2!1sid!2sid!4v1741338928947!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
    
    
                <div class="row">
                    <div class="col-lg-12">  
                        <?php 
                        $pagetype='contactus';
                        $query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
                        while($row=mysqli_fetch_array($query))
                        { ?> 
                        <div class="col-lg-12 mt-20">
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-home"></i></span>
                                <div class="media-body">
                                    <h3>Markas Komando Armada Timur TNI AL, Ujung, Kec. Semampir, Surabaya, Jawa Timur 60155 </p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                <div class="media-body">
                                    <h3>-</h3>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-email"></i></span>
                                <div class="media-body">
                                    <h3> fasharkansby@yahoo.co.id</h3>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
    </section>
    <!-- ================ contact section end ================= -->

    <footer>
        <!-- Footer Start-->
        <?php include('pages/footer.php');?>
        <!-- Footer End-->
    </footer>
    <!-- JS here -->
        <?php include('pages/script.php');?>
    </body>
    </html>