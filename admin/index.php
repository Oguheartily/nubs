<?php
include('../middleware/adminAuthenticator.php');
include('includes/header.php');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">ADMIN DASHBOARD</h1>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Content Row -->
  <div class="row ">
    <?php
    /**this isnt the best way but it works because user_id in excos verification
     * is same as id of the current excos in our users table.
     */
    $thisExcosId = $_SESSION['auth_user']['user_id'];
    $postsqry_run = mysqli_query($con, "SELECT ec.post_category, ep.* FROM events_post ep, event_categories ec WHERE ep.user_id='$thisExcosId' AND ep.post_category_id=ec.id ");

    if (mysqli_num_rows($postsqry_run) > 0) {
      foreach ($postsqry_run as $postItem) {
    ?>
        <!-- new eventpost -->
        <div class="card col-12 shadow-sm mb-3 pt-1">
          <div class="row">
            <div class="col-4 col-md-3 p-2 pt-1">
              <img src="../uploads/<?= $postItem['image']; ?>" alt="<?= $postItem['image']; ?>" class="post_img">
            </div>
            <div class="col-8 col-md-9">
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
                <div><?=
                      /**import readmore function */
                      $readMore = readMoreFunction($postItem['content'], "postViewer.php", "post_id", $postItem['id']);
                      ?></div>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
    } else {
      ?>
      <h3>No Events or Articles from you.</h3>
    <?php
    }
    ?>
  </div>
  <!-- /.container-fluid -->

  <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
<?php
include('includes/footer.php');
?>