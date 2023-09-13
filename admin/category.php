<?php
include('../middleware/adminAuthenticator.php');
/**myfunction .php is already in adminware so we dont need to inclusde it here */
include('../config/dbcon.php');
include('includes/header.php');

?>

<div >
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger">
                    <h4>Categories</h4>
                </div>
                <div class="card-body table-responsive" id="category_table">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query_run = mysqli_query($con, "SELECT * FROM `event_categories`");
                            // mysqli_fetch_assoc()
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $item) { ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['post_category']; ?></td>
                                        <td><a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-pen"></i></a></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $item['id']; ?>"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "No records found";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>