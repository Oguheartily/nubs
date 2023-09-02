<?php
// code for processing inputs to database

use function PHPSTORM_META\type;

include('../config/dbcon.php');
include('../functions/excosfunctions.php');

/** ADD PRODUCT PROCESSING */
if(isset($_POST['add_post_btn'])){
    $category_id = $_POST['category_id'];
    $vendorId = $_POST['vendorId'];
    $heading = $_POST['heading'];
    $content = $_POST['content'];

    /**get name of uploaded image */
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    // $filename = $image;
    $filename = time().'.'.$image_ext;

    if($productname != "" && $small_description != "" && $image != "" ){

        $prod_query = "INSERT INTO `products`(`category_id`, `vendor_id`,`product_name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `popular`, `meta_title`, `meta_keywords`, `meta_description`) VALUES ('$category_id','$vendorId','$productname','$slug','$small_description','$description','$original_price','$selling_price','$filename','$qty','$status','$trending','$popular','$meta_title','$meta_keywords','$meta_description')";
        $product_query_run = mysqli_query($con, $prod_query);

        if($product_query_run){
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirecter("add-product.php", "Product added successfully");
        }
        else{
            redirecter("add-product.php", "Unable to add product, Something went wrong");
        }
    }
    else{
        redirecter("add-product.php", "The folllowing fields cannot be empty: product Name, small description, image.");
    }
}
/** EDIT PRODUCT */
else if(isset($_POST['update_post_btn'])){
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $productname = $_POST['productname'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $status = isset($_POST['status']) ? '1': '0';
    $trending = isset($_POST['trending']) ? '1': '0';
    $popular = isset($_POST['popular']) ? '1': '0';
    $meta_title = $_POST['meta_title'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_description'];

    /**get name of uploaded image */
    /** get old image */
    $old_product_image = $_POST['old_product_image'];
    /**get name of uploaded image */
    $new_image = $_FILES['image']['name'];
    if($new_image != ""){
        // $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else {
        $update_filename = $old_product_image;
    }
    $path = "../uploads";
    $prod_update_query = "UPDATE `products` SET `category_id`='$category_id', `product_name`='$productname', 
                 `slug`='$slug', `small_description`='$small_description', `description`='$description', 
                 `original_price`='$original_price', `selling_price`='$selling_price', `image`='$update_filename', `qty`='$qty', 
                 `status`='$status', `trending`='$trending', `popular`='$popular', `meta_title`='$meta_title', 
                 `meta_keywords`='$meta_keywords', `meta_description`='$meta_description' WHERE `id`='$product_id'";
        
    $product_update_query_run = mysqli_query($con, $prod_update_query);

    if($product_update_query_run){
        if($new_image != ""){
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            /**since new image exist, delete the old image from the uploads folder */
            if(file_exists("../uploads/".$old_product_image)){
                unlink("../uploads/".$old_product_image);
            }
        }
        redirecter("edit-product.php?id=$product_id", "Product Updated successfully");
    }
    else{
        redirecter("edit-product.php?id=$product_id", "Unable to Update Product, Something went wrong");
    }
}
/** DELETE PRODUCT, CONFIRMED BY AJAX BEFORE DELETION */
else if(isset($_POST['delete_product_btn'])){
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    /**check database for image name of id to be deleted */
    $product_query = "SELECT * FROM `products` WHERE id='$product_id' ";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image_to_deleted = $product_data['image'];
    /**query that deleted the selected row frow db */
    $delete_query = "DELETE FROM `products` WHERE id='$product_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    if($delete_query_run){
        /**if file with image name exist delete image from uploads 
         * folder after deleting product from database */
        if(file_exists("../uploads/".$image_to_deleted)){
            unlink("../uploads/".$image_to_deleted);
        }
        // $_SESSION['message'] = "product Deleted Successfully!";
        // header("Location: products.php");
        echo 200;
    }
    else{
        // $_SESSION['message'] = "Unable to Delete item, Something went wrong";
        // header("Location: products.php");
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