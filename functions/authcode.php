<?php 
// require('../config/dbcon.php');
    require('myfunctions.php');
    /**USER REGISTRATION */
    if(isset($_POST['register_btn'])){

        $excosUniquCode = mysqli_real_escape_string($con,$_POST['excosUniquCode']);
        $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $gender = mysqli_real_escape_string($con,$_POST['select-gender']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $phonenumber = mysqli_real_escape_string($con,$_POST['phonenumber']);
        $school = mysqli_real_escape_string($con,$_POST['school']);
        $currentNubsPost = mysqli_real_escape_string($con,$_POST['currentNubsPost']);
        $activeNubsYear = mysqli_real_escape_string($con,$_POST['activeNubsYear']);
        $schoolingState = mysqli_real_escape_string($con,$_POST['select-state']);
        $compound = mysqli_real_escape_string($con,$_POST['select-compound']);
        $userAddress = mysqli_real_escape_string($con,$_POST['userAddress']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $confirmpassword = mysqli_real_escape_string($con,$_POST['confirmpassword']);

        if($password == $confirmpassword){
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            if(empty($activeNubsYear)){ $activeNubsYear = date("Y"); }

            if ($excosUniquCode == "Aluta4ever") {
                $role_as = 2;
                $register_query_run = mysqli_query($con, "INSERT INTO `users`(`first_name`, `last_name`, `user_name`, `gender`, `e_mail`, `phone_number`, `user_address`, `compound`, `current_position`, `active_year`, `school`, `state_of_schooling`, `pass_word`,`role_as`) 
            VALUES ('$firstname', '$lastname', '$username', '$gender','$email','$phonenumber','$userAddress','$compound','$currentNubsPost','$activeNubsYear','$schoolingState','$hashed_password', ''$role_as)");
            } else {
            $register_query_run = mysqli_query($con, "INSERT INTO `users`(`first_name`, `last_name`, `user_name`, `gender`, `e_mail`, `phone_number`, `user_address`, `compound`, `current_position`, `active_year`, `school`, `state_of_schooling`, `pass_word`) 
            VALUES ('$firstname', '$lastname', '$username', '$gender','$email','$phonenumber','$userAddress','$compound','$currentNubsPost','$activeNubsYear','$schoolingState','$hashed_password')");
            }
            if($register_query_run){
                redirecter("../login.php", "Registration Successful");
            } else{
                redirecter("../register.php", "Something went Wrong, try again");
            }
        } else {
            redirecter("../register.php", "Passwords do not match");
        }
    }
    /** UPDATE USER PROFILE */
    else if(isset($_POST['profile_update_btn'])){

        $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $phonenumber = mysqli_real_escape_string($con,$_POST['phonenumber']);
        $school = mysqli_real_escape_string($con,$_POST['school']);
        $currentNubsPost = mysqli_real_escape_string($con,$_POST['currentNubsPost']);
        $activeNubsYear = mysqli_real_escape_string($con,$_POST['activeNubsYear']);
        $schoolingState = mysqli_real_escape_string($con,$_POST['select-state']);
        $compound = mysqli_real_escape_string($con,$_POST['select-compound']);
        $userAddress = mysqli_real_escape_string($con,$_POST['userAddress']);

        $userId = $_SESSION['auth_user']['user_id'];

        $profile_update_run = mysqli_query($con, "UPDATE `users` SET `first_name`='$firstname',`last_name`='$lastname',`user_name`='$username',`e_mail`='$email',`phone_number`='$phonenumber',`user_address`='$userAddress',`compound`='$compound',`current_position`='$currentNubsPost',`active_year`='$activeNubsYear',`school`='$school',`state_of_schooling`='$schoolingState' WHERE `id`='$userId' ");

        if($profile_update_run){
            redirecter("../user-profile.php", "Profile Update Successful");
        }
        else{
            redirecter("../user-profile.php", "Something went Wrong, unable to update profile!!!");
        }
    }
    /** LOGIN */
    else if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['password']);

        /**get hashed password from db to verify with login password */
        $user_query_run = mysqli_query($con, "SELECT * FROM `users` WHERE `e_mail`='$email' ");

        if(mysqli_num_rows($user_query_run) > 0 ){
            $row = mysqli_fetch_array($user_query_run);
            $db_hashed_password = $row['pass_word'];
        } else {
            redirecter("Location: ../login.php", "Unable to find email match, try again");
        }
        if(password_verify($password, $db_hashed_password)) {
            $login_query_run = mysqli_query($con, "SELECT * FROM `users` WHERE `e_mail`='$email' AND `pass_word`='$db_hashed_password' ");
        } else {
            redirecter("Location: ../login.php", "Unable to verify Password, try again!");
        }
        if($login_query_run){
            /**check if database query came as true (susccessful) */
            $_SESSION['auth'] = true;

            /**store the user details in session variable 'user_auth' to carry across website */
            $userdata = mysqli_fetch_array($login_query_run);
            $userid = $userdata['id'];
            $username = $userdata['user_name'];
            $useremail = $userdata['e_mail'];
            $role_as = $userdata['role_as'];

            $_SESSION['auth_user'] = [
                'user_id' => $userid,
                'username' => $username,
                'email' => $useremail
            ];
            /**the code above is how we want to store this data in the browser session */

            /**store a new session variable */
            $_SESSION['role_as'] = $role_as;
            /**now check if role_as is 1, head to admin dashboard, if its 0, head to index.php */
            if($role_as == 1){
                $_SESSION['message'] = "Welcome, $username";
                header('Location: ../admin/index.php');
            }
            /**now check if role_as is 2, head to excos dashboard, if its 0, head to index.php */
            else if($role_as == 2 || $role_as == 3){
                $_SESSION['message'] = "Welcome, $username";
                header('Location: ../excos/index.php');
            }
            /**now check if role_as is 9, this means the user is suspended */
            else if($role_as == 9){
                $_SESSION['message'] = "Account Suspended";
                if(isset($_SESSION['auth'])){
                    unset($_SESSION['auth']);
                    unset($_SESSION['auth_user']);
                    session_unset();
                    $_SESSION['message'] = "Your Account has been temporarily suspended.";
                }
                header('Location: ../suspended.php');
            }
            else {
                $_SESSION['message'] = "Logged In Successfully";
                header('Location: ../index.php');
            }

        }
        else{
            $_SESSION['message'] = "Invalid Credentials";
            header('Location: ../login.php');
        }
    }
    /**FORGOT PASSWORD REQUEST */
    else if(isset($_POST['request_password_reset_btn'])){
        
        $email = mysqli_real_escape_string($con,$_POST['email']);
        /**create 8 bytes random token and convert to hexadecimal */
        $selector = bin2hex(random_bytes(8));
        /**token to authenticate user */
        $token = random_bytes(32);

        /**this shound be changed to a real website */
        // $url = "wwww.nubsbille.com/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);
        $url = "http://localhost/projects/Nubs-Bille/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);
        /**expire 1hr from when its activated */
        $expires = date("U") + 1800;
        /**to avoid duplicate token request from same user, clear database entry of this user */
        $cleardb_qry_run = mysqli_query($con, "DELETE FROM `password_reset` WHERE `pwd_reset_email`='$email'");
        if($cleardb_qry_run){
            $hashed_token = password_hash($token, PASSWORD_DEFAULT);
            $newToken_run = mysqli_query($con, "INSERT INTO `password_reset`(`pwd_reset_email`, `pwd_reset_selector`, `pwd_reset_token`, `pwd_reset_expires`) 
            VALUES ('$email','$selector','$hashed_token','$expires')");
            redirecter("../login.php", "Password reset link sent to $email.");
            exit();
        }
        else{
            redirecter("../login.php", "Something went wrong, Unable to send reset e-mail");
            
        }
        mysqli_close($con);

        $mailto = $email;

        $subject = 'Reset your Nubs-Bille password';
        $message = "<p>We received a password reset request, The link to reset your password is given below, if you did not make this request, you can ignore this email. </br> Here is your password link: </br> <a href='$url'>$url</a></p>";

        // $headers = "From: <nubsbille@gmail.com>\r\n";
        // $headers .= "Reply: <nubsbille@gmail.com>\r\n";
        $headers = "From: <heartily414@gmail.com>\r\n";
        $headers .= "Reply: <heartily414@gmail.com>\r\n";
        $headers .= "Content-Type: text/html\r\n";
        /**this line above is what makes the html to be rendered */

        mail($mailto, $subject, $headers);

        redirecter("../reset-password.php", "Password Reset Successful");

    }
    /**PASSWORD RESET */
    else if(isset($_POST['reset_password_btn'])){
        
        $selector = $_POST['selector'];
        $validator = $_POST['validator'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['password-repeat'];

        if (empty($password) || empty($passwordRepeat)) {
            redirecter("../create-new-password.php", "password or confirm password cannot be empty");
        } else if ($password !== $passwordRepeat) {
            redirecter("../create-new-password.php", "password does not match confirmation password");
        } else {
            // redirecter("../login.php", "Success");
        }
        
        /**current date of activation */
        $currentDate = date("U");
        /** use the selector token to get the token from the db */
        $getToken_qry_run = mysqli_query($con, "SELECT * FROM `password_reset` WHERE `pwd_reset_selector`='$selector' AND `pwd_reset_expires`>='$currentDate' ");

        /**check if query was successful */
        if ($getToken_qry_run) {
            if (mysqli_num_rows($getToken_qry_run) > 0) {
                $rows = mysqli_fetch_assoc($getToken_qry_run);
                /**convert token from hex (in db) back to binary */
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["pwd_reset_token"]);

                if ($tokenCheck === false) {
                    redirecter("../reset-password.php", "You need to re-submit your reset password request");
                    exit();
                } else if ($tokenCheck === false) {
                    /**now update the user table */
                    $tokenEmail = $row['pwd_reset_email'];
                    $getUser_qry_run = mysqli_query($con, "SELECT * FROM `users` WHERE `e_mail`='$tokenEmail' ");
                    if ($getUser_qry_run) {
                        /**hash the newly created password */
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        /**update the password */
                        $userpswupdate_qry_run = mysqli_query($con, "UPDATE `users` SET `pass_word`='$hashed_password' WHERE `e_mail`='$tokenEmail' ");
                        /**to avoid duplicate token request from same user, clear database entry of this user */
                        $cleardb_qry_run = mysqli_query($con, "DELETE FROM `password_reset` WHERE `pwd_reset_email`='$email'");
                        if($cleardb_qry_run){
                            redirecter("../login.php", "Password Changed Successfully");
                            exit();
                        }

                    } else {
                        redirecter("../reset-password.php", "You need to re-submit your reset request, email did not match");
                        exit();
                    }
                }
            } else {
                /**if no rows were found in db, return the user to try reset password */
                redirecter("../reset-password.php", "You need to re-submit your reset password request");
                exit();
            }
            redirecter("../login.php", "Password Changed Successfully");

        } else {
            redirecter("../login.php", "Error, could not reset password, try again");
            exit();
        }
    }
    /**CONTACT US FORM */
    else if(isset($_POST['contactSubmitBtn'])){

        $curr_user_id = mysqli_real_escape_string($con,$_POST['curr_user_id']);
        $contactName = mysqli_real_escape_string($con,$_POST['contactName']);
        $contactEmail = mysqli_real_escape_string($con,$_POST['contactEmail']);
        $contactSubject = mysqli_real_escape_string($con,$_POST['contactSubject']);
        $contactAddress = mysqli_real_escape_string($con,$_POST['contactAddress']);
       
        $contactUs_query_run = mysqli_query($con, "INSERT INTO `contact_form_table` (`user_id`, `contact_name`, `contact_email`, `subject`, `comments`)
                         VALUES ('$curr_user_id', '$contactName', '$contactEmail', '$contactSubject', '$contactAddress')");

        if($contactUs_query_run){
            redirecter("../contact.php", "Thank Response has been received successfully, we'll look into it ASAP.");
        }
        else{
            redirecter("../contact.php", "Oops, Something went Wrong, try again");
        }
    }
    /** MEMBER PROFILE PHOTO VERIFICATION */
    else if(isset($_POST['user_dp_verify_btn'])){
        $userId = $_SESSION['auth_user']['user_id'];
        $myUsername = $_SESSION['auth_user']['username'];

        /**Member Profile Picture */
        $profilePhoto = $_FILES['profilePhoto']['name'];
        $userImgpath = "../images/userDP";
        $profilePhoto_ext = pathinfo($profilePhoto, PATHINFO_EXTENSION);
        // $filename = $image;
        $userImgfilename = $myUsername.'DP.'.$profilePhoto_ext;

        if($userId != "" && $profilePhoto != ""){
            /**check and remove from folder, to avoid duplicate of same file */
            if(file_exists("../images/userDP/".$userImgfilename)){
                unlink("../images/userDP/".$userImgfilename);
            }
            $user_verif_qry_run = mysqli_query($con,"UPDATE `users` SET `user_image`='$userImgfilename' WHERE `id`='$userId' ");
            
            if($user_verif_qry_run){
                move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $userImgpath.'/'.$userImgfilename);

                redirecter("../user-profile.php", "Profile Photo Added successfully");
            }
            else{
                redirecter("../user-profile.php", "Unable to update info, Something went wrong");
            }
        }
        else{
            redirecter("../user-profile.php", "No photo detected, field cannot be empty!");
        }
    }
    /** MEMBER ID CARD VERIFICATION */
    else if(isset($_POST['user_id_card_verify_btn'])){
        $userId = $_SESSION['auth_user']['user_id'];
        $myUsername = $_SESSION['auth_user']['username'];

        /**Member ID Card Image */
        $nubsIDCard = $_FILES['nubsIDCard']['name'];
        $userIDpath = "../images/nubsIDCard";
        $nubsIDCard_ext = pathinfo($nubsIDCard, PATHINFO_EXTENSION);
        // $filename = $image;
        $userIDfilename = $myUsername.'IDCard.'.$nubsIDCard_ext;

        if($userId != "" && $nubsIDCard != ""){
            /**check and remove from folder, to avoid duplicate of same file */
            if(file_exists("../images/nubsIDCard/".$userIDfilename)){
                    unlink("../images/nubsIDCard/".$userIDfilename);
            }
            $user_verif_qry_run = mysqli_query($con,"UPDATE `users` SET `nubs_id_card`='$userIDfilename' WHERE `id`='$userId' ");
            
            if($user_verif_qry_run){
                move_uploaded_file($_FILES['nubsIDCard']['tmp_name'], $userIDpath.'/'.$userIDfilename);
                redirecter("../user-profile.php", "ID card image Added successfully");
            }
            else{
                redirecter("../user-profile.php", "Unable to update info, Something went wrong");
            }
        }
        else{
            redirecter("../user-profile.php", "No ID card detected, field cannot be empty!");
        }
    }
    else {

    }
