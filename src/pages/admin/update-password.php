<?php 
include 'partials/header.php';


require 'config.php';
//Connect to the database

$conn = mysqli_connect($servername, $db_username, $db_password) or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, $dbname) or die(mysqli_error());


/* $conn = mysqli_connect('localhost', 'root', 'U-MtanWDSRS20040619') or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, 'cisc3003') or die(mysqli_error()); */
?>

<div class="main-content">
	<div class="wrapper">
		<h1>Change Password</h1>
		
		<br><br>
		
		<?php 
		if(isset($_GET['user'])) {
		    $username = $_GET['user'];
		}
		?>
		
		<form action="" method="POST">
		
			<table class="tbl-30">
				<tr>
					<td>Old Password: </td>
					<td>
						<input type="password" name="current_password" placeholder="Current Password">
					</td>
				</tr>
				<tr>
					<td>New Password: </td>
					<td>
						<input type="password" name="new_password" placeholder="New Password">
					</td>
				</tr>
				<tr>
					<td>Confirm Password: </td>
					<td>
						<input type="password" name="confirm_password" placeholder="Confirm Password">
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $username;?>">
						<input type="submit" name="submit" value="Change Password" class="btn-secondary">
					</td>
				</tr>
			</table>
		
		</form>
	</div>
</div>

<?php 
    
//Check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    //echo "Button Clicked";
    
    //1. Get the data from form
    $username = $_GET['user'];
    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];
    
    //2. Check whether the user with current id and current password exists or not
    $sql = "SELECT * FROM user WHERE user_name='$username' AND password='$current_password'";
    
    //3. Check whether the new password and confirm password match or not
    $res = mysqli_query($conn, $sql);
    
    if ($res == TRUE) {
        //Check whether data is avaliable or not
        $count = mysqli_num_rows($res);
        
        if ($count == 1) {
            //User exists and password can be changed
            //echo "User Found";
            
            //Check whether the new password and confirm password match or not
            if ($new_password == $confirm_password) {
                //echo "Password Match";
                
                //Update the password
                $sql2 = "UPDATE user SET
                    password = '$new_password'
                    WHERE user_name = '$username'
                ";
                
                //Execute the query
                $res2 = mysqli_query($conn, $sql2);
                
                //Check whether the query executed or not
                if ($res2 == TRUE) {
                    //Redirect to manage admin page with success message
                    $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";
                    //Redirect the user
                    header('location: manage-account.php');
                }
                else {
                    //Redirect to manage admin page with error message
                    $_SESSION['pwd-not-match'] = "<div class='error'>Password did not Match.</div>";
                    //Redirect the user
                    header('location: manage-account.php');
                }
            }
            else {
                //Redirect to manage admin page with error message
                $_SESSION['pwd-not-match'] = "<div class='error'>Password did not Match.</div>";
                //Redirect the user
                header('location: manage-account.php');
            }
        }
        else {
            //User does not exist set message and redirect
            $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
            //Redirect the user
            header('location: manage-account.php');
        }
    }
    
    //4. change password if all above is true
}

?>

<?php include('partials/footer.php')?>