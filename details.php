<?php 
    session_start();
    include('includes/config.php');
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
    if(isset($_POST['submit']))
    {
        //Verifying CSRF Token
        if (!empty($_POST['csrftoken'])) {
            if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
                $name=$_POST['name'];
                $email=$_POST['email'];
                $comment=$_POST['comment'];
                $postid=intval($_GET['nid']);
                $st1='0';
                $query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
                if($query):
                    echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
                    unset($_SESSION['token']);
                    else :
                        echo "<script>alert('Something went wrong. Please try again.');</script>";  
                endif;
            }
        }
    }
    $postid=intval($_GET['nid']);
    $sql = "SELECT viewCounter FROM tblposts WHERE id = '$postid'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["viewCounter"];
            $sql = "UPDATE tblposts SET viewCounter = $visits+1 WHERE id ='$postid'";
            $con->query($sql);
        }
    } else {
        echo "no results";
    } 
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include('pages/header.php'); ?>
</head>

<body>
   <header>
      <!-- Header Start -->
      <?php include('pages/topbar.php');?>
      <!-- Header End -->
  </header>
     
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
                <?php
                    $pid=intval($_GET['nid']);
                    $currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    $query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.viewCounter as viewcounter, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url,tblposts.postedBy,tblposts.lastUpdatedBy,tblposts.UpdationDate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
                    while ($row=mysqli_fetch_array($query)) { ?>
                    
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                  </div>
                  <div class="blog_details">
                     <h2><?php echo htmlentities($row['posttitle']);?></h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li> 
                            <i class="fa fa-user"></i> <?php echo htmlentities($row['postedBy']);?>
                        </li>
                        <li>
                            <i class="fa fa-calendar"></i> <?php $tgl = $row['postingdate'];echo date('d-M-Y', strtotime($tgl)); ?>
                                                
                        </li>
                        <li>
                            <a href="kategori.php?catid=<?php echo htmlentities($row['cid'])?>"><i class="fa fa-tag"></i> <?php echo htmlentities($row['category']);?>, <?php echo htmlentities($row['subcategory']);?></a>
                        </li>
                        <li>
                            <i class="fa fa-eye"></i> Dilihat <?php echo htmlentities($row['viewcounter']);?> 
                        </li>
                     </ul>
                     <p class="excert">
                        <?php $pt=$row['postdetails'];echo (substr($pt,0));?>
                     </p>

                     <div class="social-share pt-30">
                        <div class="section-tittle">
                           <h3 class="mr-20">Bagikan :</h3>
                           <ul>
                              <li>
                                 <a href="#" target="_blank"><img src="assets/img/news/icon-ins.png" alt=""></a>
                              </li>
                              <li>
                                 <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $currenturl;?>" target="_blank"><img src="assets/img/news/icon-fb.png" alt="Facebbok"></a>

                              </li>
                              <li>
                                 <a href="https://twitter.com/intent/tweet?text=<?php echo $currenturl;?>" target="_blank" data-size="large">
                                    <img src="assets/img/news/icon-tw.png" alt=""></a>
                              </li>
                              <li>
                                 <a href="whatsapp://send?text=<?php echo $currenturl;?>">
                                    <img src="assets/img/news/icon-wa.png" alt=""></a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>

               <?php } ?>
               
               
               <div class="comments-area">
                  <h4>Komentar</h4>
                  <?php 
                     $sts=1;
                     $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
                     while ($row=mysqli_fetch_array($query)) {
                  ?>
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="images/usericon.png" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 <?php echo htmlentities($row['comment']);?>
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#"><?php echo htmlentities($row['name']);?></a>
                                    </h5>
                                    <p class="date"><?php echo htmlentities($row['postingDate']);?> </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
               <div class="comment-form">
                  <h4>Kirim Komentar</h4>
                  <form name="Comment" method="post" class="form-contact mb-80">
                     <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="comment" cols="30" rows="9"
                                 placeholder="Tulis Komentar"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="name" type="text" placeholder="Nama">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="email"  type="email" placeholder="Email">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <button name="submit" type="submit" class="button btn_1 boxed-btn">Kirim</button>
                     </div>
                  </form>
               </div>
            </div>


            <div class="col-lg-4">
               <?php include('pages/rightbar-portal.php'); ?>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->
   <div id="fb-root"></div>
   
   
   <footer>
        <!-- Footer Start-->
        <?php include('pages/footer.php');?>
        <!-- Footer End-->
    </footer>
   
<!-- JS here -->
<?php include('pages/script.php');?>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v18.0" nonce="lJquNMUe"></script
</body>

</html>