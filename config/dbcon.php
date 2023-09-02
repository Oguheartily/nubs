<?php 
    $host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "nubs-bille";

    // check if connection is successful
    try {
        $con = mysqli_connect($host, $db_user, $db_pass, $db_name);
        if($con){
            // echo "Connection Successful";
        }
    } catch (mysqli_sql_exception) {
        echo "Sorry! Unable to connect to Database";
    }
?>