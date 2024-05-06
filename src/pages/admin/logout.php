<?php
    session_start();

    //1. Destory the session
    session_destroy(); //Unsets $_SESSION['user']
    
    //2. Redirect to login page
    header('location: login.php');
?>