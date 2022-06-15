<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'webshop');

require_once('./inc/config.php');  


$columns = array('first_name','last_name','email', 'address', 'address2', 'created_at', 'product_id','product_price', 'qty', 'product_name');

$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];


$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

if ($result = $mysqli->query('SELECT first_name,last_name,email, address, address2, created_at, product_id, product_price, qty, total_price, product_name FROM orders, order_details ORDER BY ' .  $column . ' ' . $sort_order) ) {

	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';
	?>
	
	<!DOCTYPE html>
	<html>
		<head>
		<meta charset="utf-8">
		<title>Bestellingen</title>
		<link href="prive.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
			<meta charset="utf-8">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		</head>
		<body>
		<nav class="navtop">
			<div>
				<h1>Admin</h1>
				<a href="loguit.php"><i class="fas fa-sign-out-alt"></i>Loguit</a>
				
			</div>
		</nav>
		<div class="content">
			<h2>Bestellingen</h2>
			<p>De bestellingen staan hieronder!</p>
			<table>
				<tr>
					<th><a href="prive.php?column=first_name&order=<?php echo $asc_or_desc; ?>">Voornaam<i class="fas fa-sort<?php echo $column == 'first_name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=last_name&order=<?php echo $asc_or_desc; ?>">Achternaam<i class="fas fa-sort<?php echo $column == 'last_name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=joined&order=<?php echo $asc_or_desc; ?>">Email<i class="fas fa-sort<?php echo $column == 'email' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=address&order=<?php echo $asc_or_desc; ?>">Adres<i class="fas fa-sort<?php echo $column == 'address' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=name&order=<?php echo $asc_or_desc; ?>">Adres2<i class="fas fa-sort<?php echo $column == 'address2' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=name&order=<?php echo $asc_or_desc; ?>">Datum<i class="fas fa-sort<?php echo $column == 'created_at' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=product_id&order=<?php echo $asc_or_desc; ?>">product_id<i class="fas fa-sort<?php echo $column == 'product_id' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=product_id&order=<?php echo $asc_or_desc; ?>">product_name<i class="fas fa-sort<?php echo $column == 'product_name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=product_id&order=<?php echo $asc_or_desc; ?>">product_price<i class="fas fa-sort<?php echo $column == 'product_price' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=product_id&order=<?php echo $asc_or_desc; ?>">qty<i class="fas fa-sort<?php echo $column == 'qty' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=total_price&order=<?php echo $asc_or_desc; ?>">Prijs<i class="fas fa-sort<?php echo $column == 'total_price' ? '-' . $up_or_down : ''; ?>"></i></a></th>
				</tr>
				<?php while ($row = $result->fetch_assoc()): ?>
					
				<tr>
					<td<?php echo $column == 'first_name' ? $add_class : ''; ?>><?php echo $row['first_name']; ?></td>
					<td<?php echo $column == 'last_name' ? $add_class : ''; ?>><?php echo $row['last_name']; ?></td>
					<td<?php echo $column == 'email' ? $add_class : ''; ?>><?php echo $row['email']; ?></td>
					<td<?php echo $column == 'address' ? $add_class : ''; ?>><?php echo $row['address']; ?></td>
					<td<?php echo $column == 'address2' ? $add_class : ''; ?>><?php echo $row['address2']; ?></td>
					<td<?php echo $column == 'created_at' ? $add_class : ''; ?>><?php echo $row['created_at']; ?></td>
					<td<?php echo $column == 'product_id' ? $add_class : ''; ?>><?php echo $row['product_id']; ?></td>
					<td<?php echo $column == 'product_name' ? $add_class : ''; ?>><?php echo $row['product_name']; ?></td>
					<td<?php echo $column == 'product_price' ? $add_class : ''; ?>><?php echo $row['product_price']; ?></td>
					<td<?php echo $column == 'qty' ? $add_class : ''; ?>><?php echo $row['qty']; ?></td>
					<td<?php echo $column == 'total_price' ? $add_class : ''; ?>><?php echo $row['total_price']; ?></td>
				</tr>
				<?php endwhile; ?>
			</table>
		</div>
	</body>
			
	</html>
	<?php
	$result->free();
}
?>

