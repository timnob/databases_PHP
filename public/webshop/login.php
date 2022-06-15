<?php
include('./inc/config.php');
session_start();

if(isset($_POST['username']) ) {
	$naam=$_POST['username'];
	$pass=$_POST['password'];
	$check = $check.'config.php geladen.<br>';
	$servernaam = "localhost";
	$gebruikersnaam = "root";
	$wachtwoord = "";
	$database = "webshop";
	$DBverbinding = mysqli_connect($servernaam, $gebruikersnaam, $wachtwoord, $database);

if (!$DBverbinding) {
    die("connectie database mislukt: " . mysqli_connect_error());
}
else {
    $check = $check.'connectie database gelukt.<br>';
}
	$sql="SELECT * FROM accounts WHERE username='".$naam."'AND password='".$pass."'";
	$records = mysqli_query($DBverbinding, $sql);      
	if (mysqli_num_rows($records) == 1) {
	  $_SESSION["username"]= "$naam";
	  header("Location: private.php");
	  exit();
	}
	if ($_POST['password'] === $password) {
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		echo 'Welcome ' . $_SESSION['name'] . '!';
	} else {

		header("Location: loginhome.html");
	}
} else {

	header("Location: loginhome.html");
}

?>


