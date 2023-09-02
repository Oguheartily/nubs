<?php 
include('../middleware/excosAuthenticator.php');
/** vendorfunction .php is already in adminware so we dont need to inclusde it here */
include_once('../config/dbcon.php');
include('includes/header.php');
$id = returnVendorId();
?>

<div class="">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>All My Posts</h4>
                </div>
                <div class="card-body table-responsive" id="products_table">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Heading</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            /**select all posts that belong to the current Exco */
                            $query_run = mysqli_query($con, "SELECT * FROM `events_post` WHERE `user_id`='$id' ");
                            // mysqli_fetch_assoc()

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $item) { ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['heading']; ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>">
                                        </td>
                                        <td><?= $item['status'] ? "Approved" : "Hidden"; ?></td>
                                        <td><?= $item['created_date']; ?></td>
                                        <td><a href="edit-event.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-info">Edit</a></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['id']; ?>">Delete</button>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                ?>
                                <tr><td colspan="7">No records found</td></tr>
                                <?php
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