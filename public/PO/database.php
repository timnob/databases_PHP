<?php
$check = $check.'database.php geladen.<br>';
$servernaam = "localhost";
$gebruikersnaam = "root";
$wachtwoord = "";
$database = "Shop";
$DBverbinding = mysqli_connect($servernaam, $gebruikersnaam, $wachtwoord, $database);

if (!$DBverbinding) {
    die("connectie database mislukt: " . mysqli_connect_error());
}
else {
    $check = $check.'connectie database gelukt.<br>';
}
?>