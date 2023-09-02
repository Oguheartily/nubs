<?php 
session_start();
/** check if user is logged in and redirect to index page */
if(isset($_SESSION['auth'])){
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
                <div class="card-header py-3 text-center bg-white text-dark">
                    <h2 class="fw-bolder">Reset Your Password</h2>
                </div>
                <div class="card-body">
                    <p>an e-mail will be sent to you with instructions on how to reset your password.</p>
                    <form action="functions/authcode.php" method="POST">
                        <div class="form-group mb-3">
                            <label>Enter e-mail registered to account</label>
                            <input type="email" class="form-control" name="email" placeholder="enter email address..." />
                        </div>
                        <div class="text-center">
                            <button type="submit" name="request_password_reset_btn" class="btn btn-dark">Receive New Password By Email</button>
                        </div>
                    </form>
                </div>
                <div class="mx-3 mb-3 p1">Back to <a href='login.php'>login.</a></div>
            </div>

        </div>
    </div>
</div>

<!-- footer-->
<?php include("includes/footer.php"); ?>
<!-- end footer -->