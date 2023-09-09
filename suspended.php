<?php 
include("includes/header.php");
if(isset($_SESSION['auth'])){
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    session_unset();
    $_SESSION['message'] = "Your Account has been temporarily suspended.";
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header py-3 bg-danger text-center text-white">
                    <h4>Account Suspended</h4>
                </div>
                <div class="card-body">
                    <p><span class="fa fa-info-circle"></span>
                    Hello Dear, sorry about this, your account has been temporarily suspended.</p>
                    <p>Reasons for possible Suspension:</p>
                    <ul>
                        <li>Report by a excos / member of the suspended account.</li>
                        <li>Wrong, Fake or Misleading Information provided by the suspended account</li>
                    </ul>
                    <p>To unsuspend your account, follow the steps: </p>
                    <ul>
                        <li>Send a direct mail to the admin from the email registered with the account</li>
                        <li>a photo of any valid means of identification for verification purposes.</li>
                    </ul>
                    <div class="py-2">Thanks</div>
                    <div class="py-3">
                        <span>Admin mail:  </span>
                        <a href="mailto:a">admin@mail.com</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- footer-->
<?php include("includes/footer.php"); ?>
<!-- end footer -->