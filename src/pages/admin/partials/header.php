<?php 
session_start();
include 'login-check.php';
?>

<html>
	<head>
		<title>Food Order Website - Home Page</title>
		
		<link rel="stylesheet" href="../style/admin.css">
	</head>
	
	<body>
		<!-- Menu Section Starts -->
		<div class="menu text-center">
			<div class="wrapper">
				<ul>
					<li><a href="manage-account.php">Account Manager</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
		<!-- Menu Section Ends -->