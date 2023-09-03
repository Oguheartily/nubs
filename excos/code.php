<?php
// code for processing inputs to database

use function PHPSTORM_META\type;

include('../config/dbcon.php');
include('../functions/excosfunctions.php');

/** ADD EVENT POST PROCESSING */
if(isset($_POST['add_post_btn'])){
    $category_id = $_POST['category_id'];
    $userId = $_POST['userId'];
    $post_heading = $_POST['post_heading'];
    $post_content = $_POST['post_content'];

    /**get name of uploaded image */
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    // $filename = $image;
    $filename = 'article'.time().'.'.$image_ext;

    if($post_heading != "" && $post_content != "" && $image != "" ){
        $eventpost_query_run = mysqli_query($con, "INSERT INTO `events_post`(`user_id`, `heading`, `image`, `content`, `post_category_id`) 
        VALUES ('$userId','$post_heading','$filename','$post_content','$category_id')");

        if($eventpost_query_run){
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirecter("index.php", "Event Post added successfully");
        }
        else{
            redirecter("add-event.php", "Unable to add event post, Something went wrong");
        }
    }
    else{
        redirecter("add-event.php", "The folllowing fields cannot be empty: event post Name, small description, image.");
    }
}
/** EDIT PRODUCT */
else if(isset($_POST['update_post_btn'])){
    $eventpost_id = $_POST['eventpost_id'];
    $category_id = $_POST['category_id'];
    $post_heading = $_POST['post_heading'];
    $post_content = $_POST['post_content'];

    /**get name of uploaded image */
    /** get old image */
    $old_eventpost_image = $_POST['old_eventpost_image'];
    /**get name of uploaded image */
    $new_image = $_FILES['image']['name'];
    if($new_image != ""){
        // $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = 'article'.time().'.'.$image_ext;
    }
    else {
        $update_filename = $old_eventpost_image;
    }
    $path = "../uploads";

    $eventpost_update_query_run = mysqli_query($con, "UPDATE `events_post` SET `heading`='$post_heading',
    `image`='$update_filename',`content`='$post_content',`post_category_id`='$category_id' WHERE `id`='$eventpost_id' ");

    if($eventpost_update_query_run){
        if($new_image != ""){
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            /**since new image exist, delete the old image from the uploads folder */
            if(file_exists("../uploads/".$old_eventpost_image)){
                unlink("../uploads/".$old_eventpost_image);
            }
        }
        redirecter("edit-event.php?id=$eventpost_id", "Post Updated successfully");
    }
    else{
        redirecter("edit-event.php?id=$eventpost_id", "Unable to Update Post, Something went wrong");
    }
}
/** DELETE PRODUCT, CONFIRMED BY AJAX BEFORE DELETION */
else if(isset($_POST['delete_eventpost_btn'])){
    $eventpost_id = mysqli_real_escape_string($con, $_POST['eventpost_id']);
    /**check database for image name of id to be deleted */
    $eventpost_query_run = mysqli_query($con, "SELECT * FROM `event_post` WHERE id='$eventpost_id' ");
    $eventpost_data = mysqli_fetch_array($eventpost_query_run);
    $image_to_delete = $eventpost_data['image'];
    /**query that delete the selected row frow db */
    $delete_query_run = mysqli_query($con, $delete_query, "DELETE FROM `event_post` WHERE id='$eventpost_id' ");
    if($delete_query_run){
        /**if file with image name exist delete image from uploads 
         * folder after deleting eventpost from database */
        if(file_exists("../uploads/".$image_to_delete)){
            unlink("../uploads/".$image_to_delete);
        }
        // $_SESSION['message'] = "eventpost Delete Successfully!";
        // header("Location: eventposts.php");
        echo 200;
    }
    else{
        // $_SESSION['message'] = "Unable to Delete item, Something went wrong";
        // header("Location: eventposts.php");
        echo 500;
    }
}
/** UPDATE EXCOS PROFILE */
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

    $excoId = $_SESSION['auth_user']['user_id'];

    $profile_update_run = mysqli_query($con, "UPDATE `users` SET `first_name`='$firstname',
    `last_name`='$lastname',`user_name`='$username',`e_mail`='$email',`phone_number`='$phonenumber',
    `user_address`='$userAddress',`compound`='$compound',`current_position`='$currentNubsPost',
    `active_year`='$activeNubsYear',`school`='$school',`state_of_schooling`='$schoolingState' WHERE `id`='$excoId' ");
    if($profile_update_run){
        redirecter("excos_profile.php", "Profile Update Successful");
    }
    else{
        redirecter("excos_profile.php", "Something went Wrong, try again");
    }
}
/** EXCOS PROFILE PHOTO VERIFICATION */
else if(isset($_POST['user_dp_verify_btn'])){
    $userId = $_SESSION['auth_user']['user_id'];
    $myUsername = $_SESSION['auth_user']['username'];

    /**EXCOS Profile Picture */
    $profilePhoto = $_FILES['profilePhoto']['name'];
    $userImgpath = "../images/excosDP";
    $profilePhoto_ext = pathinfo($profilePhoto, PATHINFO_EXTENSION);
    // $filename = $image;
    $userImgfilename = $myUsername.'DP.'.$profilePhoto_ext;

    if($userId != "" && $profilePhoto != ""){
        /**check and remove from folder, to avoid duplicate of same file */
        if(file_exists("../images/excosDP/".$userImgfilename)){
            unlink("../images/excosDP/".$userImgfilename);
        } else {}
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
/** EXCOS ID CARD VERIFICATION */
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
else{
    header('Location: ../index.php');
}

?>