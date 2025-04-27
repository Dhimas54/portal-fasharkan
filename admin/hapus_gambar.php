<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  // Code for Forever deletionparmdel
  if ($_GET['presid']) {
    $id = intval($_GET['presid']);

    // Ambil nama file gambar dari database
    $getImg = mysqli_query($con, "SELECT gambar_url FROM tblimage WHERE id='$id'");
    $imgData = mysqli_fetch_assoc($getImg);
    $filePath = "postgambar/" . $imgData['gambar_url'];

    // Hapus file dari folder jika ada
    if (file_exists($filePath)) {
      unlink($filePath);
    }

    // Hapus data dari database
    $query = mysqli_query($con, "delete from  tblimage  where id='$id'");
    $delmsg = "Gambar deleted forever";
  }
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App title -->
    <title>Hapus Gambar</title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">

    <!-- jvectormap -->
    <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>
  </head>

  <body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">

      <!-- Top Bar Start -->
      <?php include('includes/topheader.php'); ?>

      <!-- ========== Left Sidebar Start ========== -->
      <?php include('includes/leftsidebar.php'); ?>
      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="page-title-box">
                  <h4 class="page-title">Hapus Gambar</h4>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <!-- end row -->

            <div class="row">
              <div class="col-sm-6">
                <?php if ($delmsg) { ?>
                  <div class="alert alert-danger" role="alert">
                    <strong>Oh snap!</strong> <?php echo htmlentities($delmsg); ?>
                  </div>
                <?php } ?>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box">


                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Preview</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query = mysqli_query($con, "SELECT id, judul, gambar_url FROM tblimage");
                          while ($row = mysqli_fetch_assoc($query)) {
                          ?>
                            <tr>
                              <td>
                                <img src="postgambar/<?php echo htmlentities($row['gambar_url']); ?>" width="100" />
                              </td>
                              <td><?php echo htmlentities($row['judul']); ?></td>
                              <td>
                                <a href="hapus_gambar.php?presid=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus gambar ini?')">
                                  <i class="fa fa-trash" style="color:red"></i> Hapus
                                </a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>




            </div> <!-- container -->

          </div> <!-- content -->

          <?php include('includes/footer.php'); ?>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


      </div>
      <!-- END wrapper -->



      <script>
        var resizefunc = [];
      </script>

      <!-- jQuery  -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/detect.js"></script>
      <script src="assets/js/fastclick.js"></script>
      <script src="assets/js/jquery.blockUI.js"></script>
      <script src="assets/js/waves.js"></script>
      <script src="assets/js/jquery.slimscroll.js"></script>
      <script src="assets/js/jquery.scrollTo.min.js"></script>
      <script src="../plugins/switchery/switchery.min.js"></script>

      <!-- CounterUp  -->
      <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
      <script src="../plugins/counterup/jquery.counterup.min.js"></script>

      <!--Morris Chart-->
      <script src="../plugins/morris/morris.min.js"></script>
      <script src="../plugins/raphael/raphael-min.js"></script>

      <!-- Load page level scripts-->
      <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
      <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <script src="../plugins/jvectormap/gdp-data.js"></script>
      <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


      <!-- Dashboard Init js -->
      <script src="assets/pages/jquery.blog-dashboard.js"></script>

      <!-- App js -->
      <script src="assets/js/jquery.core.js"></script>
      <script src="assets/js/jquery.app.js"></script>

  </body>

  </html>
<?php } ?>