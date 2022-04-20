<?PHP
$titel=str_replace("_"," ",substr(__FILE__,strpos(__FILE__,"opdracht"),-4));
include('opdracht_begin.php');
/****************************
TYP HIERONDER JOUW PHPCODE
****************************/

$leerling=array('nr' => 150210, 'voornaam' => 'Tim', 'achternaam' => 'Nobbe', 'jaar' => '10-06-2003');

echo "<pre>Leerling:";
print_r($leerling);
echo "</pre>";
echo "<h2>".$leerling['voornaam']." ".$leerling['achternaam']." is geboren op ".$leerling['jaar']."</h2>";
/****************************
EINDE VAN JOUW PHPCODE
****************************/
include('opdracht_eind.php');
?>