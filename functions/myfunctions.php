<?php
session_start();
include('../config/dbcon.php');
/** function to get all data from a database */
function getAllFromDatabase($table){
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}
/**GET ITEMS FROM DB BY GIVEN ID */
function getAllById($table,$id){
    global $con;
    $query_id = "SELECT * FROM $table WHERE id='$id' ";
    return $query_id_run = mysqli_query($con, $query_id);
}
/**takes in a message to be displayed and the url to redirect to */
function redirecter($url, $message){
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit(0);
}
/**ALL REGISTERED CUSTOMERS */
function getAllCustomers(){
    global $con;
    $allCustomers_qry = "SELECT * FROM `users` WHERE `role_as`='0' || `role_as`='9' AND `status`='0' ";
    return $allCustomers_qry_run = mysqli_query($con, $allCustomers_qry);
}
/**ALL REGISTERED CUSTOMERS */
function getAllUsersVV(){
    global $con;
    $id = $_SESSION['auth_user']['user_id'];
    $userVV_qry = "SELECT u.*,v_v.excos_image,v_v.excos_address FROM users u, excos_verification v_v WHERE u.id=v_v.user_id AND v_v.user_id='$id' ";
    return $userVV_qry_run = mysqli_query($con, $userVV_qry);
}
/**get all states */
function getAllStates(){
    global $con;
    $getStates_qry = "SELECT * FROM `nigerian_states` ";
    return $getStates_qry_run = mysqli_query($con, $getStates_qry);
}

?>