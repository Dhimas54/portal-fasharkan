<?php 
    session_start();
    include('includes/config.php');
?>

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
        <?php include('pages/topbar.php');?>
    <!--  End -->
    </header>
    <main>
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                <?php include('pages/trending.php');?>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <?php
                           $query2=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by viewCounter desc LIMIT 1");
                            while ($row2=mysqli_fetch_array($query2)) {
                        ?>
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="admin/postimages/<?php echo htmlentities($row2['PostImage']);?>" alt="<?php echo htmlentities($row2['posttitle']);?>">
                                <div class="trend-top-cap">
                                    <span><?php echo htmlentities($row2['subcategory']);?></span>
                                    <h2><a href="details.php?nid=<?php echo htmlentities($row2['pid'])?>"><?php echo htmlentities($row2['posttitle']);?></a></h2>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                <?php
                                    $query3=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by viewCounter>=3 AND viewCounter <= 5 desc LIMIT 3");
                                    while ($row3=mysqli_fetch_array($query3)) {
                                        ?>
                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="admin/postimages/<?php echo htmlentities($row3['PostImage']);?>" alt="<?php echo htmlentities($row3['posttitle']);?>">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color1"><?php echo htmlentities($row3['subcategory']);?></span>
                                            <h4><a href="details.php?nid=<?php echo htmlentities($row3['pid'])?>"><?php echo htmlentities($row3['posttitle']);?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                        <?php $query=mysqli_query($con,"select id,CategoryName,Description from tblcategory limit 5");
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>
                        <div class="trand-right-single d-flex">
                            <div class="trand-right-img">
                                <!-- <img src="assets/img/trending/right1.jpg" alt=""> -->
                            </div>
                            <div class="trand-right-cap">
                                <a href="kategori.php?catid=<?php echo htmlentities($row['id'])?>"><span class="color1"><?php echo htmlentities($row['CategoryName']);?></span></a>

                                <h4><a href="kategori.php?catid=<?php echo htmlentities($row['id'])?>"></a></h4> 
                                <h6>
                                <?php echo htmlentities($row['Description']);?>
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
                            <?php $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by viewCounter desc LIMIT 8");
                            while ($row=mysqli_fetch_array($query)) { 
                            ?>
                            <div class="weekly-single">
                                <div class="weekly-img">
                                    <img src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                                </div>
                                <div class="weekly-caption">
                                    <span class="color1"href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></span>
                                    <h4><a href="details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo substr($row['posttitle'], 0,30);?>...</a></h4>
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
 
        
    <!--  Recent Articles start -->
    <div class="recent-articles">
        <div class="container">
           <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Artikel Terbaru</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                        <?php 
                    if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        $no_of_records_per_page = 8;
                        $offset = ($pageno-1) * $no_of_records_per_page;


                        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                        $result = mysqli_query($con,$total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc LIMIT 6");
                        while ($row=mysqli_fetch_array($query)) {
                        ?>
                            <div class="single-recent mb-100">
                                <div class="what-img">
                                <img src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                                </div>
                                <div class="what-cap">
                                    <span class="color1" href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></span>
                                    <h4><a href="details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo substr($row['posttitle'], 0,50);?>...</a></h4>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>           
    <!--Recent Articles End -->
  
    
    <!--Start pagination -->
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                              <!--<li class="page-item"><a class="page-link" href="?pageno=1"><span class="flaticon-arrow roted"></span></a></li>
                                 <li class="page-item active"><a class="page-link" href="#"></a></li>
                                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item"><a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"></a></li>
                              <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>"><span class="flaticon-arrow right-arrow"></span></a></li> -->

                                <!-- <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
                                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
                                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
                                </li>
                                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
                                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
                                </li>
                                <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li> -->
                            </ul>
                          </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->
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