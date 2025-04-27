<div class="blog_right_sidebar">
    <!-- <aside class="single_sidebar_widget search_widget">
        <form name="search" action="searchh.php" method="post">
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" name="searchtitle" class="form-control" placeholder='Search Keyword' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                    <div class="input-group-append">
                        <button class="btns" type="button"><i class="ti-search"></i></button>
                    </div>
                </div>
            </div>
            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
        </form>
    </aside> -->
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
                    <p>
                    <?php 
                    $tgl = $row['postingdate'];
                    echo date('d-M-Y', strtotime($tgl)); ?>
                    </p>
                </div>
            </div>
        <?php } ?>
    </aside>
</div>