<?php
include("functions/userfunctions.php");
include('includes/header.php');

if (isset($_GET['year'])) {
    $getServiceYear = $_GET['year'];

    /**this isnt the best way but it works because user_id in excos verification
     * is same as id of the current excos in our users table.
     */
    $vewPost = getExcosOfServiceYear($getServiceYear);
?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-2 mb-3 border-bottom">
        <h1>All Excos of Year <?= $getServiceYear ;?></h1>
        <span class="btn btn-warning " onclick="history.go(-1);"><span class="fa fa-reply"></span><span class="d-none d-sm-inline">&nbsp;Back</span></span>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <!-- All eventposts of a excos -->
            <div class="text-center pt-1">
                <div class="row p-1">
                    <?php

                    if (mysqli_num_rows($vewPost) > 0) {
                        foreach ($vewPost as $postItem) {
                    ?>
                            <!-- new eventpost -->
                            <div class="card col-12 shadow-sm mb-3 pt-1">
                                <div class="row">
                                    <div class="col-sm-5 col-md-4 col-lg-2 p-2 pt-1">
                                        <img src="uploads/<?= $postItem['image']; ?>" alt="<?= $postItem['image']; ?>" style="width: 100%">
                                    </div>
                                    <div class="col-sm-7 col-md-8 col-lg-10">
                                        <div ><?= $postItem['heading']; ?></div>
                                        <div >
                                            <div class="fw-bold">Category:
                                                <?php
                                                /**style the icon for each category */
                                                if ($postItem['post_category'] == "news") {
                                                    echo '<span class="text-primary"><span class="fas fa-newspaper"></span></span>';
                                                } else if ($postItem['post_category'] == "event") {
                                                    echo '<span class="text-success"><span class="fas fa-calendar-alt"></span></span>';
                                                } else if ($postItem['post_category'] == "reminder") {
                                                    echo '<span class="text-danger"><span class="fas fa-bell"></span></span>';
                                                } else if ($postItem['post_category'] == "general info") {
                                                    echo '<span class="text-info"><span class="fas fa-bullhorn"></span></span>';
                                                }
                                                ?>
                                                <?= $postItem['post_category']; ?> | Published on: <?= $postItem['created_date']; ?></div>
                                            <div><?= $postItem['content']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <h3>No Excos for the Chosen Year.</h3>
                <?php
                    }
                } else {
                    echo "ID is not set, hence no data to display";
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