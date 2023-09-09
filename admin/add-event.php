<?php

include('../middleware/adminAuthenticator.php');
include('includes/header.php');
/**get the current excos id, code is in excos functions */
$id = returnExcosId();
?>

<div >
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-PRIMARY text-dark">
                    <h4>ADD POST</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-bold mb-0">Select Category</label>
                                <select name="category_id" class="form-select form-control">
                                    <option selected>Select Category</option>
                                    <?php 
                                    $query_run = mysqli_query($con, "SELECT * FROM `event_categories` ");
                                    /**check if category is empty */
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $item) {
                                    ?>
                                            <option value="<?= $item['id']; ?>"><?= $item['post_category']; ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No Category Available";
                                    }
                                    ?>
                                </select>
                            </div>
                                <input type="hidden" name="userId" value="<?= $id;?>" class="form-control">
                            <div class="col-md-12 mt-4">
                                <label class="text-bold mb-0">Heading</label>
                                <textarea name="post_heading" id="post_heading" cols="30" style="border: 1px solid black;" rows="10"></textarea>
                                <!-- <textarea name="" id="" placeholder="Enter title here..."  required></textarea> -->
                            </div>
                            <div class="col-md-12 mt-4">
                                <label class="text-bold mb-0">Upload Image</label>
                                <input type="file" name="image" placeholder="Upload Image" class="form-control" required>
                            </div>
                            
                            <div class="col-md-12 mt-4">
                                <label class="text-bold mb-0">Description</label>
                                <textarea name="post_content" id="post_content" placeholder="Content goes here..." class="form-control" rows="3" ></textarea>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="btn btn-primary" name="add_post_btn">ADD POST</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>