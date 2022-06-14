<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'tshirt');
// Below is optional, remove if you have already connected to your database.
require_once('./inc/config.php');  

// For extra protection these are the columns of which the user can sort by (in your database table).
$columns = array('first_name','last_name','email', 'address', 'address2', 'created_at');
$columns = array('first_name','last_name','email', 'address', 'address2', 'created_at');
// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

// Get the sort order for the column, ascending or descending, default is ascending.
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

// Get the result...
if ($result = $mysqli->query('SELECT  first_name,last_name,email, address, address2, created_at FROM orders ORDER BY ' .  $column . ' ' . $sort_order)) {
	// Some variables we need for the table.
	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';
	?>
	<!DOCTYPE html>
	<html>
		<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="prive.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
			<title>PHP & MySQL Table Sorting by CodeShack</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			<style>
			html {
				font-family: Tahoma, Geneva, sans-serif;
				padding: 10px;
			}
			table {
				border-collapse: collapse;
				width: 500px;
			}
			th {
				background-color: #54585d;
				border: 1px solid #54585d;
			}
			th:hover {
				background-color: #64686e;
			}
			th a {
				display: block;
				text-decoration:none;
				padding: 10px;
				color: #ffffff;
				font-weight: bold;
				font-size: 13px;
			}
			th a i {
				margin-left: 5px;
				color: rgba(255,255,255,0.4);
			}
			td {
				padding: 10px;
				color: #636363;
				border: 1px solid #dddfe1;
			}
			tr {
				background-color: #ffffff;
			}
			tr .highlight {
				background-color: #f9fafb;
			}
			</style>
		</head>
		<body>
		<nav class="navtop">
			<div>
				<h1>Website Title</h1>
				<!-- <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a> -->
				<a href="loguit.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
			<table>
				<tr>
					<th><a href="prive.php?column=first_name&order=<?php echo $asc_or_desc; ?>">Age<i class="fas fa-sort<?php echo $column == 'first_name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=last_name&order=<?php echo $asc_or_desc; ?>">Age<i class="fas fa-sort<?php echo $column == 'last_name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=joined&order=<?php echo $asc_or_desc; ?>">Join Date<i class="fas fa-sort<?php echo $column == 'email' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=address&order=<?php echo $asc_or_desc; ?>">Name<i class="fas fa-sort<?php echo $column == 'address' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=name&order=<?php echo $asc_or_desc; ?>">Name<i class="fas fa-sort<?php echo $column == 'address2' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="prive.php?column=name&order=<?php echo $asc_or_desc; ?>">Name<i class="fas fa-sort<?php echo $column == 'created_at' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					
				</tr>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td<?php echo $column == 'first_name' ? $add_class : ''; ?>><?php echo $row['first_name']; ?></td>
					<td<?php echo $column == 'last_name' ? $add_class : ''; ?>><?php echo $row['last_name']; ?></td>
					<td<?php echo $column == 'email' ? $add_class : ''; ?>><?php echo $row['email']; ?></td>
					<td<?php echo $column == 'address' ? $add_class : ''; ?>><?php echo $row['address']; ?></td>
					<td<?php echo $column == 'address2' ? $add_class : ''; ?>><?php echo $row['address2']; ?></td>
					<td<?php echo $column == 'created_at' ? $add_class : ''; ?>><?php echo $row['created_at']; ?></td>
				</tr>
				<?php endwhile; ?>
			</table>
		</body>
	</html>
	<?php
	$result->free();
}
?>

<!--  -->