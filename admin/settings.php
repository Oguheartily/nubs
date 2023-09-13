<?php
include('../middleware/adminAuthenticator.php');
/**myfunction .php is already in adminware so we dont need to inclusde it here */
include_once('../config/dbcon.php');
include('includes/header.php');

$OfficeInfo = getOrganizationInfo();
$officedata = mysqli_fetch_array($OfficeInfo);
?>
<div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-white"><span class="fa fa-cog me-2"></span> Settings</h4>
                </div>
                <div class="card-body">
                    <div class="accordion" id="settingsaccordion">
                        <!-- Organization Settings -->
                        <div class="accordion-item mt-1">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    Organization Settings
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#settingsaccordion">
                                <div class="accordion-body">
                                    <!-- Opening tag of accordion -->
                                    <div>
                                        <?php
                                        if (empty($officedata['id'])) {
                                        ?>
                                            <form action="code.php" method="POST">
                                                <div class="form-group mb-3">
                                                    <label>Office Email</label>
                                                    <input type="email" class="form-control" value="" name="officeEmail" />
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office Phone</label>
                                                    <input type="number" class="form-control" value="" name="officePhone" />
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office Address</label>
                                                    <textarea name="userAddress" rows="3" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office Facebook</label>
                                                    <textarea name="officeFacebook" rows="3" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office Instagram</label>
                                                    <textarea name="officeInstagram" rows="3" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office X (twitter)</label>
                                                    <textarea name="officeX" rows="3" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office Whatsapp</label>
                                                    <textarea name="officeWhatsapp" rows="3" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office Youtube</label>
                                                    <textarea name="officeYoutube" rows="3" class="form-control"></textarea>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" name="officedata_cancel_btn" class="btn btn-danger border-white">CANCEL</button>
                                                    <button type="submit" name="insert_officedata_btn" class="btn btn-primary border-white">SAVE</button>
                                                </div>
                                            </form>
                                        <?php
                                        } else {
                                        ?>
                                            <form action="code.php" method="POST">
                                                <div class=""><input type="hidden" name="officeId" value="<?= $officedata['id']; ?>"></div>
                                                <div class="form-group mb-3">
                                                    <label>Office Email</label>
                                                    <input type="email" class="form-control" value="<?= $officedata['office_email']; ?>" name="officeEmail" />
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office Phone</label>
                                                    <input type="number" class="form-control" value="<?= $officedata['office_phone']; ?>" name="officePhone" />
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office Address</label>
                                                    <textarea name="userAddress" rows="3" class="form-control"><?= $officedata['office_address']; ?></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office Facebook</label>
                                                    <textarea name="officeFacebook" rows="3" class="form-control"><?= $officedata['office_facebook']; ?></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office Instagram</label>
                                                    <textarea name="officeInstagram" rows="3" class="form-control"><?= $officedata['office_instagram']; ?></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office X (twitter)</label>
                                                    <textarea name="officeX" rows="3" class="form-control"><?= $officedata['office_x']; ?></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office Whatsapp</label>
                                                    <textarea name="officeWhatsapp" rows="3" class="form-control"><?= $officedata['office_whatsapp']; ?></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Office Youtube</label>
                                                    <textarea name="officeYoutube" rows="3" class="form-control"><?= $officedata['office_youtube']; ?></textarea>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" name="officedata_cancel_btn" class="btn btn-danger border-white">CANCEL</button>
                                                    <button type="submit" name="officedata_update_btn" class="btn btn-primary border-white">SAVE</button>
                                                </div>
                                            </form>
                                        <?php
                                        }; ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2022 Edition -->
                        <div class="accordion-item mt-1">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    Change Site Logo
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#settingsaccordion">
                                <div class="accordion-body">
                                    <div>
                                        <?php
                                        $logoQry_run = getSiteLogo();
                                        if (mysqli_num_rows($logoQry_run) <= 0) {
                                            /**if there is no such data in database */
                                        ?>
                                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12 mt-1">
                                                        <input type="hidden" name="imageName" value="logo">
                                                    </div>
                                                    <div class="col-md-12 mt-1">
                                                        <label class="text-bold mb-0">Pick Logo</label>
                                                        <input type="file" name="siteLogo" placeholder="Upload Image" class="form-control">
                                                    </div>
                                                    <div class="col-md-12 mt-4 text-center">
                                                        <button type="submit" class="btn btn-success border-dark" name="siteLogo_upload_btn">Upload site Logo</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                        } else {
                                            $logoQry_run = getSiteLogo();
                                            if (mysqli_num_rows($logoQry_run) > 0) {
                                                /**fetch each data related to the given id */
                                                $data = mysqli_fetch_assoc($logoQry_run)
                                            ?>
                                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-12 mt-1">
                                                            <label class="text-bold mb-0">Logo</label>
                                                            <div class="col-md-12 mb-4">
                                                                <label class="text-bold">Pick New Logo</label>
                                                                <input type="hidden" name="iconName" value="<?= $data['icon_name']; ?>">
                                                                <input type="file" name="siteLogo" placeholder="Enter Upload Image" class="form-control">
                                                                <label class="text-bold">Current image: </label>
                                                                <input type="hidden" name="old_icon" value="<?= $data['site_icons']; ?>">
                                                                <img src="../<?= $data['site_icons']; ?>" width="100px" height="100px" class="my-2"><span><?= $data['site_icons']; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-4 text-center">
                                                            <button type="submit" class="btn btn-success border-dark" name="update_siteLogo_btn">Update site Logo</button>
                                                        </div>
                                                    </div>
                                                </form>
                                        <?php
                                            }
                                        }; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Change Site Favicon -->
                        <div class="accordion-item mt-1">
                            <h2 class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    Change Site Icon
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#settingsaccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div>
                                            <?php
                                            $faviconQry_run = getSiteFavicon();
                                            if (mysqli_num_rows($faviconQry_run) <= 0) {

                                            ?>
                                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-12 mt-1">
                                                            <input type="hidden" name="imageName" value="favicon">
                                                        </div>
                                                        <div class="col-md-12 mt-1">
                                                            <label class="text-bold mb-0">Pick Icon</label>
                                                            <input type="file" name="siteFavicon" placeholder="Upload Image" class="form-control">
                                                        </div>
                                                        <div class="col-md-12 mt-4 text-center">
                                                            <button type="submit" class="btn btn-success border-dark" name="favicon_upload_btn">Upload site Logo</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <?php
                                            } else {
                                                $logoQry_run = getSiteFavicon();
                                                if (mysqli_num_rows($logoQry_run) > 0) {
                                                    /**fetch each data related to the given id */
                                                    $data = mysqli_fetch_assoc($logoQry_run)
                                                ?>
                                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-md-12 mt-1">
                                                                <label class="text-bold mb-0">Logo</label>
                                                                <div class="col-md-12 mb-4">
                                                                    <label class="text-bold">Pick New Logo</label>
                                                                    <input type="hidden" name="iconName" value="<?= $data['icon_name']; ?>">
                                                                    <input type="file" name="sitefavicon" placeholder="Enter Upload Image" class="form-control">
                                                                    <label class="text-bold">Current image: </label>
                                                                    <input type="hidden" name="old_icon" value="<?= $data['site_icons']; ?>">
                                                                    <img src="../<?= $data['site_icons']; ?>" width="100px" height="100px" class="my-2"><span><?= $data['site_icons']; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-4 text-center">
                                                                <button type="submit" class="btn btn-success border-dark" name="update_favicon_btn">Update site Logo</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                            <?php
                                                }
                                            }; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Upload / Delete Slide images -->
                        <div class="accordion-item mt-1">
                            <h2 class="accordion-header" id="heading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    Upload / Delete Slide images
                                </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#settingsaccordion">
                                <div class="accordion-body">
                                    <div class="row">

                                    </div>
                                </div>
                                <!-- end of accordion div -->
                            </div>
                        </div>
                        <!-- More Settings -->
                        <div class="accordion-item mt-1">
                            <h2 class="accordion-header" id="heading6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                    More Settings
                                </button>
                            </h2>
                            <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#settingsaccordion">
                                <div class="accordion-body">
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- More Settings -->
                        <div class="accordion-item my-1">
                            <h2 class="accordion-header" id="heading7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                    More Settings
                                </button>
                            </h2>
                            <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#settingsaccordion">
                                <div class="accordion-body">
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- final closing tag of accordion -->
                    </div>
                </div>
                <!-- card-body closing tag -->
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>