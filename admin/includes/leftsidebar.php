            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Navigasi</li>

                            <li class="has_sub">
                                <a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>

                            <?php if ($_SESSION['utype'] == '1'): ?>
                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Sub-admin </span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="add-subadmins.php">Tambah admin</a></li>
                                        <li><a href="manage-subadmins.php">Kelola admin</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Kategori </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add-category.php">Tambah Kategori</a></li>
                                    <li><a href="manage-categories.php">Kelola Kategori</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span>Sub Kategori </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add-subcategory.php">Tambah Sub Kategori</a></li>
                                    <li><a href="manage-subcategories.php">Kelola Sub Kategori</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Posting(Berita) </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add-post.php">Tambah Berita</a></li>
                                    <li><a href="manage-posts.php">Kelola Berita</a></li>
                                    <li><a href="trash-posts.php">Hapus Berita</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Posting(gambar) </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="post_gambar.php">Tambah gambar</a></li>
                                    <li><a href="manage-gambar.php">Kelola gambar</a></li>
                                    <li><a href="trash-gambar.php">Hapus gambar</a></li>
                                </ul>
                            </li>


                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Halaman </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="aboutus.php">Tentang</a></li>
                                    <li><a href="contactus.php">Kontak</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Komentar </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="unapprove-comment.php">Menunggu Disetujui </a></li>
                                    <li><a href="manage-comments.php">Komentar Disetujui</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Kotak Saran </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="vote.php">Vote </a></li>
                                    <li><a href="manage-kotaksaran.php">Kotak Saran</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                    <div class="help-box">
                        <h5 class="text-muted m-t-0"></h5>
                        <!-- <p class=""><span class="text-custom">Email:</span> <br/> phpgurukulofficial@gmail.com</p> -->
                    </div>

                </div>
                <!-- Sidebar -left -->

            </div>