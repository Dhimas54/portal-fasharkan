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
                        <?php include('pages/trending.php');?>
                    </div>
                   <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Tittle -->
                            <div class="about-right mb-90">
                            <?php 
                            $pagetype='visimisi';
                            $query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
                            while($row=mysqli_fetch_array($query))
                            { ?> 
                                <div class="about-img">
                                    <img src="assets/img/logo/logofs.png" alt="">
                                </div>

                                <div class="section-tittle mb-30 pt-30">
                                    <h3><?php echo htmlentities($row['PageTitle'])?></h3>
                                </div>
                                <div class="about-prea">
                                    <p class="about-pera1 mb-25"><?php echo $row['Description'];?></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <?php include('pages/rightbar-portal.php'); ?>
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