<?php
$check = 'mysql:dbname=tshirt;host=localhost';
$gebruikersnaam = 'root';
$wachtwoord = '';

try
{
	$db = new PDO($check,$gebruikersnaam,$wachtwoord);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "PDO error".$e->getMessage();
	die();
}

define('PRODUCT_IMG_URL','product-images/');

?>