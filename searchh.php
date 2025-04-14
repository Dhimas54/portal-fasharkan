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
                            if($_POST['searchtitle']!=''){
                            $st=$_SESSION['searchtitle']=$_POST['searchtitle'];
                            }
                            $st;

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

                                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle, tblposts.viewCounter as viewcounter, tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url,tblposts.PostImage from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.PostTitle like '%$st%' and tblposts.Is_Active=1 LIMIT $offset, $no_of_records_per_page");
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
                                <p>
                                </p>
                                    
                                    
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
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form name="search" action="searchh.php" method="post">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" name="searchtitle" class="form-control" placeholder='Search Keyword' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside>

                        <!-- Category -->
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Kategori</h4>
                            <ul class="list cat-list">
                            <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory"); 
                            while($row=mysqli_fetch_array($query)) 
                            { ?> 
                                <li>
                                    <a href="kategori.php?catid=<?php echo htmlentities($row['id'])?>" class="d-flex">
                                        <p><?php echo htmlentities($row['CategoryName']);?></p>
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </aside>
                        <!-- Category End -->

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
                                        <h3><?php echo substr($row['posttitle'], 0,40);?>...</h3>
                                    </a>
                                    <p><?php 
                                    $tgl = $row['postingdate'];
                                    echo date('d-M-Y', strtotime($tgl)); ?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </aside>

                    </div>
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