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
    <meta name="description" content="multi-excos nubs-website">
    <meta name="author" content="Ogu Heartily Pasisi">
    <!-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"> -->
    <!-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> -->
    <title>EXCOS - Nubs-Bille</title>
    <!-- Bootstrap core CSS Offline -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons Online -->
    <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->

    <!-- Online alertify CSS file -->
    <!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" /> -->
    <!-- online alertify Bootstrap theme -->
    <!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" /> -->
    <!-- offline Alertify css file -->
    <link rel="stylesheet" href="assets/alertifyjs/css/alertify.min.css" />
    <!-- offline alertify theme -->
    <link rel="stylesheet" href="assets/alertifyjs/css/themes/bootstrap.min.css" />
    <!-- fontawesome 5 offline -->
    <link rel="stylesheet" href="../../fontawesome5/css/all.min.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/excosDashboard.css" rel="stylesheet">
    <!-- CSS -->
	<style type="text/css">
	.cke_textarea_inline{
		border: 1px solid black;
	}
	</style>
    <!-- CKEditor -->	
	<script src="assets/ckeditor/ckeditor.js" ></script>
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
            <?php 
            if (isset($_SESSION['auth'])) {
            $id = $_SESSION['auth_user']['user_id'];
                $usersV_qry_run = mysqli_query($con,"SELECT user_image FROM users WHERE id='$id' ");
                $usersV_data = mysqli_fetch_array($usersV_qry_run);
            }
                ?>
            <a class="text-white px-3" href="excos_profile.php"><img src="../images/userDP/<?= $usersV_data['user_image']; ?>" width="40px" class="rounded-circle" alt=""></a>
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
                        <!-- cashflow -->
                        <h6 class="sidebar-heading px-3 mt-2 mb-1 text-muted">Cashflow</h6>
                        <li class="nav-item">
                            <a href="cashflow.php" class="nav-link <?= $current_page == "cashflow.php" ? ' active' : ''; ?>"><span class="fas fa-dollar-sign me-2"></span> My Cashflow</a>
                        </li>
                        <li class="nav-item">
                            <a href="site-preview.php" class="nav-link <?= $current_page == "site-preview.php" ? ' active' : ''; ?>"><span class="fas fa-eye me-2"></span> Site-preview</a>
                        </li>
                        <!-- eventposts -->
                        <h6 class="sidebar-heading px-3 mt-2 mb-1 text-muted">News / Events</h6>
                        <li class="nav-item">
                            <a href="my-posts.php" class="nav-link <?= $current_page == "my-posts.php" ? ' active' : ''; ?>"><span class="fa fa-pen me-2"></span></span> Edit Posts</a>
                        </li>
                        <li class="nav-item">
                            <a href="add-event.php" class="nav-link <?= $current_page == "add-event.php" ? ' active' : ''; ?>"><span class="fa fa-plus me-2"></span>Add Posts</a>
                        </li>
                        <li class="nav-item">
                            <a href="excos_profile.php" class="nav-link <?= $current_page == "excos_profile.php" ? ' active' : ''; ?>"><span class="fa fa-user me-2"></span>Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link"><span class="fa fa-user-tag me-2"></span>As User</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><span class="fa fa-cog me-2"></span>Settings</a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link"><span class="fa fa-sign-out-alt me-2"></span>Logout</a>
                        </li>
                    </ul>
                    <hr>
                    <!-- account -->
                    <ul class="list-unstyled">
                    </ul>
                </div>
            </nav>
            <!-- END SIDEBAR -->

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">