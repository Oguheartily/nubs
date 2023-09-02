<?php 
include('../middleware/excosAuthenticator.php');
include('includes/header.php');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Excos Dashboard</h1>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Content Row -->
  <div class="row">

  <!-- All products of a excos -->
  <div class="text-center pt-1">
        <h2 class="text-decoration-underline">All My Posts</h2>
        <div class="row ">
            <?php
            /**this isnt the best way but it works because user_id in excos verification
             * is same as id of the current excos in our users table.
             */
            $thisExcosId = $_SESSION['auth_user']['user_id'];
            $postsqry_run = mysqli_query($con, "SELECT * FROM `events_post` WHERE `user_id`='$thisExcosId' ");

            if (mysqli_num_rows($postsqry_run) > 0) {
                foreach ($postsqry_run as $postItem) {
            ?>
                    <!-- new product -->
                    <a href="#" class="card col-6 col-sm-4 col-sm-3 col-md-3 shadow-sm mb-3 pt-2">
                            <img src="../uploads/<?= $postItem['image']; ?>" alt="<?= $postItem['product_name']; ?>" class="w-100">
                        <div class="card-body text-center">
                            <div class="card-title"><?= $postItem['product_name']; ?></div>
                        </div>
                    </a>
                <?php
                }
            } else {
                ?>
                <h3>No Events or Articles from you.</h3>
            <?php
            }
            ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
<?php
include('includes/footer.php');
?>