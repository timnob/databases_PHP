<?php
// Output messages
$responses = [];
// Check if the form was submitted
if (isset($_POST['email'], $_POST['Voornaam'], $_POST['Achternaam'], $_POST['Adres'])) {
	// Validate email adress
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$responses[] = 'Email is not valid!';
	}
	// Make sure the form fields are not empty
	if (empty($_POST['email']) || empty($_POST['Achternaam']) || empty($_POST['Voornaam']) || empty($_POST['Adres'])) {
		$responses[] = 'Please complete all fields!';
	} 
	// If there are no errors
	if (!$responses) {
		// Where to send the mail? It should be your email address
		$to      = 'contact@example.com';
		// Send mail from which email address?
		$from = 'noreply@example.com';
		// Mail subject
		$subject = $_POST['subject'];
		// Mail message
		$message = $_POST['msg'];
		// Mail headers
		$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $_POST['email'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		// Try to send the mail
		if (mail($to, $subject, $message, $headers)) {
			// Success
			$responses[] = 'Message sent!';		
        }
		// } else {
		// 	// Fail
		// 	$responses[] = 'Message could not be sent! Please check your mail server settings!';
		// }
	}
	if (isset($_POST['verzenden']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
		header('Location: index.php?page=home');
		exit;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Contact Form</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="order.css">
	</head>
	<body>
		<form class="contact" method="post" action="">
			<h1>Verzendgegevens</h1>
			<div class="fields">
            <label for="name">
					<i class="fas fa-user"></i>
					<input type="text" name="name" placeholder="Voornaam" >
				<label>
                <label for="name">
					<i class="fas fa-user"></i>
					<input type="text" name="name" placeholder="Achternaam" >
				<label>
				<label for="email">
					<i class="fas fa-envelope"></i>
					<input id="email" type="email" name="email" placeholder="Email" >
				</label>
                <label for="name">
					<i class="fas fa-user"></i>
					<input type="text" id="address" name="address" placeholder="Adres" >
				<label>
			</div>
            <?php if ($responses): ?>
<p class="responses"><?php echo implode('<br>', $responses); ?></p>
<?php endif; ?>


            <input type="submit" value="Verzenden" name="verzenden">

		</form>
	</body>
</html>
