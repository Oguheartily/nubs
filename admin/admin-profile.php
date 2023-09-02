<?php

include('../middleware/adminAuthenticator.php');
include('includes/header.php');
?>

<div class="">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php
            /**if id is set in url, which is gotten when you clicked edit button */
            if (isset($_SESSION['auth'])) {
                $id = $_SESSION['auth_user']['user_id'];
                $profile_qry = "SELECT * FROM `users` WHERE id='$id' ";
                $profile_qry_run = mysqli_query($con, $profile_qry);
                /**if id is correct and data exists in products table */
                $profile_data = mysqli_fetch_array($profile_qry_run);
            ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="../functions/authcode.php" method="POST">
                            <input type="hidden" name="userid" value="<?= $id; ?>">
                            <div class="form-group mb-3">
                                <label>Firstname</label>
                                <input type="text" class="form-control" value="<?= $profile_data['first_name']; ?>" name="firstname" placeholder="Enter firstname" />
                            </div>
                            <div class="form-group mb-3">
                                <label>Lastname</label>
                                <input type="text" class="form-control" value="<?= $profile_data['last_name']; ?>" name="lastname" placeholder="Enter lastname" />
                            </div>
                            <div class="form-group mb-3">
                                <label>Username</label>
                                <input type="text" class="form-control" value="<?= $profile_data['user_name']; ?>" name="username" placeholder="Enter username" />
                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" value="<?= $profile_data['e_mail']; ?>" name="email" placeholder="Enter email" />
                            </div>
                            <div class="form-group mb-3">
                                <label>Phone</label>
                                <input type="number" class="form-control" value="<?= $profile_data['phone_number']; ?>" name="phonenumber" placeholder="Enter phone number" />
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="text" class="form-control" value="<?= $profile_data['pass_word']; ?>" name="password" placeholder="Password" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="profile_update_btn" class="btn btn-primary">UPDATE PROFILE</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php

            } else {
                echo "ID not set";
            }

            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>