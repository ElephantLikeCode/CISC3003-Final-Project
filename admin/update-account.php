<?php 
include 'partials/header.php';

$conn = mysqli_connect('localhost', 'root', 'sqHinL_2003717') or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, 'cisc3003') or die(mysqli_error());
?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Account</h1>
		
		<br><br>
		
		<?php 
		//1. Get the id of selected Account
		$username = $_GET['user'];
		
		//2. Create SQL query to get the details
		$sql = "SELECT * FROM user WHERE user_name='$username'";

        //Execute the query
        $res = mysqli_query($conn, $sql);
        
        //Check whether the query is executed or not
        if ($res == TRUE) {
            //Check whether the data is avaliable or not
            $count = mysqli_num_rows($res);
            //Check whether we have Account data or not
            if ($count == 1) {
                //Get the details
                //echo  "Account Available";
                $row = mysqli_fetch_assoc($res);
                
                $email = $row['Email'];
                $username = $row['user_name'];
            }
            else {
                //Redirect to manage Account page
                header('location: manage-account.php');
            }
        }
		?>
		
		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Email: </td>
					<td>
						<input type="text" name="email" value="<?php echo $email;?>">
					</td>
				</tr>
				<tr>
					<td>Username: </td>
					<td>
						<input type="text" name="username" value="<?php echo $username;?>">
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<input type="hidden" name="old_username" value="<?php echo $username;?>">
						<input type="submit" name="submit" value="Update Account" class="btn-secondary">
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
    //Get all the values from form to update
    $new_username = $_POST['username'];
    $old_username = $_POST['old_username'];
    $email = $_POST['email'];
    
    //Create a SQL query to update Account
    $sql = "UPDATE user SET
        Email = '$email',
        user_name = '$new_username'
        WHERE user_name = '$old_username'
    ";
    
    //Execute the query
    $res = mysqli_query($conn, $sql);
    
    //Check wheter the query executed successfully or not
    if ($res == TRUE) {
        //Query executed and Account updated
        $_SESSION['update'] = "<div class='success'>Account Updated Successfully.</div>";
        //Redirect Page to Manage Account
        header('location: manage-account.php');
    }
    else {
        //Query executed and Account updated
        $_SESSION['update'] = "<div class='error'>Failed to Update Account.</div>";
        //Redirect Page to Manage Account
        header('location: manage-account.php');
    }
}

?>

<?php include('partials/footer.php')?>