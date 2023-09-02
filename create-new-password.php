<?php
session_start();
/** check if user is logged in and redirect to index page */
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are already Logged In";
    header('Location: index.php');
    exit();
    /**the exit function prevents the if code block from executing continuously */
}
include("includes/header.php");
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <?php 
                    /**get the tokens from the url and check to see if any has been manually tampared with */
                    $selector = $_GET['selector'];
                    $validator = $_GET['validator'];

                    if (empty($selector) || empty($validator)) {
                        $_SESSION['message'] = "Could not validate your request";
                    } else {
                        /**check if these tokens are correctly in hex format */
                        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                            ?>
                            <form action="functions/authcode.php" method="post">
                                <input type="hidden" name="selector" value="<?= $selector?>">
                                <input type="hidden" name="validator" value="<?= $validator?>">
                                <input type="password" name="password" placeholder="Enter a new pasword....">
                                <input type="password" name="password-repeat" placeholder="repeat new password...">
                                <button type="submit" name="reset_password_btn">Reset Password</button>
                            </form>

                            <?php 
                        }
                    }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer-->
<?php include("includes/footer.php"); ?>
<!-- end footer -->