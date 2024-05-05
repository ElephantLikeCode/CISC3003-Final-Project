<?php
session_start();

//Include constant.php file here
$conn = mysqli_connect('localhost', 'root', 'sqHinL_2003717') or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, 'cisc3003') or die(mysqli_error());

//1. Get the id of Account to be deleted
$username = $_GET['user'];
    
//2. Create SQL query to delete Account
$sql = "DELETE FROM user WHERE user_name='$username'";

//Execute the query
$res = mysqli_query($conn, $sql);

//Check whether the query executed successfully or not
if($res == TRUE) {
    //Query executed successfully and Account is deleted
    //echo "Account Deleted";
    
    //Create session variable to display message
    $_SESSION['delete'] = '<div class="success">Account Deleted Successfully.</div>';
    //Redirect to manage account page
    header('location: manage-account.php');
}
else {
    //Failed to delete Account
    //echo "Failed to Delete Account";
    $_SESSION['delete'] = '<div class="error">Failed to Delete Account. Try Again Later.</div>';
    header('location: manage-account.php');
}

//3. Redirect to manage Account page with message

?>