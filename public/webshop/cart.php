<?php 
    session_start();
    require_once('./inc/config.php');    

    if(isset($_GET['action'],$_GET['item']) && $_GET['action'] == 'remove')
    {
        unset($_SESSION['cart_items'][$_GET['item']]);
        header('location:cart.php');
        exit();
    }
   
    if(isset($_GET['action'],$_GET['item']) && $_GET['action'] == 'update') 
    {
        $quantity= $_SESSION['qty'];
        if (isset($_SESSION['cart_items']) && $quantity > 0) {
            
            $_SESSION['cart_items'] = $quantity;
        }
    }
   	
    include('layouts/header.php');

?>
<div class="row1">
    <div class="col-md-12"style="padding: 10em;">
        <?php if(empty($_SESSION['cart_items'])){?>
        <table class="table">
            <tr>
                <td>
                    <p>Uw winkelwagen is leeg</p>
                </td>
            </tr>
        </table>
        <?php }?>
        <?php if(isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0){?>
        <table class="table" align="">
           <thead>
                <tr>
                    <th>Product</th>
                    <th>Prijs</th>
                    <th>Hoeveelheid</th>
                    <th>Totaal aankoopbedrag</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $totalCounter = 0;
                    $itemCounter = 0;
                    foreach($_SESSION['cart_items'] as $key => $item){

                     $imgUrl = PRODUCT_IMG_URL.str_replace(' ','-',strtolower($item['product_name']))."/".$item['product_img'];   
                    
                    $total = $item['product_price'] * $item['qty'];
                    $totalCounter+= $total;
                    $itemCounter+= $item['qty'];
                    ?>
                    <tr>
                        <td>
                            <img src="<?php echo $imgUrl; ?>" class="rounded img-thumbnail mr-2" style="width: 2.5em;"><?php echo $item['product_name'];?>
                            <a href="cart.php?action=remove&item=<?php echo $key?>" class="text-danger">
                                <img class="bi bi-trash-fill" src="images/prul.png"></img>
                            </a>
                       
                        </td>
                        <td>
                            $<?php echo $item['product_price'];?>
                        </td>
                        <td>
                            <input type="number" class="cart-qty-single" data-item-id="<?php echo $key?>" value="<?php echo $item['qty'];?>" min="1" max="1000" >
                        </td>
                        <td>
                            <?php echo $total;?>
                        </td>
                        
                       
                    </tr>
                <?php }?>
                <tr class="border-top border-bottom">
                    <td></td>
                    <td></td>
                    <td>
                        <strong>
                            <?php 
                                echo ($itemCounter==1)?$itemCounter.' item':$itemCounter.' items'; ?>
                        </strong>
                    </td>
                    <td><strong>$<?php echo $totalCounter;?></strong></td>
                </tr> 
                </tr>
            </tbody> 
        </table>
        <div class="row">
				<a href="checkout.php">
					<button class="btn btn-primary btn-lg float-right">Betaling</button>
				</a>
            </div>
            
        </div>
        
        <?php }?>
    </div>
</div>
<?php include('layouts/footer.php');?>