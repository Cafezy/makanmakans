<?php
	$conn = new mysqli("localhost", "root", "Icus5320", "cart_system");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>