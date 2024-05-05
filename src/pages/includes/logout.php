<?php
    //Remove the variable "accountInfo" in Cookie to log out
    if(isset($_COOKIE["accountInfo"])) {
        unset($_COOKIE['accountInfo']); 
        setcookie('accountInfo', '', -1, '/'); 
    }

    header('location:../index.php');
?>