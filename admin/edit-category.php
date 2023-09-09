<?php

include('../middleware/adminAuthenticator.php');
/**myfunction .php is already in adminware so we dont need to inclusde it here */
include_once('../config/dbcon.php');
include('includes/header.php');

?>

<div >
    <div class="row mt-4">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                /**store id in variable for use */
                $catId = $_GET['id'];
                $query_id_run = mysqli_query($con, "SELECT * FROM `event_categories` WHERE id='$catId' ");
                if (mysqli_num_rows($query_id_run) > 0) {
                    /**fetch each data related to the given id */
                    $data = mysqli_fetch_assoc($query_id_run)
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category
                                <a href="category.php" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>
                        <div><?php if (isset($_SESSION['message'])) { ?>
                                <div class="alert alert-info text-white alert-dismissible fade show" role="alert">
                                    <?= $_SESSION['message']; ?>
                                    <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="close"></button>
                                </div>
                            <?php unset($_SESSION['message']);
                                } ?>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <input type="hidden" name="category_id" value="<?= $data['id']; ?>">
                                        <label class="text-bold">Category Name</label>
                                        <input type="text" name="categoryname" value="<?= $data['post_category']; ?>" placeholder="Enter category name" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Category Not found";
                }
            } else {
                echo "id missing from url";
            }
            ?>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>