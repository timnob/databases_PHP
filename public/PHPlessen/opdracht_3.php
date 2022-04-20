<?PHP
$titel=str_replace("_"," ",substr(__FILE__,strpos(__FILE__,"opdracht"),-4));
include('opdracht_begin.php');
/****************************
TYP HIERONDER JOUW PHPCODE
****************************/
$a= 5;
$b= 4;
$waarde=9/10;
$kwad=pow($waarde,2);
$rec=1/$kwad;
$afgerond=round($rec,7);
$floor=floor(1000000*$rec)/1000000;
$c= sqrt(pow($a,2) + pow($b,2));
$mod = fmod(14,3);
echo "Het kwadraat van $waarde is $kwad.<br>
      Het omgekeerde daarvan is (afgerond:) $afgerond<br>
      Afgerond is dat $floor<br>
      Het antwoord door Stelling van Piet is  $c <br>
      De restwaarde is  $mod";

/****************************
EINDE VAN JOUW PHPCODE
****************************/
include('opdracht_eind.php');
?>