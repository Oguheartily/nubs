<?php 
include('functions/userfunctions.php');
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
            <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'];?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            <?php unset($_SESSION['message']); }?>
            <div class="card">
                <div class="card-header bg-primary py-3 text-center">
                    <h3 class="fw-bolder text-white">Login</h3>
                </div>
                <div class="card-body">
                    <form action="functions/authcode.php" method="POST">
                        <div class="form-group mb-3">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email address" />
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                        </div>
                        <div class="text-center">
                            <button type="submit" name="login" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="mx-3 mb-3 p1">Click if you <a href="reset-password.php">Forgot Password.</a></div>
                <div class="mx-3 mb-3 p1">Don't have an account yet? click here <a href="register.php">Register</a></div>
            </div>

        </div>
    </div>
</div>

<!-- footer-->
<?php include("includes/footer.php"); ?>
<!-- end footer -->