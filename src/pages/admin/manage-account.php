<?php 
include 'partials/header.php';


require '../config.php';
//Connect to the database

$conn = mysqli_connect($servername, $db_username, $db_password) or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, $dbname) or die(mysqli_error());

/* $conn = mysqli_connect('localhost', 'root', 'U-MtanWDSRS20040619') or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, 'cisc3003') or die(mysqli_error()); */
?>
<div class="main-content">
	<div class="wrapper">
		<h1>Manage Admin</h1>
		
		<br>
		
		<?php 
		if(isset($_SESSION['add'])) {
		    echo $_SESSION['add']; //Displaying Session Message
		    unset($_SESSION['add']); //Removing Session Message
		}
		
		if(isset($_SESSION['delete'])) {
		    echo $_SESSION['delete']; //Displaying Session Message
		    unset($_SESSION['delete']); //Removing Session Message
		}
		
		if(isset($_SESSION['update'])) {
		    echo $_SESSION['update']; //Displaying Session Message
		    unset($_SESSION['update']); //Removing Session Message
		}
		
		if(isset($_SESSION['user-not-found'])) {
		    echo $_SESSION['user-not-found'];
		    unset($_SESSION['user-not-found']);
		}
		
		if(isset($_SESSION['pwd-not-match'])) {
		    echo $_SESSION['pwd-not-match'];
		    unset($_SESSION['pwd-not-match']);
		}
		
		if(isset($_SESSION['change-pwd'])) {
		    echo $_SESSION['change-pwd'];
		    unset($_SESSION['change-pwd']);
		}

		if(isset($_SESSION['login'])) {
		    echo $_SESSION['login'];
		    unset($_SESSION['login']);
		}
		?>
		
		<br><br>
		
		<!-- Button to Add Account -->
		<a href="add-account.php" class="btn-primary">Add Account</a>
		
		<br><br><br>
		
		<table class="tbl-full">
			<tr>
				<th>S.N.</th>
				<th>Email</th>
				<th>Username</th>
				<th>Is Admin</th>
				<th>Actions</th>
			</tr>
			
			<?php 
			//Query to Get all Admin
			$sql = "SELECT * FROM user";
			//Execute the Query
			$res = mysqli_query($conn, $sql);
			
			//Check whether the Query is Executed or Not
			if($res == TRUE) {
			     //Count Rows to Check whether we have data in database or not
			     $count = mysqli_num_rows($res); //Function to get all the rows in database
			     
			     $sn = 1; //Create a variable and assign the value
			     
			     //Check the num of rows
			     if($count > 0) {
			         //We have data in database
			         while($rows = mysqli_fetch_assoc($res)) {
			             //Using while loop to get all the data from database
			             //And while loop will run as long as we have data in database
			             
			             //Get individual data
			             $email = $rows['Email'];
			             $username = $rows['user_name'];
						 $admin = $rows['isadmin'];
			             
			             //Display the value in our table
			             ?>
			             <tr>
            				<td><?php echo $sn++;?>. </td>
            				<td><?php echo $email;?></td>
            				<td><?php echo $username;?></td>
							<td><?php if($admin) echo "Yes"; else echo "No";?></td>
            				<td>
            					<a href="update-password.php?user=<?php echo $username;?>" class="btn-primary">Change Password</a>
            					<a href="update-account.php?user=<?php echo $username;?>" class="btn-secondary">Update</a>
            					<a href="delete-account.php?user=<?php echo $username;?>" class="btn-danger">Delete</a>
            				</td>
            			 </tr>
			             <?php 
			         }
			     }
			     else {
			         //We do not have data in database
			     }
			}
			?>

		</table>
	</div>
</div>
<!-- Main Content Section Ends -->
		
<?php include 'partials/footer.php'?>
</body>
</html>