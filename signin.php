<?php

$servername ="localhost";
$username = "root";
$password = "";
$dbname = "ureackon";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$email = $_POST['email'];
$password = $_POST['password'];


$sql = mysqli_query($conn, "SELECT count(*) as total from sign WHERE email = '".$email."' and 
	password = '".$password."'");

$row = mysqli_fetch_array($sql);

if($row["total"] > 0){
            include 'index.html';
}
else{
	?>
	<script>
		alert('Login failed');
	</script>
	<?php
}








?>