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
/**GET ALL DATA FROM USERS TABLE */
function getAllFromUsers(){
    global $con;
    $excoId = $_SESSION['auth_user']['user_id'];
    $query_run = mysqli_query($con,"SELECT * FROM `users` WHERE `id`='$excoId' ");
    return $query_run;
}
/**GET ALL POSTS OF A PARTICULAR EXCO */
function getAllMyPosts(){
    global $con;
    $excoId = $_SESSION['auth_user']['user_id'];
    return $myPosts_run = mysqli_query($con, "SELECT * FROM `events_post` WHERE `user_id`='$excoId' ORDER BY `created_date` DESC ");
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
/**GET SITE LOGO */
function getSiteLogo(){
    global $con;
    return $siteLogo_run = mysqli_query($con, "SELECT * FROM `logo_favicon` WHERE `icon_name`='logo' ");
}
/**GET SITE FAVICON */
function getSiteFavicon(){
    global $con;
    return $siteLogo_run = mysqli_query($con, "SELECT * FROM `logo_favicon` WHERE `icon_name`='favicon' ");
}
?>