<?php
include("functions/userfunctions.php");
include('includes/header.php');
?>
<div class="container-fluid pt-2 mb-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pt-4 text-center text-white contact-bg">
                    <h4 class="fs-1 fw-bolder pini">Contact Us</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <?php
                                $OfficeInfo = getOrganizationInfo();
                                if (mysqli_fetch_array($OfficeInfo) > 0) {
                                    foreach($OfficeInfo as $officedata){
                                ?>
                                        <div class="col-6 text-center border pt-1 shadow-sm pini">
                                            <span class="fa fa-map-marker-alt fs-1 my-1 contact-icons"></span>
                                            <h6 class="fw-bolder">OFFICE</h6>
                                            <p><?= $officedata['office_address']; ?></p>
                                        </div>
                                        <div class="col-6 text-center border pt-1 shadow-sm pini">
                                            <span class="fa fa-phone-alt fs-2 my-1 contact-icons"></span>
                                            <h6 class="fw-bolder">PHONE</h6>
                                            <p><?= $officedata['office_phone']; ?></p>
                                        </div>
                                        <div class="col-6 text-center border pt-1 shadow-sm pini">
                                            <span class="fa fa-envelope fs-2 my-1 contact-icons"></span>
                                            <h6 class="fw-bolder">EMAIL</h6>
                                            <p><?= $officedata['office_email']; ?></p>
                                        </div>
                                        <div class="col-6 text-center border pt-1 shadow-sm">
                                            <div class="row socials">
                                                <a href="<?= $officedata['office_facebook']; ?>" class="col-6 contact-icons"><span class="fab fa-facebook-square"></span></a>
                                                <a href="<?= $officedata['office_instagram']; ?>" class="col-6 contact-icons"><span class="fab fa-instagram"></span></a>
                                                <a href="<?= $officedata['office_x']; ?>" class="col-6 contact-icons"><span class="fab fa-twitter"></span></a>
                                                <a href="<?= $officedata['office_whatsapp']; ?>" class="col-6 contact-icons"><span class="fab fa-whatsapp"></span></a>
                                            </div>
                                        </div>
                                <?php
                                    }
                                } else { }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="functions/authcode.php" method="post">
                                <?php
                                if (isset($_SESSION['auth'])) {
                                    $curr_user_id = $_SESSION['auth_user']['user_id'];
                                ?>
                                    <input type="hidden" name="curr_user_id" value="<?= $curr_user_id; ?>">
                                <?php
                                } else {
                                ?>
                                    <input type="hidden" name="curr_user_id" value="99">
                                <?php
                                }
                                ?>
                                <input type="text" name="contactName" class="w-100 form-control py-2 mb-4" placeholder="Enter your name">
                                <input type="email" name="contactEmail" class="w-100 form-control py-2 my-4" placeholder="Enter a valid email">
                                <input type="text" name="contactSubject" class="w-100 form-control py-2 my-4" placeholder="Enter Subject">
                                <textarea name="contactAddress" class="w-100 form-control py-2 my-4"></textarea>
                                <div class="text-center">
                                    <button type="submit" name="contactSubmitBtn" class="btn btn-lg border border-success contact-sub">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end card-body  -->
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>