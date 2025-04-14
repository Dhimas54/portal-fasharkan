
<div class="col-lg-12">
    <div class="trending-tittle">
        <strong>Trending Now</strong>
        <div class="trending-animated">
            <ul id="js-news" class="js-hidden">
                <?php
                $query2=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by viewCounter desc LIMIT 4");
                while ($row2=mysqli_fetch_array($query2)) { ?>
                <li class="news-item"><?php echo htmlentities($row2['posttitle']);?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>