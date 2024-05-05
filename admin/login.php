<?php
//Start Session
session_start();

$conn = mysqli_connect('localhost', 'root', 'sqHinL_2003717') or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, 'cisc3003') or die(mysqli_error());

?>

<html lang="en">
	<head>
		<title>Login - Admin</title>
		<link rel="stylesheet" href="../css/admin.css">
	</head>
	
	<body>
	
		<div class="login">
			<h1 class="text-center">Login</h1>
			<br><br>
			
			<?php 
			if(isset($_SESSION['login'])) {
			    echo $_SESSION['login'];
			    unset($_SESSION['login']);
			}
			
			if(isset($_SESSION['no-login-message'])) {
			    echo $_SESSION['no-login-message'];
			    unset($_SESSION['no-login-message']);
			}
			?>
			
			<br><br>
			
			<!-- Login Form Starts Here -->
			<form action="" method="POST" class="text-center">
				Username: <br>
				<input type="text" name="username" placeholder="Enter Username"><br><br>
				Password: <br>
				<input type="password" name="password" placeholder="Enter Password"><br><br>
				
				<input type="submit" name="submit" value="Login" class="btn-primary">
				<br><br>
			</form>
			<!-- Login Form Ends Here -->
			
			<p class="text-center">Created By - Team 07</p>
		</div>
		
	</body>
</html>

<?php 
    
    //Check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    //Process for Login
    //1. Get the data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //2. SQL to check whether the user with username and password exists or not
    $sql = "SELECT * FROM user WHERE user_name='$username' AND password='$password'";
    
    //3. Execute the query
    $res = mysqli_query($conn, $sql);
    
    //4. Count rows to check whether the user exists or not
    $count = mysqli_num_rows($res);
    
    if ($count == 1) {
        //User available and login success
        $_SESSION['login'] = "<div class='success'>Login Successfully.</div>";
        $_SESSION['user'] = $username; //To check whether the user is logged in or not and logout with unset it
        
        //Redirect to home page/dashboard
        header('location: manage-account.php');
    }
    else {
        //User not available
        $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
        //Redirect to home page/dashboard
        header('location: login.php');
    }
}

?>