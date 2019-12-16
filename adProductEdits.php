<?php
include('config.php'); //$conn
	$id = $_POST['id'];
	$product_name 	= $_POST['product_name'];
	$product_price 	= $_POST['product_price'];
	$product_code 	= $_POST['product_code'];
	$product_image 	= $_POST['product_image'];
	$location 	  	= $_POST['location'];
	
	
	
	$sql = "UPDATE product SET product_name = '".$product_name."', product_price = '$product_price', product_image = '$product_image', product_code = '$product_code', location = '$location',  product_name = '$product_name', id = '$id' WHERE id = '$id'";
	if($conn -> query($sql) === true) {
		echo "<script>alert('Your data has successfully updated!'); window.location = 'admin.php?id=".$id."';</script>";
	} else {
		echo "<script>alert('Failed to update your data. Please try again!'); window.location = 'admin.php';</script>";
	}
		
	
?>