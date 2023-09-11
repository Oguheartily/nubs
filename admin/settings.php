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
                <div class="card-body table-responsive" id="category_table">
                    <?php 
                    if(empty($officedata['id'])) {
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
                    }
                    ;?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>