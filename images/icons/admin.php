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
					<li class="nav-item"><a class="nav-link active" href="admin.php">		<b>Menu</b></a></li>
					<li class="nav-item"><a class="nav-link"        href="adProductAdd.php"><b>Add Product</b></a></li>
					<li class="nav-item"><a class="nav-link" 		href="OrderView.php">	<b>Status</b></a></li>
					<li class="nav-item"><a class="nav-link" 		href="index.php"><i class="fa fa-sign-out" style="font-size:20px"></i></a></li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<div id="message"></div>
			<div class="row mt-5 pb-3">

				<?php
					include 'config.php';
					$stmt = $conn->prepare("SELECT * FROM product");
					$stmt-> execute();
					$result = $stmt->get_result();
					while($row = $result->fetch_assoc()):
				?>
				<div class="col-sm-6 com-md-4 col-lg-3 mb-2">
					<div class="card-deck">
						<div class="card p-2 border-secondary mb-2">
							<a href="adProductEdit.php?id=<?php echo $row['id'];?>"<i class="fa fa-edit"  style='font-size:20px'></i></a>
							<a><i class="fa fa-trash" style='font-size:20px' onClick="deleteme(<?php echo $row['id']; ?>)"></i></a>
                
							<img src= "image/<?php echo $row['product_image'];?>" class="card-img-top" height="150px"> 
							<div class="card-body p-1">
								<h4 class="card-title text-center text-info"><?= $row['product_name'] ?></h4>
								<h5 class="card-text text-center text-danger">RM &nbsp;<?= number_format($row['product_price'],2) ?></h5>
							</div>
							
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">			</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">		</script>
		
		
		<script language="javascript">
				    function deleteme(id)
				    {
					     if(confirm("Are you sure to remove the item?")){
						    window.location.href='adProductDel.php?id=' +id+'';
						    return true;
					     }
				   }
	
				</script>
		
	</body>
</html>
