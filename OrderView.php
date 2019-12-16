<?php
	include("config.php");

		
		$sql = "SELECT * FROM orders";
		$query = $conn->query($sql) or die($conn->error);
		$row = $query -> fetch_assoc();
	
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Track Order</title>
		
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
					<ul class="navbar-nav ml-auto">	
					<li class="nav-item">		<a class="nav-link" href="admin.php">		<b>Menu</b></a></li>
					<li class="nav-item">		<a class="nav-link"	href="adProductAdd.php"><b>Add Product</b></a></li>
					<li class="nav-item active"><a class="nav-link" href="OrderView.php">	<b>Status</b></a></li>
					<li class="nav-item">		<a class="nav-link" href="index.php"><i class="fa fa-sign-out" style="font-size:20px"></i></a></li>
					</ul>
			</div>
		</nav>
	
		<div class="row justify-content-center">
						<div class="col-lg-12 px-4 pb-4 mt-5">
							
							<div class="table-responsive-xl mt-5 "> 
								<table class="table table-bordered table-hover  "  >
									
									<thead class="thead-dark">
										<tr>
											<th colspan="11"><h4 class="text-center text-light m-0"> MY ORDER LIST </th>
										</tr>
									
										<tr>
											<th><center> No.</th>
											<th><center> Name</th>
											<th><center> Products</th>
											<th><center> Address</th>
											<th class="px-4"><center> Payment Mode</th>
											<th class="px-4"><center> Amount Paid</th>
											<th><center> Status</th>
											<th colspan="2"><center> Action</th>
										</tr>
									</thead>
									
									<?php	
										$count=1;
											
										do { ?>
									<tbody>								
										<tr>
											<td><center><?= $count	?>.</td>	
											<td><center><?= $row['uname']	?>.</td>	
											<td><?= $row['products'] ?><center></td>
											<td><?= $row['address'] ?><center></td>
											<td><center><?= $row['pmode'] ?></td>
											<td><center>RM <?= $row['tot_pay'] ?><center></td>
											<td><?= $row['status'] ?><center></td>
											<td><center><a href="action.php?removed=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash-o" style="font-size:23px"></i></a></td>
											<td><center><a href="ordersEdit.php?id=<?php echo $row['id'];?>"<i class="fa fa-edit"  style='font-size:20px'></i></a></td>
										</tr>
										
									</tbody>
									
									<?php  $count = $count +1;}
									while ($row = $query -> fetch_assoc()) ?>
								</table>
							</div>	
						</div>
				
				</div>		
		
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">			</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">		</script>

		<script type="text/javascript">
			$(document).ready(function(){
				
				load_cart_item_number();
				function load_cart_item_number(){
					$.ajax({
						url: 'action.php',
						method: 'get',
						data: {cartItem:"cart_item"},
						success:function(response){
							$("#cart-item").html(response);
						}
					});
				}
				
			});
		</script>
		
	</body>
</html>