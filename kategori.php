<?php 
    session_start();
    error_reporting(0);
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
    <?php include('pages/loading.php'); ?>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        <?php include('pages/topbar.php');?>
        <!-- Header End -->
    </header>

    <main>
   <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
            <div class="col-lg-8">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle mb-30">
                            <h3>Kategori</h3>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="properties__button">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- card one -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                                <div class="whats-news-caption">
                                    <div class="row">
                                    <?php 
                                        if($_GET['catid']!=''){
                                        $_SESSION['catid']=intval($_GET['catid']);
                                        }
                                        if (isset($_GET['pageno'])) {
                                            $pageno = $_GET['pageno'];
                                        } else {
                                            $pageno = 1;
                                        }
                                        $no_of_records_per_page = 10;
                                        $offset = ($pageno-1) * $no_of_records_per_page;
                                        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                        $result = mysqli_query($con,$total_pages_sql);
                                        $total_rows = mysqli_fetch_array($result)[0];
                                        $total_pages = ceil($total_rows / $no_of_records_per_page); $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId='".$_SESSION['catid']."' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");
                                        $rowcount=mysqli_num_rows($query);
                                        if($rowcount==0)
                                        {
                                          echo "No record found";
                                        }
                                        else { 
                                          while ($row=mysqli_fetch_array($query)) { ?>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                                                </div>
                                                <div class="what-cap">
                                                    <!-- <span class="color1">Night party</span> -->
                                                    <h4><a href="details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- End Nav Card -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Kategori</h4>
                        <ul class="list cat-list">
                        <?php $query2=mysqli_query($con,"select id, CategoryName from tblcategory"); 
                        while($row1=mysqli_fetch_array($query2)) 
                        { ?> 
                            <li>
                                <a href="kategori.php?catid=<?php echo htmlentities($row1['id'])?>" class="d-flex">
                                    <p><?php echo htmlentities($row1['CategoryName']);?></p>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Berita Lainnya</h3>
                            <?php
                                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle, tblposts.PostingDate as postingdate, tblposts.PostImage as postimage from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by rand() limit 5");
                                while ($row=mysqli_fetch_array($query)) {

                            ?>
                            <div class="media post_item">
                                <img class="img-thumbnail" style="max-width:40%;" src="admin/postimages/<?php echo htmlentities($row['postimage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                                <div class="media-body">
                                    <a href="details.php?nid=<?php echo htmlentities($row['pid'])?>">
                                        <h6><?php echo substr($row['posttitle'], 0,30);?>...</h6>
                                    </a>
                                    <p><?php 
                                    $tgl = $row['postingdate'];
                                    echo date('d-M-Y', strtotime($tgl)); ?></p>
                                </div>
                            </div>
                            <?php } ?>
                    </aside>
                </div>
                <!-- New Poster -->
                
            </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->


    <!--Start pagination -->
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item">
                                    <a href="?pageno=1" class="page-link"><span class="flaticon-arrow roted"></span></a>
                                </li>
                                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
                                    <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><?php echo ($pageno) ?></a>
                                </li>
                                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
                                    <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> "><?php echo ($pageno+1) ?></a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="?pageno=<?php echo $total_pages; ?>"><span class="flaticon-arrow right-arrow"></span></a>
                                </li>
                            </ul>
                          </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->
    <?php } ?>
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