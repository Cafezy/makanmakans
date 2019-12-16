<?php include("config.php"); //$conn 

?> 
<?php
	$id = $_GET['id'];
	include "config.php";
	$sql = "SELECT * FROM product WHERE id = '$id'";
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
		  
			<a class="navbar-brand" href="admin.php"><b>Cafezy Delivery</b>&nbsp; <i class="fa fa-coffee" style="font-size:20px"></i></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>

			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a class="nav-link" 		href="admin.php">		<b>Menu</b></a></li>
					<li class="nav-item"><a class="nav-link" 		href="adProductAdd.php"><b>Add Product</b></a></li>
					<li class="nav-item"><a class="nav-link" 		href="OrderView.php">	<b>Status</b></a></li>
					<li class="nav-item"><a class="nav-link" 		href="index.php"><i class="fa fa-sign-out" style="font-size:20px"></i></a></li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<div id="message"></div>
			<div class="row mt-5 pb-3">
		<body>
			<div class = "container" >
			<div class = "main">
				<h1><center>Edit Product Record</center></h1>
				<hr>
				
				<form method="post" action="adProductEdits.php?id=<?php echo $id;?>">
					<table align="center" style="font-size: 110%; width:50%"  >
						<tr>
							<td><b>Product Id</td>
							<td>:</td>
							<td><input type="text" name="id"  style="font-size: 90%" size='90' readonly value="<?php echo $row['id']; ?>"></td>
						</tr>
						<tr>
							<td><b>Product Name </td>
							<td>:</td>
							<td><input type="text" name="product_name"  style="font-size: 90%" size='90' value="<?php echo $row['product_name']; ?>"></td>
						</tr>
						<tr>
							<td><b>Product Price </td>
							<td>:</td>
							<td><input type="text"  name="product_price"  style="font-size: 90%" size='90' value="<?php echo $row['product_price']; ?>"></td>
						</tr>
						<tr>
							<td><b>Product Code</td>
							<td>:</td>
							<td><input type="text"  name="product_code"  style="font-size: 90%" size='90' value="<?php echo $row['product_code']; ?>"></td>
						</tr>
						<tr>
								
                                <td>  <label for="exampleInputFile"><h5><font face="Tw Cen Mt" color="red" >Please Choose An Image : </font></h5></label>
                                     <br/><input type="file" name="product_image" value="image/'<?=$results['product_image'];?>'" >
                                </td>
						</tr>
						
						<input type="hidden"  name="location"  style="font-size: 90%" value="<?php echo $row['location']; ?>">
						
					
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