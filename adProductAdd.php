<!DOCTYPE html>
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
					<li class="nav-item"><a class="nav-link active" href="adProductAdd.php"><b>Add Product</b></a></li>
					<li class="nav-item"><a class="nav-link" 		href="OrderView.php">	<b>Status</b></a></li>
					<li class="nav-item"><a class="nav-link" href="index.php"><i class="fa fa-sign-out" style="font-size:20px"></i></a></li>
					</ul>
			</div>
		</nav>
		<div class="container">
			<div id="message"></div>
				<div class="row mt-5 pb-3">
					<form action="adProductAdds.php" method="post" enctype="multipart/form-data">
						<h1><center>ADD PRODUCT</center></h1></br>


						<p>
							<label for="productprice">Product Name</label>&emsp;&emsp;
							<input autocomplete="off" class="form-control" type="text" name="productname" id="productname" size="150"; />
						</p>
						<p>
							<label for="productprice">Product Price</label>&emsp;&emsp;
							<input autocomplete="off" class="form-control" type="text" name="productprice" id="productprice" size="150"; />
						</p>

						<p>
							<label for="productprice">Product Code</label>&emsp;&emsp;
							<input autocomplete="off" class="form-control" type="text" name="productcode" id="productcode" size="150"; />
						</p><br/>
						
						<center><label for="exampleInputFile">Upload Picture</label>
						<input type="file" name="fupload" id="exampleInputFile">
						<h5><center>(*Upload photo only)</center></h5></center>
								 
						<center><input type="submit" class="button" value="Add">
						
					</form>
				</div>
			</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">			</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">		</script>
	</body>
</html>