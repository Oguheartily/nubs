<?php
include('../middleware/excosAuthenticator.php');
include('includes/header.php');
?>

<div class="">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php
            /**if id is set in url, which is gotten when you clicked edit button */
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query_id_run = mysqli_query($con, "SELECT * FROM `events_post` WHERE `id`='$id' ");
                /* */
                if (mysqli_num_rows($query_id_run) > 0) {
                    /**if id is correct and data exists in products table */
                    $data = mysqli_fetch_array($query_id_run);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Post
                                <span class="btn btn-primary float-end" onclick="history.go(-1);"><span class="fa fa-reply"></span><span class="d-none d-sm-inline">&nbsp;Back</span></span>
                            </h4>
                        </div>
                        <div><?php if (isset($_SESSION['message'])) { ?>
                                <div class="alert alert-dark text-white alert-dismissible fade show" role="alert">
                                    <?= $_SESSION['message']; ?>
                                    <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="close"></button>
                                </div>
                            <?php unset($_SESSION['message']);
                                } ?>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12"><input type="hidden" name="product_id" value="<?= $data['id']; ?>"></div>
                                    <div class="align-items-center mt-4">
                                        <label class="text-bold mb-0">Status</label>
                                        <input type="checkbox" name="status" <?= $data['status'] ? "checked" : ""; ?>>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="text-bold mb-0">Select Category</label>
                                        <select name="category_id" class="form-select form-control">
                                            <option selected>Select Category</option>
                                            <?php
                                            $query_get_all__run = mysqli_query($con, "SELECT * FROM `event_categories` ");
                                            /**check if category is empty */
                                            if (mysqli_num_rows($query_get_all__run) > 0) {
                                                foreach ($query_get_all__run as $item) {
                                            ?>
                                                    <option value="<?= $item['id']; ?>" <?= $data['post_category_id'] == $item['id'] ? 'selected' : ''; ?>><?= $item['post_category']; ?></option>
                                            <?php
                                                    /**$data['post_category_id'] == $item['id'] ? 'selected':''; this line means that if the category id matches the product query id, 
                                                     * make that item the selected option in the selection field. */
                                                }
                                            } else {
                                                echo "No Category Available";
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label class="text-bold mb-0">Heading</label>
                                        <input type="text" name="heading" placeholder="Enter product name" class="form-control" required>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label class="text-bold mb-0">Upload Image</label>
                                        <input type="file" name="image" placeholder="Enter Upload Image" class="form-control">
                                        <label class="text-bold">Current image in database: </label>
                                        <input type="hidden" name="old_product_image" value="<?= $data['image']; ?>">
                                        <img src="../uploads/<?= $data['image']; ?>" width="100px" height="100px" class="my-2"><span><?= $data['image']; ?></span>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label class="text-bold mb-0">Description</label>
                                        <textarea name="content" placeholder="Content goes here..." class="form-control" rows="3" required></textarea>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <button type="submit" class="btn btn-primary" name="update_post_btn">UPDATE POST</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Product not Found for given ID";
                }
            } else {
                echo "ID missing from url";
            }

            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>