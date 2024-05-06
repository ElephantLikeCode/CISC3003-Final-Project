<?php

//Authorization - Access control
//Check whether the user is logged in or not
if (!isset($_SESSION['user'])) {
    //If user session is not set
    //User is not logged in
    //Redirect to login page with message
    $_SESSION['no-login-message'] = "<div class='error'>Please login to access Admin Panel.</div>";
    //Redirect to login page
    header('location: login.php');
}

?>