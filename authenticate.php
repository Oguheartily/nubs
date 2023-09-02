<?php 
if(!isset($_SESSION['auth'])){
    // header('Location: login.php');
    redirecter("login.php",'Login to continue');
}

?>