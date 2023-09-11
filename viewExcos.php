<?php
include("functions/userfunctions.php");
include('includes/header.php');

if (isset($_GET['year'])) {
    $getServiceYear = $_GET['year'];

    /**this isnt the best way but it works because user_id in excos verification
     * is same as id of the current excos in our users table.
     */
    $vewExcos = getExcosOfServiceYear($getServiceYear);
?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-2 mb-3 border-bottom">
        <h1>All Excos of Year <?= $getServiceYear; ?></h1>
        <span class="btn btn-warning " onclick="history.go(-1);"><span class="fa fa-reply"></span><span class="d-none d-sm-inline">&nbsp;Back</span></span>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <!-- All excos -->
            <div class="text-center pt-1">
                <div class="row">
                    <?php

                    if (mysqli_num_rows($vewExcos) > 0) {
                        foreach ($vewExcos as $eachExco) {
                    ?>
                            <!-- new  -->
                            <div class="card p-1 pb-1 col-6 col-md-4 col-lg-2 mb-2 shadow-sm">
                                <img src="images/userDP/<?= $eachExco['user_image']; ?>" alt="<?= $eachExco['user_image']; ?>" class="w-100">
                                <div class="fw-bold text-capitalize word-wrap"><?= $eachExco['first_name'] . " " . $eachExco['last_name']; ?></div>
                                <div class="text-success"><?= $eachExco['current_position']; ?></div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <h3>No Excos for the Chosen Year.</h3>
                    <?php
                        }
                    } else {
                        echo "<h6>Incorrect year, go back to previous page and click on a year.</h6>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <?php
    include('includes/footer.php');
    ?>