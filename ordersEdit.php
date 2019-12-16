<?php include("config.php"); //$conn 

?> 
<?php
	$id = $_GET['id'];
	include "config.php";
	$sql = "SELECT * FROM orders WHERE id = '$id'";
	//$result = mysqli_query($conn,$sql);
	//$row = mysqli_fetch_assoc(result);
	$query = $conn -> query($sql);
	$row = $query -> fetch_assoc();
?>

<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<head>
		<title>Cafezy Online Delivery</title>
		
		<meta charset="UTF-8">
		<meta name="author" content="Sahil Kumar">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		
	</head>
	
	<body>
		
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		  
			<a class="navbar-brand" href="index.php"><b>Cafezy Delivery</b>&nbsp; <i class="fa fa-coffee" style="font-size:20px"></i></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>

			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a class="nav-link" 		href="admin.php">		<b>Menu</b></a></li>
					<li class="nav-item"><a class="nav-link"        href="adProductAdd.php"><b>Add Product</b></a></li>
					<li class="nav-item"><a class="nav-link active" href="OrderView.php">	<b>Status</b></a></li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<div id="message"></div>
			<div class="row mt-5 pb-3">
		<body>
			<div class = "container" >
			<div class = "main">
				<h1><center>Edit Orders Record</center></h1>
				<hr>
				
				<form method="post" action="odersEdits.php?id=<?php echo $id;?>">
					<table align="center" style="font-size: 110%; width:50%"  >
						<tr>
							<td><b> Id</td>
							<td>:</td>
							<td><input type="text" name="id"  style="font-size: 90%" size='90' readonly value="<?php echo $row['id']; ?>"></td>
						</tr>
						<tr>
							<td><b>Username</td>
							<td>:</td>
							<td><input type="text" name="uname"  style="font-size: 90%" size='90' readonly value="<?php echo $row['uname']; ?>"></td>
						</tr>
						<tr>
							<td><b>Email </td>
							<td>:</td>
							<td><input type="text"  name="email"  style="font-size: 90%" size='90' readonly value="<?php echo $row['email']; ?>"></td>
						</tr>
						<tr>
							<td><b>Phone No. </td>
							<td>:</td>
							<td><input type="text"  name="contact_number"  style="font-size: 90%" size='90' readonly value="<?php echo $row['contact_number']; ?>"></td>
						</tr>
						<tr>
							<td><b>Address </td>
							<td>:</td>
							<td><input type="text"  name="address"  style="font-size: 90%" size='90' readonly value="<?php echo $row['address']; ?>"></td>
						</tr>
						<tr>
							<td><b>Mode </td>
							<td>:</td>
							<td><input type="text"  name="pmode"  style="font-size: 90%" size='90' readonly value="<?php echo $row['pmode']; ?>"></td>
						</tr>
						<tr>
							<td><b>Poduct </td>
							<td>:</td>
							<td><input type="text"  name="products"  style="font-size: 90%" size='90' readonly value="<?php echo $row['products']; ?>"></td>
						</tr>
						<tr>
							<td><b>Total Pay</td>
							<td>:</td>
							<td><input type="text"  name="tot_pay"  style="font-size: 90%" size='90' readonly value="<?php echo $row['tot_pay']; ?>"></td>
						</tr>
						<tr>
							<td><b>Status</td>
							<td>:</td>
							<td><input type="text"  name="status"  style="font-size: 90%" size='90' value="<?php echo $row['status']; ?>"></td>
						</tr>
						
					
						<tr>
							<td colspan="3" align="center"><br><input style="font-size: 90%"  type="submit"></td>
						</tr>
					</table>
				</form>
			</div>
			</div>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">			</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">		</script>
	</body>
</html>