<?php
error_reporting(E_ALL & ~E_NOTICE);
require('php/database.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Startpagina</title>
        <link rel="stylesheet" type="text/css" href="css/design.css">
    </head>
    <body>
        <div id="container">
            <h1>
                <?php echo 'een <strong>klein</strong> stukje PHP';?>
            </h1>
            <img src="images/cartoon.jpg">
        </div>
    </body>
</html>