<?php 
include('../middleware/adminAuthenticator.php');
/** excosfunction .php is already in adminware so we dont need to inclusde it here */
include_once('../config/dbcon.php');
include('includes/header.php');
?>

<div >
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>All My Posts</h4>
                </div>
                <div class="card-body table-responsive" id="myPosts_table">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Heading</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            /**select all posts that belong to the current Exco */
                            $query_run = getAllMyPosts();
                            // mysqli_fetch_assoc()

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $item) { ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['heading']; ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>">
                                        </td>
                                        <td><?= $item['status'] ? '<span class="btn btn-success btn-sm text-white fs-6 mx-1"><span class="fa fa-check"></span></span>' : '<span class="btn btn-warning btn-sm text-dark fs-6"><span class="fa fa-hourglass-half"></span></span>'; ?></td>
                                        <td><?= $item['created_date']; ?></td>
                                        <td><a href="edit-event.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-pen"></i></a></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger delete_mypost_btn" value="<?= $item['id']; ?>"><i class="fas fa-trash-alt"></i></button>
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