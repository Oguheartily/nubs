<?php
include('../functions/excosfunctions.php');
/** if user is logged in */
if(isset($_SESSION['auth'])){
    /**if role_as is not 1 means its a normal user, redirect to homepage */
    if($_SESSION['role_as'] == 0){
        $_SESSION['message'] = "You are not Authorized to access this page";
        header('Location: ../index.php');
    }
    /**if role_as is not 1 means its a normal user, redirect to homepage */
    else if($_SESSION['role_as'] == 1){
        $_SESSION['message'] = "You are not Authorized to access this page";
        header('Location: ../admin/index.php');
    }
    else if($_SESSION['role_as'] == 9){
        $_SESSION['message'] = "Your Account has been suspended";
        header('Location: ../suspended.php');
    }
    
    
}
else {
    $_SESSION['message'] = "Login to continue";
    header('Location: ../login.php');
}
?>