<?php
session_start();
include('config/dbcon.php');

/**takes in a message to be displayed and the url to redirect to */
    function redirecter($url,$message){
        $_SESSION['message'] = $message;
        header('Location: '.$url);
        exit(0);
    }
/**GET ALL USERS IN CARTS TABLE */
function getAllFromUsers(){
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $user_query = "SELECT * FROM users WHERE id='$userId' ";
    return $user_query_run = mysqli_query($con, $user_query);
}
/**GET ALL APPROVED EXCOSS */
/**to get the business name stored under user_name and each photo that follows it */
function displayAllExcos(){
    global $con;
    $displayExcos_qry = "SELECT * FROM `users` WHERE role_as='2' AND `status`='2' ";
    return $displayExcos_qry_run = mysqli_query($con, $displayExcos_qry);
}
/**get all states */
function getAllStates(){
    global $con;
    $getStates_qry = "SELECT * FROM `nigerian_states` ";
    return $getStates_qry_run = mysqli_query($con, $getStates_qry);
}
/**get all Compounds */
function getAllCompounds(){
    global $con;
    $getPolo_qry = "SELECT * FROM `bille_compounds` ";
    return $getPolo_qry_run = mysqli_query($con, $getPolo_qry);
}
/**get aNubsHierarchy */
function getNubsHierarchy(){
    global $con;
    $getHierarchy_qry = "SELECT * FROM `nubs_hierarchy` ";
    return $getHierarchy_qry_run = mysqli_query($con, $getHierarchy_qry);
}
?>