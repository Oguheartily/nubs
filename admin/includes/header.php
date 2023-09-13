<?php

/** getting the filename from the url, used to detect the active tabs */
$current_page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
/** using a ternary operator: if current page = href. add alass active and primary color.  */
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="nubs-website">
    <meta name="author" content="Ogu Heartily Pasisi">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php
                                                        $getfavicon = getSiteFavicon();
                                                        if (mysqli_num_rows($getfavicon) > 0) {
                                                            $favicon = mysqli_fetch_array($getfavicon);
                                                            echo '../' . $favicon['site_icons'];
                                                        } else {
                                                        }
                                                        ?>">
    <link rel="icon" type="image/png" href="<?php
                                            $getfavicon = getSiteFavicon();
                                            if (mysqli_num_rows($getfavicon) > 0) {
                                                $favicon = mysqli_fetch_array($getfavicon);
                                                echo '../' . $favicon['site_icons'];
                                            } else {
                                            }
                                            ?>">
    <title>ADMIN</title>
    <!-- Bootstrap core CSS Offline -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons Online -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Bootstrap Online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Online alertify CSS file -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- online alertify Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <!-- offline Alertify css file -->
    <link rel="stylesheet" href="assets/alertifyjs/css/alertify.min.css" />
    <!-- offline alertify theme -->
    <link rel="stylesheet" href="assets/alertifyjs/css/themes/bootstrap.min.css" />
    <!-- font awesome 5 -->
    <link rel="stylesheet" href="../../fontawesome5/css/all.min.css">

    <!-- ED EDITOR CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

    <!-- Custom styles for this template -->
    <link href="assets/css/adminDashboard.css" rel="stylesheet">
    <!-- CSS -->
    <style type="text/css">
        .cke_textarea_inline {
            border: 1px solid black;
        }
    </style>
    <!-- CKEditor -->
    <script src="../excos/assets/ckeditor/ckeditor.js"></script>
</head>

<body>
    <!-- TOP NAVBAR -->
    <!-- sidebar -->
    <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" id="navHeader">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">
            <?php
            $getlogo = getSiteLogo();
            if (mysqli_num_rows($getlogo) > 0) {
                $logo = mysqli_fetch_array($getlogo);
            ?>
                <img src="../<?= $logo['site_icons']; ?>" width="60px" alt="<?= $logo['icon_name']; ?>">
            <?php
            } else {
                echo "<h2>NUBS</h2>";
            }
            ?>
        </a>
        <div class="position-relative">
            <!-- <a class="text-white px-3" href="admin_profile.php"><img src="image/profile-photo.jpg" width="30px" class="rounded-circle" alt=""></a> -->
            <button class="navbar-toggler text-white d-md-none collapsed outline-0 border-0 pt-1" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars outline-0 border-0"></span>
            </button>
        </div>
        <!-- Topbar Navbar -->
    </header>
    <!-- END TOP NAVBAR -->

    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= $current_page == "index.php" ? ' active' : ''; ?> " href="index.php">
                                <span class="fa fa-home me-2"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $current_page == "site-preview.php" ? ' active' : ''; ?> " href="site-preview.php">
                                <span class="fa fa-eye me-2"></span>
                                Site Preview
                            </a>
                        </li>
                        <!-- categories -->
                        <h6 class="sidebar-heading px-3 mt-2 mb-0 text-muted">Categories</h6>
                        <li class="nav-item">
                            <a href="category.php" class="nav-link <?= $current_page == "category.php" ? ' active' : ''; ?>"><span class="fa fa-list me-2"></span>All Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="add-category.php" class="nav-link <?= $current_page == "add-category.php" ? ' active' : ''; ?>"><span class="fa fa-plus me-2"></span>Add Category</a>
                        </li>
                        <!-- all posts -->
                        <h6 class="sidebar-heading px-3 mt-2 mb-0 text-muted">Posts</h6>
                        <li class="nav-item">
                            <a href="all-posts.php" class="nav-link <?= $current_page == "all-posts.php" ? ' active' : ''; ?>"><span class="fa fa-bullhorn me-2"></span></span>All Posts</a>
                        </li>
                        <li class="nav-item">
                            <a href="myPosts.php" class="nav-link <?= $current_page == "myPosts.php" ? ' active' : ''; ?>"><span class="fa fa-pen me-2"></span></span>My Posts</a>
                        </li>
                        <li class="nav-item">
                            <a href="add-event.php" class="nav-link <?= $current_page == "add-event.php" ? ' active' : ''; ?>"><span class="fa fa-plus me-2"></span>Add Post</a>
                        </li>
                        <hr class="my-0">
                        <!-- excos & members -->
                        <h6 class="sidebar-heading px-3 mt-2 mb-0 text-muted">EXCOS & MEMBERS</h6>
                        <li class="nav-item">
                            <a class="nav-link <?= $current_page == "all_excos.php" ? ' active' : ''; ?>" href="all_excos.php">
                                <span class="fa fa-user-friends me-2"></span>
                                All Excos
                            </a>
                        </li>
                        <li>
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link <?= $current_page == "excosApproved.php" ? ' active' : ''; ?>" href="excosApproved.php">
                                        <span class="fa fa-user-check me-2"></span>
                                        Current
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= $current_page == "excosAlumni.php" ? ' active' : ''; ?>" href="excosAlumni.php">
                                        <span class="fa fa-user-slash me-2"></span>
                                        Alumni
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?= $current_page == "all_members.php" ? ' active' : ''; ?>" href="all_members.php">
                                <span class="fas fa-users me-2"></span>
                                All Members
                            </a>
                        </li>
                    </ul>
                    <!-- account -->

                    <div>
                        <span class="btn collapsed fw-bold" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false"><span class="fas fa-user-circle"></span> Account </span>
                        <ul class="collapse" id="account-collapse">
                            <li class="nav-item"><a href="admin_profile.php" class="nav-link  <?= $current_page == "admin_profile.php" ? ' active' : ''; ?>"><span class="fa fa-user me-2"></span>Profile</a></li>
                            <li class="nav-item"><a href="../index.php" class="nav-link"><span class="fa fa-user-tag me-2"></span>As User</a></li>
                            <li class="nav-item"><a href="settings.php" class="nav-link"><span class="fa fa-cog me-2"></span>Settings</a></li>
                            <li class="nav-item"><a href="../logout.php" class="nav-link"><span class="fa fa-sign-out-alt me-2"></span>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- END SIDEBAR -->

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">