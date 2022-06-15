<?php 
    session_start();

    if(!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items']))
    {
        header('location:index.php');
        exit();
    }

    require_once('./inc/config.php');    
    $cartItemCount = count($_SESSION['cart_items']);

    //pre($_SESSION);

    if(isset($_POST['submit']))
    {
        if(isset($_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['address']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['address']))
        {
           $firstName = $_POST['first_name'];

           if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) == false)
           {
                 $errorMsg[] = 'Gebruik een geldig email adres';
           }
           else
           {
               //validate_input is a custom function
               //you can find it in helpers.php file
                $firstName  = ($_POST['first_name']);
                $lastName   = ($_POST['last_name']);
                $email      = ($_POST['email']);
                $address    = ($_POST['address']);
                $address2   = (!empty($_POST['address'])?($_POST['address']):'');
               

                $sql = 'insert into orders (first_name, last_name, email, address, address2,created_at) values (:fname, :lname, :email, :address, :address2, :created_at)';
                $statement = $db->prepare($sql);
                $params = [
                    'fname' => $firstName,
                    'lname' => $lastName,
                    'email' => $email,
                    'address' => $address,
                    'address2' => $address2,
                    'created_at'=> date('Y-m-d H:i:s'),
                ];

                $statement->execute($params);
                if($statement->rowCount() == 1)
                {
                    
                    $getOrderID = $db->lastInsertId();

                    if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items'] ))
                    {
                        $sqlDetails = 'insert into order_details (order_id, product_id, product_name, product_price, qty, total_price) values(:order_id,:product_id,:product_name,:product_price,:qty,:total_price)';
                        $orderDetailStmt = $db->prepare($sqlDetails);

                        $totalPrice = 0;
                        foreach($_SESSION['cart_items'] as $item)
                        {
                            $totalPrice+=$item['total_price'];

                            $paramOrderDetails = [
                                'order_id' =>  $getOrderID,
                                'product_id' =>  $item['product_id'],
                                'product_name' =>  $item['product_name'],
                                'product_price' =>  $item['product_price'],
                                'qty' =>  $item['qty'],
                                'total_price' =>  $item['total_price']
                            ];

                            $orderDetailStmt->execute($paramOrderDetails);
                        }
                        
                        $updateSql = 'update orders set total_price = :total where id = :id';

                        $rs = $db->prepare($updateSql);
                        $prepareUpdate = [
                            'total' => $totalPrice,
                            'id' =>$getOrderID
                        ];

                        $rs->execute($prepareUpdate);
                        
                        unset($_SESSION['cart_items']);
                        $_SESSION['confirm_order'] = true;
                        header('location:bedankt.php');
                        exit();
                    }
                }
                else
                {
                    $errorMsg[] = 'Probeer opnieuw!';
                }
           }
        }
        else
        {
            $errorMsg = [];

            if(!isset($_POST['first_name']) || empty($_POST['first_name']))
            {
                $errorMsg[] = 'Voornaam vereist';
            }
            else
            {
                $fnameValue = $_POST['first_name'];
            }

            if(!isset($_POST['last_name']) || empty($_POST['last_name']))
            {
                $errorMsg[] = 'Achternaam vereist';
            }
            else
            {
                $lnameValue = $_POST['last_name'];
            }

            if(!isset($_POST['email']) || empty($_POST['email']))
            {
                $errorMsg[] = 'Email vereist';
            }
            else
            {
                $emailValue = $_POST['email'];
            }

            if(!isset($_POST['address']) || empty($_POST['address']))
            {
                $errorMsg[] = 'Address vereist';
            }
            else
            {
                $addressValue = $_POST['address'];
            }

            if(isset($_POST['address2']) || !empty($_POST['address2']))
            {
                $address2Value = $_POST['address2'];
            }

        }
    }
	

	
    include('layouts/header.php');
?>
<div class="row mt-3">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Winkelwagen</span>
            <span class="badge badge-secondary badge-pill"><?php echo $cartItemCount;?></span>
          </h4>
          <ul class="list-group mb-3">
            <?php
                $total = 0;
                foreach($_SESSION['cart_items'] as $cartItem)
                {
                    $total+=$cartItem['total_price'];
                ?>
               
            <?php
                }
            ?>
           
            <li class="list-group-item d-flex justify-content-between">
              <span>Totaal bedrag</span>
              <strong>$<?php echo number_format($total,2);?></strong>
            </li>
          </ul>
        </div>
        <div class="col-md-8 ">
          <h4 class="mb-3">Factuur adress</h4>
          <?php 
            if(isset($errorMsg) && count($errorMsg) > 0)
            {
                foreach($errorMsg as $error)
                {
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            }
          ?>
          <form class="needs-validation" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Voornaam</label>
                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Achternaam" value="<?php echo (isset($fnameValue) && !empty($fnameValue)) ? $fnameValue:'' ?>" >
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Achternaam</label>
                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Voornaam" value="<?php echo (isset($lnameValue) && !empty($lnameValue)) ? $lnameValue:'' ?>" >
              </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo (isset($emailValue) && !empty($emailValue)) ? $emailValue:'' ?>">
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Postcode en verzendadres" value="<?php echo (isset($addressValue) && !empty($addressValue)) ? $addressValue:'' ?>">
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optioneel)</span></label>
              <input type="text" class="form-control" id="address2" name="address2" placeholder="1a" value="<?php echo (isset($address2Value) && !empty($address2Value)) ? $address2Value:'' ?>">
            </div>
            </div>
            <hr class="mb-4">

           
           
            
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="submit">Verzenden</button>
          </form>
        </div>
      </div>
<?php include('layouts/footer.php'); ?>