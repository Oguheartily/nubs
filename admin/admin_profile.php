<?php

include('../middleware/adminAuthenticator.php');
include('includes/header.php');
?>

<div >
    <div class="row mt-4">
        <div class="col-md-12">
            <?php
            /**if id is set in url, which is gotten when you clicked edit button */
            if (isset($_SESSION['auth'])) {
                $profile_qry_run = getAllFromUsers();
                /**if id is correct and data exists in table */
                $profile_data = mysqli_fetch_array($profile_qry_run);
            ?>
                <div class="card">
                    <div class="card-header bg-primary text-info text-center">
                        <h4>Profile Of The <?= $profile_data['current_position'];?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-md-5">
                                <img src="../images/userDP/<?= $profile_data['user_image']; ?>" class="w-100" alt="">
                            </div>
                            <div class="col-6 col-md-5">
                                <img src="../images/nubsIDCard/<?= $profile_data['nubs_id_card']; ?>" class="w-100" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="row align-items-center">
                                    <div class="col-4 my-3 fw-bold">Firstname</div>
                                    <div class="col-8"><?= $profile_data['first_name']; ?></div>
                                    <div class="col-4 my-3 fw-bold">Lastname</div>
                                    <div class="col-8"><?= $profile_data['last_name']; ?></div>
                                    <div class="col-4 my-3 fw-bold">User Name</div>
                                    <div class="col-8"><?= $profile_data['user_name']; ?></div>
                                    <div class="col-4 my-3 fw-bold">Gender</div>
                                    <div class="col-8"><?= $profile_data['gender']; ?></div>
                                    <div class="col-4 my-3 fw-bold">Email</div>
                                    <div class="col-8"><?= $profile_data['e_mail']; ?></div>
                                    <div class="col-4 my-3 fw-bold">Phone</div>
                                    <div class="col-8"><?= $profile_data['phone_number']; ?></div>
                                    <div class="col-4 my-3 fw-bold">Compound / Polo</div>
                                    <div class="col-8"><?= $profile_data['compound']; ?></div>
                                    <div class="col-4 my-3 fw-bold">Current Position</div>
                                    <div class="col-8"><?= $profile_data['current_position']; ?></div>
                                    <div class="col-4 my-3 fw-bold">Active Year</div>
                                    <div class="col-8"><?= $profile_data['active_year']; ?></div>
                                    <div class="col-4 my-3 fw-bold">Institution</div>
                                    <div class="col-8"><?= $profile_data['school']; ?></div>
                                    <div class="col-4 my-3 fw-bold">State of Schooling</div>
                                    <div class="col-8"><?= $profile_data['state_of_schooling']; ?></div>
                                    <div class="col-4 my-3 fw-bold">Joined: </div>
                                    <div class="col-8"><?= $profile_data['created_date']; ?></div>
                                    <div class="col-4 my-3 fw-bold">Address</div>
                                    <div class="col-8"><?= $profile_data['user_address']; ?></div>
                                    <div class="d-flex justify-content-center py-2">
                                        <a href="update-verify-page.php" class="btn btn-primary">Verify Profile</a>
                                    </div>
                                </div>
                            </div>
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
</div>

<?php include('includes/footer.php'); ?>