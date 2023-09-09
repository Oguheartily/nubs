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
/**GET ALL USERS */
function getAllFromUsers(){
    global $con;
    $excoId = $_SESSION['auth_user']['user_id'];
    $query_run = mysqli_query($con,"SELECT * FROM `users` WHERE `id`='$excoId' ");
    return $query_run;
}

/*********************************************************************
   Purpose  : function to truncate text and show read more links.
   Parameters     : @$story_desc : story description
   @$link         : story link
   @$targetFile   : target redirect file name
   @$id           : story id
   Returns  : string

   example: 
   echo readMoreFunction($row['story_desc'],"story.php","story_id",$row['story_id']); }
 ***********************************************************************/
function readMoreFunction($story_desc, $link, $targetFile, $id)
{
    //Number of characters to show  
    $chars = 80;
    $story_desc = substr($story_desc, 0, $chars);
    $story_desc = substr($story_desc, 0, strrpos($story_desc, ' '));
    $story_desc = $story_desc . " . . .<span class='btn btn-sm btn-primary fs-0'><a href='$link?$targetFile=$id' class='text-white text-decoration-none'>Read More...</a></span>";
    return $story_desc;
}

/**ALL REGISTERED MEMBERS */
function getAllMembers(){
    global $con;
    return $allMembers_qry_run = mysqli_query($con, "SELECT * FROM `users` WHERE `role_as`='0' AND `status`='0' ");
}
/**ALL EXCOS */
function getAllExcos(){
    global $con;
    return $allExcos_qry_run = mysqli_query($con, "SELECT * FROM `users` WHERE `role_as`='2' ");
}
/**ALL REGISTERED CURRENT EXCOS */
function getAllCurrentExcos(){
    global $con;
    return $allMembers_qry_run = mysqli_query($con, "SELECT * FROM `users` WHERE `role_as`='2' AND `status`='2' ");
}
/**ALL REGISTERED CURRENT EXCOS */
function getAllAlumniExcos(){
    global $con;
    return $allMembers_qry_run = mysqli_query($con, "SELECT * FROM `users` WHERE `role_as`='2' AND `status`='3' ");
}
/**CHECK ID BEFORE PROCEEDING TO VIEW MEMBER DETAILS */
function checkMemberIdValidity($customerId){
    global $con;
    return $customerId_query_run = mysqli_query($con, "SELECT * FROM `users` WHERE `id`='$customerId' ");
}


?>