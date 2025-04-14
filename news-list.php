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
    <!-- <?php include('pages/loading.php'); ?> -->
    <!-- Preloader Start-->
    <header>
        <!-- Header Start -->
        <?php include('pages/topbar.php');?>
        <!-- Header End -->
    </header>
    

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <!-- Article -->
                        <?php 
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
                                $total_pages = ceil($total_rows / $no_of_records_per_page);

                                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle, tblposts.viewCounter as viewcounter, tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                                while ($row=mysqli_fetch_array($query)) {
                        ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                                <span class="blog_item_date">
                                    <h3><?php 
                                    $tgl = $row['postingdate'];
                                    echo date('d', strtotime($tgl)); ?></h3>
                                    <p><?php $tgl = $row['postingdate'];
                                    echo date('M', strtotime($tgl)); ?></p>
                                </span>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="details.php?nid=<?php echo htmlentities($row['pid'])?>">
                                    <h2><?php echo htmlentities($row['posttitle']);?></h2>
                                </a>
                                <p></p>
                                <ul class="blog-info-link">
                                    <li><a href="kategori.php?catid=<?php echo htmlentities($row['cid'])?>"><i class="fa fa-user"></i> <?php echo htmlentities($row['category']);?>, <?php echo htmlentities($row['subcategory']);?></a></li>
                                    <li><i class="fa fa-eye"></i> Dilihat <?php echo htmlentities($row['viewcounter']);?> </li>
                                </ul>
                            </div>
                        </article>
                        <?php } ?>
                        <!-- Article End -->

                        <!-- Pagination -->
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="?pageno=1"  class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
                                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link"><?php echo ($pageno) ?></a>
                                </li>
                                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
                                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link"><?php echo ($pageno+1) ?></a>
                                </li>
                                <li class="page-item">
                                    <a href="?pageno=<?php echo $total_pages; ?>" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- Pagination End -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php include('pages/rightbar-portal.php'); ?>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <footer>
        <!-- Footer Start-->
        <?php include('pages/footer.php');?>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->
	<?php include('pages/script.php');?>

</body>
</html>