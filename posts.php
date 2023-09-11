<?php
include("functions/userfunctions.php");
include("includes/header.php");
?>

<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center">All Information</h4>
            <hr>
        </div>
        <?php
        /** get all posts which are marked as important, ie status as 
         */
        $allPosts = getAllPosts();
        if (mysqli_num_rows($allPosts) > 0) {
            foreach ($allPosts as $postItem) {
        ?>
                <!-- new eventpost -->
                <div class="card col-12 shadow-sm mb-3 pt-1">
                    <div class="row">
                        <div class="col-4 col-md-3 p-2 pt-1">
                            <img src="uploads/<?= $postItem['image']; ?>" alt="<?= $postItem['image']; ?>" style="width: 100%">
                        </div>
                        <div class="col-8 col-md-9">
                            <div><?= $postItem['heading']; ?></div>
                            <div>
                                <div class="fw-bold">Category:
                                    <?php
                                    /**style the icon for each category */
                                    if ($postItem['post_category'] == "news") {
                                        echo '<span class="text-primary"><span class="fas fa-newspaper"></span></span>';
                                    } else if ($postItem['post_category'] == "event") {
                                        echo '<span class="text-success"><span class="fas fa-calendar-alt"></span></span>';
                                    } else if ($postItem['post_category'] == "reminder") {
                                        echo '<span class="text-danger"><span class="fas fa-bell"></span></span>';
                                    } else if ($postItem['post_category'] == "general-info") {
                                        echo '<span class="text-info"><span class="fas fa-bullhorn"></span></span>';
                                    }
                                    ?>
                                    <?= $postItem['post_category']; ?> | Published on: <?= $postItem['created_date']; ?></div>
                                <div>
                                    <?=
                                    /**import readmore function */
                                    $readMore = readMoreFunction($postItem['content'], "postViewer.php", "post_id", $postItem['id']);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <h3>No Events or Articles from yet.</h3>
        <?php
        }
        ?>
    </div>
</div>


<!-- footer-->
<?php include("includes/footer.php"); ?>
<!-- end footer -->