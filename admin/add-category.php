<?php
include('../middleware/adminAuthenticator.php');
include('includes/header.php');
?>

<div >
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>Add Category</h4>
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
                    <form action="code.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="text-bold">Category Name</label>
                                <input type="text" name="categoryname" placeholder="Enter category name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Slug</label>
                                <input type="text" name="slug" placeholder="Enter slug" class="form-control">
                            </div>
                            <div class="col-md-12 mt-4">
                                <label class="text-bold">Description</label>
                                <textarea name="description" placeholder="Enter description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-12 mt-4">
                                <label class="text-bold">Upload Image</label>
                                <input type="file" name="image" placeholder="Enter Upload Image" class="form-control">
                            </div>
                            <div class="col-md-12 mt-4">
                                <label class="text-bold">Meta Title</label>
                                <input type="text" name="meta_title" placeholder="Enter meta title" class="form-control">
                            </div>
                            <div class="col-md-12 mt-4">
                                <label class="text-bold">Meta Description</label>
                                <textarea name="meta_description" placeholder="Enter meta description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-12 mt-4">
                                <label class="text-bold">Meta Keywords</label>
                                <textarea name="meta_keywords" placeholder="Enter meta keywords" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label class="text-bold">Status</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-6 mt-4">
                                <label class="text-bold">Popular</label>
                                <input type="checkbox" name="popular">
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>