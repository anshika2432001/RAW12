<?php  

$servername ="localhost";
$username = "root";
$password = "";
$dbname = "ureackon";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "INSERT INTO sign (name, email, password) 
VALUES ('$name', '$email', '$password')";

if($conn->query($sql) === TRUE){
	include 'index.html';

}
else{
	
?>
	<script>
		alert('Values did not insert');
	</script>
	<?php
}


?>




















