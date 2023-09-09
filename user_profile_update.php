<?php
include("functions/userfunctions.php");
include('includes/header.php');
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php
            /**if id is set in url, which is gotten when you clicked edit button */
            if (isset($_SESSION['auth'])) {
                $profile_qry_run = getAllFromUsers();
                /**if id is correct and data exists in table */
                $profile_data = mysqli_fetch_array($profile_qry_run);
            ?>
                <div class="card bg-primary text-white">
                    <div class="card-header text-white text-center">
                        <h4>Update Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="excos/code.php" method="POST">
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
                                    <div class="form-group mb-3 p-1 bg-secondary">
                                        <label>Gender</label>
                                        <?php
                                        if ($profile_data['gender'] = "Male") { ?>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="select-gender" id="maleOption" value="male" checked>
                                                <label for="maleOption" class="form-check-label">Male</label>
                                            </div>
                                        <?
                                        } else if ($profile_data['gender'] = "Female") { ?>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="select-gender" id="femaleOption" value="female" checked>
                                                <label for="femaleOption" class="form-check-label">Female</label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="<?= $profile_data['e_mail']; ?>" name="email" placeholder="Enter email" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Phone</label>
                                        <input type="number" class="form-control" value="<?= $profile_data['phone_number']; ?>" name="phonenumber" placeholder="Enter phone number" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Institution</label>
                                        <input type="text" class="form-control" value="<?= $profile_data['school']; ?>" name="school" placeholder="Enter position eg: member..." />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>NUBS Position</label>
                                        <input type="text" name="currentNubsPost" class="form-control" value="<?= $profile_data['current_position']; ?>" placeholder="Enter position eg: member..." required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Active Year </label> <span class="fas fa-info-circle"></span><em> members, use current year.</em>
                                        <input type="text" name="activeNubsYear" class="form-control" value="<?= $profile_data['active_year']; ?>" placeholder="Enter active year for Excos eg: 2020...">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Current State of Schooling </label>
                                        <input type="text" name="select-state" class="form-control" value="<?= $profile_data['state_of_schooling']; ?>" placeholder="Enter active year for Excos eg: 2020...">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Compound (Polo)</label>
                                        <input type="text" name="select-compound" class="form-control" value="<?= $profile_data['compound']; ?>" placeholder="Enter active year for Excos eg: 2020...">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Address</label>
                                        <textarea name="userAddress" id="" rows="3" class="form-control"><?= $profile_data['user_address']; ?></textarea>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="profile_update_btn" class="btn btn-primary border-white">UPDATE PROFILE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
            } else {
                echo "ID not set";
            }
                ?>
                </div>
        </div>

        <!-- VERIFICATION START -- PROFILE PHOTO-->
        <div class="col-md-12 my-3">
            <div class="card bg-success">
                <div class="card-header text-white text-center py-3">
                    <h4>PROFILE PHOTO ADDITION</h4>
                </div>
                <div class="card-body text-white">
                    <!-- further verification -->
                    <form action="excos/code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 mt-1">
                                <label class="text-bold mb-0">Profile Photo</label>
                                <input type="file" name="profilePhoto" placeholder="Upload Image" class="form-control">
                            </div>
                            <div class="col-md-12 mt-4 text-center">
                                <button type="submit" class="btn btn-success border-white" name="user_dp_verify_btn">Upload Profile Photo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- VERIFICATION START -- ID CARD-->
        <div class="col-md-12 my-3">
            <div class="card bg-info">
                <div class="card-header text-white text-center py-3">
                    <h4>NUBS ID CARD VERIFICATION</h4>
                </div>
                <div class="card-body text-white">
                    <!-- further verification -->
                    <form action="excos/code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 mt-1">
                                <label class="text-bold mb-0">NUBS ID Card</label>
                                <input type="file" name="nubsIDCard" placeholder="Upload Image" class="form-control">
                            </div>
                            <div class="col-md-12 mt-4 text-center">
                                <button type="submit" class="btn btn-success border-white" name="user_id_card_verify_btn">Upload ID</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>