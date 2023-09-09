<?php
include('../middleware/adminAuthenticator.php');
/**myfunction .php is already in adminware so we dont need to inclusde it here */
include_once('../config/dbcon.php');
include('includes/header.php');


/**check if user id is set before loading page, its gotten from the url */
if (isset($_GET['id'])) {
    $memberId = $_GET['id'];
    /**now we check if that user id exist in our database */
    $memberData = checkMemberIdValidity($memberId);
    /**if there is no record of such tracking id in db, show error msg, else do nothing & continue with page load */
    if (mysqli_num_rows($memberData) < 0) {
?>
        <h4>Something went wrong!</h4>
    <?php
        die();
        /**if something went wrong, kill the page */
    }
} else {
    ?>
    <h4>Something went wrong!</h4>
<?php
    die();
    /**if something went wrong, kill the page */
}
/**if nothing went wrong, get the array of data and put each single row in the $data variable*/
$cdata = mysqli_fetch_array($memberData);
?>

<div >
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mt-2">
                <div class="card-header pb-1 bg-primary">
                    <span class="fs-4 text-white"><?= $cdata['user_name']; ?> Bio</span>
                    <span class="btn btn-warning float-end shadow-sm" onclick="history.go(-1);"><i class="fa fa-reply"></i><span class="d-none d-sm-inline">&nbsp;Back</span></span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <hr>
                        <div class="row">
                            <!-- new col -->
                            <div class="col-6 col-md-5">
                                <img src="../images/userDP/<?= $profile_data['user_image']; ?>" class="w-100" alt="">
                            </div>
                            <div class="col-6 col-md-5">
                                <img src="../images/nubsIDCard/<?= $profile_data['nubs_id_card']; ?>" class="w-100" alt="">
                            </div>
                            <!-- new col -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">First Name</label>
                                <div class="border p-1">
                                    <?= $cdata['first_name']; ?>
                                </div>
                            </div>
                            <!-- new col -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Last Name</label>
                                <div class="border p-1">
                                    <?= $cdata['last_name']; ?>
                                </div>
                            </div>
                            <!-- new col -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Username</label>
                                <div class="border p-1">
                                    <?= $cdata['user_name']; ?>
                                </div>
                            </div>
                            <!-- new col -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Gender</label>
                                <div class="border p-1">
                                    <?= $cdata['gender']; ?>
                                </div>
                            </div>
                            <!-- new col -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Email</label>
                                <div class="border p-1">
                                    <?= $cdata['e_mail']; ?>
                                </div>
                            </div>
                            <!-- new col -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Phone Number</label>
                                <div class="border p-1">
                                    <?= $cdata['phone_number']; ?>
                                </div>
                            </div>
                            <!-- new col -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Compound</label>
                                <div class="border p-1">
                                    <?= $cdata['compound']; ?>
                                </div>
                            </div>
                            <!-- new col -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Current Post</label>
                                <div class="border p-1">
                                    <?= $cdata['current_position']; ?>
                                </div>
                            </div>
                            <!-- new col -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">School</label>
                                <div class="border p-1">
                                    <?= $cdata['school']; ?>
                                </div>
                            </div>
                            <!-- new col -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">State Of Schooling</label>
                                <div class="border p-1">
                                    <?= $cdata['state_of_schooling']; ?>
                                </div>
                            </div>
                            <!-- new col -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">User Address</label>
                                <div class="border p-1">
                                    <?= $cdata['user_address']; ?>
                                </div>
                            </div>
                            <!-- new col -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Date of Registration</label>
                                <div class="border p-1">
                                    <?= $cdata['created_date']; ?>
                                </div>
                            </div>
                        </div>

                        <!-- new col -->
                        <div class="row my-2">
                            <div class="col-6">
                                <label for="">Active Status : </label>
                                <span class="ms-3">
                                    <?php
                                    if ($cdata['role_as'] == 9) {
                                        echo "<span class='fw-bold text-danger'>Suspended Account</span>";
                                    } else if ($cdata['role_as'] == 0 || $cdata['role_as'] == 2) {
                                        echo "<span class='fw-bold text-success'>Approved</span>";
                                    } else {
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="col-6">
                                <label for="">Role : </label>
                                <span class="ms-3">
                                    <?php
                                    if ($cdata['status'] == 0) {
                                        echo "<span class='fw-bold text-danger'>" . $cdata['current_position'] . "</span>";
                                    } else if ($cdata['status'] == 2) {
                                        echo "<span class='fw-bold text-success'>" . $cdata['current_position'] . "</span>";
                                    } else if ($cdata['status'] == 3) {
                                        echo "<span class='fw-bold text-success'>" . $cdata['current_position'] . "</span>";
                                    } else {
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <hr>
                        <!-- new col -->
                        <div class="col-md-12">
                            <!-- role_as -->
                            <div class="border p-1 mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="fw-bold">Suspend / Unsuspend :</label>
                                    </div>
                                    <!-- FORM -->
                                    <form action="code.php" method="post" class="col-md-8">
                                        <input type="hidden" name="userId" value="<?= $cdata['id']; ?>">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <span>
                                                    <select name="member_new_role_as" class="form-select py-0">
                                                        <option value="0" <?= $cdata['role_as'] == 0 ? "selected" : ""; ?>>Approve User</option>
                                                        <option value="9" <?= $cdata['role_as'] == 9 ? "selected" : ""; ?>>Suspend User</option>
                                                    </select>
                                                </span>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" name="suspendMemberBtn" class="btn btn-sm btn-primary">Update Status</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end status -->
                        </div>
                        <!-- new col -->
                        <div class="col-md-12">
                            <!-- role_as -->
                            <div class="border p-1 mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="fw-bold">Change Role :</label>
                                    </div>
                                    <!-- FORM -->
                                    <form action="code.php" method="post" class="col-md-8">
                                        <input type="hidden" name="userId" value="<?= $cdata['id']; ?>">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <span>
                                                    <select name="member_new_role_as" class="form-select py-0">
                                                        <option value="0" <?= $cdata['role_as'] == 0 ? "selected" : ""; ?>>Change to Current Exco</option>
                                                        <option value="2" <?= $cdata['role_as'] == 2 ? "selected" : ""; ?>>Change to User</option>
                                                        <option value="3" <?= $cdata['status'] == 3 ? "selected" : ""; ?>>Change to Alumni Exco</option>
                                                    </select>
                                                </span>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" name="updateMemberRoleAsBtn" class="btn btn-sm btn-primary">Update Status</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end status -->
                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
        </div>
    </div>
</div>

<!-- footer-->
<?php include("includes/footer.php"); ?>
<!-- end footer -->