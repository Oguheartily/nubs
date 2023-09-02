<?php
session_start();
include('../config/dbcon.php');

/**takes in a message to be displayed and the url to redirect to */
function redirecter($url, $message){
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit(0);
}
/**Return currently signed in excos id */
function returnExcosId(){
    if(isset($_SESSION['auth'])){
        $id = $_SESSION['auth_user']['user_id'];
    }
    return $id;
}
/**GET ALL Excos */
function getAllFromUsers(){
    global $con;
    $excoId = $_SESSION['auth_user']['user_id'];
    $query_run = mysqli_query($con,"SELECT * FROM `users` WHERE `id`='$excoId' ");
    return $query_run;
}
/**Return currently signed in vendor id */
function returnVendorId(){
    if(isset($_SESSION['auth'])){
        $id = $_SESSION['auth_user']['user_id'];
    }
    return $id;
}
?>