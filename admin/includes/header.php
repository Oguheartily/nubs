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
    <meta name="description" content="e-commerce">
    <meta name="author" content="Ogu Heartily Pasisi">
    <!-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"> -->
    <!-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> -->
    <title>ADMIN</title>
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

    <link rel="stylesheet" href="../../fontawesome5/css/all.min.css">



    <!-- Custom styles for this template -->
    <link href="assets/css/adminDashboard.css" rel="stylesheet">
</head>

<body>
    <!-- TOP NAVBAR -->
    <!-- sidebar -->
    <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" id="navHeader">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">
            <img src="../logo-black.png" width="60px" alt="">
        </a>
        <div class="position-relative">
            <!-- <a class="text-white px-3" href="admin-profile.php"><img src="image/profile-photo.jpg" width="30px" class="rounded-circle" alt=""></a> -->
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
                        <!-- categories -->
                        <h6 class="sidebar-heading px-3 mt-2 mb-0 text-muted">Categories</h6>
                        <li class="nav-item">
                            <a href="category.php" class="nav-link <?= $current_page == "category.php" ? ' active' : ''; ?>"><span class="fa fa-list me-2"></span>All Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="add-category.php" class="nav-link <?= $current_page == "add-category.php" ? ' active' : ''; ?>"><span class="fa fa-plus me-2"></span>Add Category</a>
                        </li>
                        <!-- products -->
                        <h6 class="sidebar-heading px-3 mt-2 mb-0 text-muted">Products</h6>
                        <li class="nav-item">
                            <a href="products.php" class="nav-link <?= $current_page == "products.php" ? ' active' : ''; ?>"><span class="fa fa-shopping-cart me-2"></span></span>All Products</a>
                        </li>
                        <li class="nav-item">
                            <a href="add-product.php" class="nav-link <?= $current_page == "add-product.php" ? ' active' : ''; ?>"><span class="fa fa-plus me-2"></span>Add Product</a>
                        </li>
                        <!-- orders -->
                        <h6 class="sidebar-heading px-3 mt-2 mb-0 text-muted">Orders</h6>
                        <li class="nav-item">
                            <a href="orders.php" class="nav-link <?= $current_page == "orders.php" ? ' active' : ''; ?>"><span class="fas fa-truck me-2"></span></span>Orders</a>
                        </li>
                        <!-- excos & customers -->
                        <hr class="my-1">
                        <li class="nav-item">
                            <a class="nav-link <?= $current_page == "excos.php" ? ' active' : ''; ?>" href="excos.php">
                                <span class="fa fa-user-friends me-2"></span>
                                All Excos
                            </a>
                        </li>
                        <li>
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link <?= $current_page == "excosApproved.php" ? ' active' : ''; ?>" href="excosApproved.php">
                                        <span class="fa fa-user-check me-2"></span>
                                        Approved
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= $current_page == "excosUnapproved.php" ? ' active' : ''; ?>" href="excosUnapproved.php">
                                        <span class="fa fa-user-slash me-2"></span>
                                        Unapproved
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= $current_page == "excos-withdrawals.php" ? ' active' : ''; ?>" href="excos-withdrawals.php">
                                        <span class="fa fa-dollar-sign me-2"></span>
                                        Withdrawals
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= $current_page == "add-excos.php" ? ' active' : ''; ?>" href="add-excos.php">
                                        <span class="fa fa-user-plus me-2"></span>
                                        Add Excos
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?= $current_page == "all-customers.php" ? ' active' : ''; ?>" href="all-customers.php">
                                <span class="fas fa-users me-2"></span>
                                Customers
                            </a>
                        </li>
                    </ul>
                    <!-- account -->
                    
                    <div class="">
                    <span class="btn collapsed fw-bold" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false"><span class="fas fa-user-circle"></span> Account </span>
                    <ul class="collapse" id="account-collapse">
                        <li class="nav-item"><a href="admin-profile.php" class="nav-link  <?= $current_page == "admin-profile.php" ? ' active' : ''; ?>"><span class="fa fa-user me-2"></span>Profile</a></li>
                        <li class="nav-item"><a href="../index.php" class="nav-link"><span class="fa fa-user-tag me-2"></span>As User</a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><span class="fa fa-cog me-2"></span>Settings</a></li>
                        <li class="nav-item"><a href="../logout.php" class="nav-link"><span class="fa fa-sign-out-alt me-2"></span>Logout</a></li>
                    </ul>
                    </div>
                    <!-- <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">
                                <span class="fas fa-user-circle"></span>
                                View as User
                            </a>
                        </li>
                    </ul> -->
                </div>
                <!-- end row -->
                <!-- <div class="nav-item logoutLi">
                    <a href="../logout.php" class="nav-link bg-danger logoutanchor">
                        <span class="fa fa-sign-out-alt"></span>
                        Logout
                    </a>
                </div> -->
            </nav>
            <!-- END SIDEBAR -->

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">