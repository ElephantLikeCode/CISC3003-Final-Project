<?php 
include 'partials/header.php';

require '../config.php';
//Connect to the database

$conn = mysqli_connect($servername, $db_username, $db_password) or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, $dbname) or die(mysqli_error());
?>

<div class="main-content">
	<div class="wrapper">
		<h1>Add Account</h1>
		
		<br><br>
		
		<?php 
		//Checking whether the Session is Set or Not
		if(isset($_SESSION['add'])) {
		    echo $_SESSION['add']; //Displaying Session Message
		    unset($_SESSION['add']); //Removing Session Message
		}
		?>
		
		<br><br>
		
		<form action="" method="POST">
			
			<table class="tbl-30">
				<tr>
					<td>Full Name: </td>
					<td>
						<input type="email" name="email" placeholder="Enter Your Email" required>
					</td>
				</tr>
				<tr>
					<td>Username: </td>
					<td>
						<input type="text" name="username" placeholder="Your Username" required>
					</td>
				</tr>
				<tr>
					<td>Password: </td>
					<td>
						<input type="password" name="password" placeholder="Your Password" required>
					</td>
				</tr>
				<tr>
					<td>Is Admin: </td>
					<td>
						<input type="radio" name="admin" value="1"> Yes
						<input type="radio" name="admin" value="0"> No
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Account" class="btn-secondary">
					</td>
				</tr>
			</table>
			
		</form>
		
	</div>
</div>

<?php 
//Process the Value from Form and Save it in Database

//Check whether the button is clicked or not  
if(isset($_POST['submit'])) {
    //Button Clicked
    //echo "Button Clicked";
    
    //1. Get the Data from Form
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
	
	if (isset($_POST['admin'])){
		$admin = $_POST['admin'];
	}
	else {
		$admin = 0;
	}
    
    //2. SQL Query to Save the Data into Database
    $sql = "INSERT INTO user SET
        Email = '$email',
        user_name = '$username',
        password = '$password',
		isadmin = '$admin'
    ";
    
    //3. Executing Query and Saving Data into Database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    
    //4. Check whether the (Query is Excuted) data is inserted or not and display appropriate message
    if ($res == TRUE) {
        //Data Inserted
        //echo "Data Inserted";
        
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='success'>Account Added Successfully.</div>";
        //Redirect Page to Manage Account
        header('location: manage-account.php');
    }
    else {
        //Failed to Insert Data
        //echo "Failed to Insert Data";
        
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='error'>Failed to Add Account.</div>";
        //Redirect Page to Manage Account
        header('location: add-account.php');
    }
}
?>

<?php include 'partials/footer.php';?>