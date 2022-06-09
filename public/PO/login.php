<?php
include('database.php');
session_start();

if(isset($_POST['username'])) {
	$naam=$_POST['username'];
	$pass=$_POST['password'];
	$sql="SELECT * FROM accounts WHERE username='".$naam."'AND password='".$pass."'";
	$records = mysqli_query($DBverbinding, $sql);      
	if (mysqli_num_rows($records) == 1) {
	  $_SESSION["username"]= "$naam";
	  header("Location: private.php");
	  exit();
	}
	if ($_POST['password'] === $password) {
		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		echo 'Welcome ' . $_SESSION['name'] . '!';
	} else {
		// Incorrect password
		header("Location: login.html");
	}
} else {
	// Incorrect username
	header("Location: login.html");
}

?>

