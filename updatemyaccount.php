<?php include("config.php"); //$conn ?>
 
<?php

	$user_name			= $_POST['user_name'];
	$email 				= $_POST['email'];
	$contact_number 	= $_POST['contact_number'];
	$address			= $_POST['address'];
	$username 			= $_POST['username'];
	$password			= $_POST['password'];
	
	
	$sql = "UPDATE user SET user_name = '".$user_name."', email = '$email',contact_number = '$contact_number', address = '".$address."', username = '$username', password = '$password',user_name = '$user_name' WHERE username = '$username'";
	if($conn -> query($sql) === true) {
		echo "<script>alert('Your data has successfully updated!'); window.location = 'editmyaccount.php?username=".$username."';</script>";
	} else {
		echo "<script>alert('Failed to update your data. Please try again!'); window.location = 'editmyaccount.php';</script>";
	}
?>