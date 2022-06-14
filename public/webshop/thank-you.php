<?php 
    session_start();

     if(!isset($_SESSION['confirm_order']) || empty($_SESSION['confirm_order']))
     {
         header('location:index.php');
         exit();
     }

    require_once('./inc/config.php');    

    
	
	
    include('layouts/header.php');
?>
<div class="row">
    <div class="col-md-12">
        <h1>Bedankt!</h1>
        <p>
            Uw order is verwerkt
            <?php unset($_SESSION['confirm_order']);?>
        </p>
    </div>
</div>
<?php include('layouts/footer.php'); ?>    