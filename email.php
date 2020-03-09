<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<?php
	
	if($_POST['message']){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
	
		$to = "saklier@mtu.edu";
		$headers = "From: Klier Productions - $email \r\n";
		$headers .= "Reply-To: $email \r\n";
		$headers .= "Return-Path: $email\r\n";
		$headers .= "X-Mailer: PHP/ \r\n";
    	$headers .= "MIME-Version: 1.0\r\n";
    	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		mail($to, $name, $message, $headers);
	
	}
	
	$conn = new MySQLi("50.87.144.20","steven_admin","maddog23","steven_db");

	if ($conn->connect_error){	
  		die('Could not connect: ' . $conn->connect_error);
  	} 

	$uniqueid = uniqid();
	
	$sql = "INSERT INTO email_klier (name, email) VALUES ('$_POST[name]','$_POST[email]')";

 	if ($conn->query($sql) === TRUE) {
    	echo "<h1>Thanks for getting in touch! I will get back to you as soon as possible.</h1>";
		echo '<br> <a href="index.html"><button type="button">Return Home</button></a>';
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();	
?>
	
</body>
</html>