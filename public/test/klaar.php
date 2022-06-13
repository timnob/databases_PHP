<?php
	
	$sql = 'insert into order (first_name, last_name, email, address, created_at) values (:fname, :lname, :email, :address, :created_at)';
	$statement = $db->prepare($sql);
	$params = [
		'fname' => $firstName,
		'lname' => $lastName,
		'email' => $email,
		'address' => $address,
		'created_at'=> date('Y-m-d H:i:s'),

	];

	$statement->execute($params);
	if($statement->rowCount() == 1)
	{
		
		$getOrderID = $db->lastInsertId();

		if(isset($_SESSION['cart']) || !empty($_SESSION['cart']))
		{
			$sqlDetails = 'insert into order_details (order_id, product_id, product_name, product_price, qty, total_price) values(:order_id,:product_id,:product_name,:product_price,:qty,:total_price)';
			$orderDetailStmt = $db->prepare($sqlDetails);

			$totalPrice = 0;
			foreach($_SESSION['cart'] as $item)
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
			
			$updateSql = 'update order set total_price = :total where id = :id';

			$rs = $db->prepare($updateSql);
			$prepareUpdate = [
				'total' => $totalPrice,
				'id' =>$getOrderID
			];

			$rs->execute($prepareUpdate);
	
		}
	}

	
?>


<!-- <?PHP
session_start();
session_unset();
session_destroy();
header("Location: index.php");
?> -->