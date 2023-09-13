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
/**Function to create readmore on long posts */
// echo readMoreFunction($row['story_desc'],"story.php","story_id",$row['story_id']); }
function readMoreFunction($story_desc, $link, $targetFile, $id)
{
    //Number of characters to show  
    $chars = 80;
    $story_desc = substr($story_desc, 0, $chars);
    $story_desc = substr($story_desc, 0, strrpos($story_desc, ' '));
    $story_desc = $story_desc . " . . .<span class='btn btn-sm btn-primary fs-0'><a href='$link?$targetFile=$id' class='text-white text-decoration-none'>Read More...</a></span>";
    return $story_desc;
}
/** get all posts which are marked as important, ie status as 1
 */
function getAllPosts() {
    global $con;
    $postsqry_run = mysqli_query($con, "SELECT ec.post_category, ep.* FROM events_post ep, event_categories ec WHERE ep.post_category_id=ec.id ");
    return $postsqry_run;
}
    /** get all posts which are marked as important, ie status as 1
     */
function getAllImportantPosts() {
    global $con;
    $postsqry_run = mysqli_query($con, "SELECT ec.post_category, ep.* FROM events_post ep, event_categories ec WHERE ep.status='1' AND ep.post_category_id=ec.id ");
    return $postsqry_run;
}
/**Single event Viewer */
function getSinglePost($thisPostId) {
    global $con;
    $postsqry_run = mysqli_query($con, "SELECT ec.post_category, ep.* FROM events_post ep, event_categories ec WHERE ep.id=$thisPostId AND ep.post_category_id=ec.id ");
    return $postsqry_run;
}
/**Single event Viewer */
function getExcosOfServiceYear($getServiceYear) {
    global $con;
    return $postsqry_run = mysqli_query($con, "SELECT * FROM `users` WHERE `active_year`='$getServiceYear' AND `role_as`='1' || `active_year`='$getServiceYear' AND `role_as`='2' || `active_year`='$getServiceYear' AND `status`='3' ");
}
/**Organization information */
function getOrganizationInfo() {
    global $con;
    return $office_qry_run = mysqli_query($con, "SELECT * FROM `organization_info` ");
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