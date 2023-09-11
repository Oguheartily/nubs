<?php
/* code for processing inputs to database */
include('../config/dbcon.php');
include('../functions/adminfunctions.php');

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
/** EDIT POST */
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
/** DELETE POST, CONFIRMED BY AJAX BEFORE DELETION */
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
        echo 200;
    }
    else{
        echo 500;
    }
}
/** ADD CATEGORY PROCESSING */
else if(isset($_POST['add_category_btn'])){
    $categoryname = $_POST['categoryname'];
    $cate_query_run = mysqli_query($con, "INSERT INTO `post_categories`(`post_category`) VALUES ('$categoryname')");

    if($cate_query_run){
        redirecter("add-category.php", "Category added successfully");
    }
    else{
        redirecter("add-category.php", "Something went wrong");
    }
}
/** EDIT / UPDATE CATEGORY */
else if(isset($_POST['update_category_btn'])){
    /**get id of currently selected product and store in variable */
    $category_id = $_POST['category_id'];
    $categoryname = $_POST['categoryname'];
   
    $update_query_run = mysqli_query($con, "UPDATE `post_categories` SET `post_category`='$categoryname' WHERE `id`='$category_id' ");

    if($update_query_run){
        redirecter("edit-category.php?id=$category_id", "Category Updated successfully");
    }
    else{
        redirecter("edit-category.php?id=$category_id", "Unable to Update item, Something went wrong");
    }
}
/** DELETE CATEGORY */
else if(isset($_POST['delete_category_btn'])){
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    
    /**query that deleted the selected row frow db */
    $delete_query_run = mysqli_query($con, "DELETE FROM `event_categories` WHERE id='$category_id' ");
    if($delete_query_run){
        /**the ajax success code, to be picked by custom js */
        echo 200;
    }
    else{
        echo 500;
    }
}
/** APPROVE POST */
else if(isset($_POST['post_status_update_btn'])){
    $eventpost_id = $_POST['eventpost_id'];
    $postApproval = $_POST['postApproval'];
 
    $updatePostStatus_run = mysqli_query($con, "UPDATE `events_post` SET `status`='$postApproval' WHERE `id`='$eventpost_id' ");

    redirecter("edit-event.php?id=$eventpost_id", "Event Status Updated Successfully");
}
/**UPDATE EXCOS STATUS */
else if(isset($_POST['updateExcosStatusBtn'])){
    $userId = $_POST['userId'];
    $excosNewStatus = $_POST['excos_new_status'];

    $updateExcosStatus = "UPDATE `users` SET `status`='$excosNewStatus' WHERE `id`='$userId' ";
    $updateExcosStatus_run = mysqli_query($con,$updateExcosStatus);

    redirecter("viewExcos.php?id=$userId", "Excos Status Updated Successfully");
} 
/**UPDATE CUSTOMER STATUS SUSPEND/ UNSUSPEND */
else if(isset($_POST['suspendMemberBtn'])){
    $userId = $_POST['userId'];
    $memberNewRoleAs = $_POST['member_new_role_as'];
    $updateMemberStatus_run = mysqli_query($con, "UPDATE `users` SET `role_as`='$memberNewRoleAs' WHERE `id`='$userId' ");
    redirecter("viewMember.php?id=$userId", "Member Status Updated Successfully");
}
/**CHANGE MEMBER TO ADMIN / EXCO TO MEMBER */
else if(isset($_POST['updateMemberRoleAsBtn'])){
    $userId = $_POST['userId'];
    $memberNewRoleAs = $_POST['member_new_role_as'];
    /**1. to current exco, 2. to alumni exco, 3. to member */
    if ($memberNewRoleAs == "2") {
        $updateMemberStatus_run = mysqli_query($con, "UPDATE `users` SET `role_as`='$memberNewRoleAs', `status`='$memberNewRoleAs' WHERE `id`='$userId' ");
    }
    else if ($memberNewRoleAs == 3) {
        $updateMemberStatus_run = mysqli_query($con, "UPDATE `users` SET `role_as`='2', `status`='$memberNewRoleAs' WHERE `id`='$userId' ");
    } else {
        $updateMemberStatus_run = mysqli_query($con, "UPDATE `users` SET `role_as`='$memberNewRoleAs', `status`='$memberNewRoleAs' WHERE `id`='$userId' ");
    }
    redirecter("viewMember.php?id=$userId", "Member Status Updated Successfully");
}
/** UPDATE PROFILE, DP & ID CARD are all handled in code.php in excos folder */
/**INSERT OFFICE DATA */
else if(isset($_POST['insert_officedata_btn'])){
    $officeEmail = $_POST['officeEmail'];
    $officePhone = $_POST['officePhone'];
    $userAddress = $_POST['userAddress'];
    $officeFacebook = $_POST['officeFacebook'];
    $officeInstagram = $_POST['officeInstagram'];
    $officeX = $_POST['officeX'];
    $officeWhatsapp = $_POST['officeWhatsapp'];
    $officeYoutube = $_POST['officeYoutube'];

    $updateOfficeData_run = mysqli_query($con, "INSERT INTO `organization_info`(`office_address`, `office_phone`, `office_email`, `office_facebook`, `office_instagram`, `office_x`, `office_whatsapp`) 
    VALUES ('$userAddress','$officePhone','$officeEmail','$officeFacebook','$officeInstagram','$officeX','$officeWhatsapp','$officeYoutube') ");
    if ($updateOfficeData_run){
        redirecter("settings.php", "Organization Data Updated Successfully");
    } else {
        redirecter("settings.php", "Unable to Update Organization Info.");
    }
}
/**UPDATE OFFICE DATA */
else if(isset($_POST['officedata_update_btn'])){
    $officeId = $_POST['officeId'];
    $officeEmail = $_POST['officeEmail'];
    $officePhone = $_POST['officePhone'];
    $userAddress = $_POST['userAddress'];
    $officeFacebook = $_POST['officeFacebook'];
    $officeInstagram = $_POST['officeInstagram'];
    $officeX = $_POST['officeX'];
    $officeWhatsapp = $_POST['officeWhatsapp'];
    $officeYoutube = $_POST['officeYoutube'];

    $updateOfficeData_run = mysqli_query($con, "UPDATE `organization_info` SET `office_address`='$userAddress',`office_phone`='$officePhone',`office_email`='$officeEmail',`office_facebook`='$officeFacebook',`office_instagram`='$officeInstagram',`office_x`='$officeX',`office_whatsapp`='$officeWhatsapp',`office_youtube`='$officeYoutube' WHERE `id`='$officeId' ");
    if ($updateOfficeData_run){
        redirecter("settings.php", "Organization Data Updated Successfully");
    } else {
        redirecter("settings.php", "Unable to Update Organization Info.");
    }
}
/**OFFICE DATA CANCEL BUTTON */
else if(isset($_POST['officedata_cancel_btn'])){
    redirecter("settings.php", "Changes reversed");
}
else{
    header('Location: ../index.php');
}

?>