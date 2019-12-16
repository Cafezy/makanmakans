<?php
include('config.php'); //$conn
	$id = $_POST['id'];
	$uname	= $_POST['uname'];
	$email	= $_POST['email'];
	$contact_number = $_POST['contact_number'];
	$address = $_POST['address'];
	$pmode = $_POST['pmode'];
	$products = $_POST['products'];
	$tot_pay = $_POST['tot_pay'];
	$status = $_POST['status'];
	
	
	
	$sql = "UPDATE orders SET uname = '".$uname."', email = '$email', contact_number = '$contact_number', address = '$address', pmode = '$pmode', products = '$products', tot_pay = '$tot_pay', status = '$status', uname = '$uname', id = '$id' WHERE id = '$id'";
	if($conn -> query($sql) === true) {
		echo "<script>alert('Your data has successfully updated!'); window.location = 'OrderView.php?id=".$id."';</script>";
	} else {
		echo "<script>alert('Failed to update your data. Please try again!'); window.location = 'OrderView.php';</script>";
	}
		
	
?>