<?php
include('../middleware/adminAuthenticator.php');
include('includes/header.php');

$pending = mysqli_num_rows(getAllPendingPosts());
$totalRegUsers = mysqli_num_rows(getAllUsers());
$totalexcos = mysqli_num_rows(getAllCurrentExcos()) + 2;
$totalAlumniExcos = mysqli_num_rows(getAllAlumniExcos());
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">ADMIN DASHBOARD</h1>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Content Row -->
  <div class="row">
    <!-- Earnings Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                ALL Nubites</div>
              <div class="h5 mb-0 fw-bold text-gray-800">
                <?=
                /**number_format(number,decimals,decimalpoint,separator) */
                number_format($totalRegUsers, 0, '.', ','); ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs fw-bold text-success text-uppercase mb-1">
                Current Excos</div>
              <div class="h5 mb-0 fw-bold text-gray-800">
                <?=
                /**number_format(number,decimals,decimalpoint,separator) */
                number_format($totalexcos, 0, '.', ','); ?>
              </div>
            </div>
            <div class="col-auto">
              <span class="fas fa-users-cog fw-bold fs-1 text-gray-300"></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs fw-bold text-info text-uppercase mb-1">Total Alumni Excos
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 fw-bold text-gray-800">
                    <?=
                    /**number_format(number,decimals,decimalpoint,separator) */
                    number_format($totalAlumniExcos, 0, '.', ','); ?></div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-friends fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                Pending Posts</div>
              <div class="h5 mb-0 fw-bold text-gray-800"><?= $pending; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
                  } else if ($postItem['post_category'] == "general info") {
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
      echo "<h3>No Events or Articles from you.</h3>";
    }
    ?>
  </div>
  <!-- /.container-fluid -->
  <?php
  include('includes/footer.php');
  ?>