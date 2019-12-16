<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>My Account</title>
		
		<meta charset="UTF-8">
		<meta name="author" content="Sahil Kumar">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		
	</head>
	
	
	<body>
		
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		  
			<a class="navbar-brand" href="allfood.php"><b>Cafezy Delivery</b>&nbsp; <i class="fa fa-coffee" style="font-size:20px"></i></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>

			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">	
					<ul class="navbar-nav ml-auto">	
					<li class="nav-item"><a class="nav-link" 		href="track.php">		<b>Track Order</b></a></li>
					<li class="nav-item"><a class="nav-link" 		href="checkout.php">	<b>Checkout</b></a></li>
					<li class="nav-item active"><a class="nav-link" href="myaccount.php">	<b>My Account</b></a></li>
					<li class="nav-item"><a class="nav-link" 		href="cart.php"><i class="fa fa-shopping-cart" style="font-size:20px"></i> <span id="cart-item" class="badge badge-danger"style="font-size:10px"></span></a></li>
					<li class="nav-item"><a class="nav-link"		href="index.php"><i class="fa fa-sign-out" style="font-size:20px"></i></a></li>
				</ul>
			</div>
		</nav>
		
		<?php require_once 'config.php'; 
			
					$stmt = $conn->prepare("SELECT * FROM user WHERE username='".$_SESSION['username']."' ");
					$stmt-> execute();
					$result = $stmt->get_result();
					
					while($row = $result->fetch_assoc()):
		?>
		
		
		<div class="row justify-content-center">
				<div class="col-lg-8 px-4 pb-4 mt-5">
					
					 <div class="table-responsive-xl mt-5"> 
						<table class="table table-bordered table-hover  "  >
							
							<thead class="thead-dark">
								<tr>
									<th colspan="3"><h4 class="text-center text- m-0"> CUSTOMER INFORMATION </th>
								</tr>	
							</thead>
							<tbody>								
								<tr>
									<td><b>Name	</td>								
									<td><?= $row['user_name'] ?><center></td>
								</tr>
								<tr>
									<td><b>Email	</td>								
									<td><?= $row['email'] ?><center></td>
								</tr>
								<tr>
									<td><b>Contact Number	</td>								
									<td><?= $row['contact_number'] ?><center></td>
								</tr>
								<tr>
									<td><b>Address	</td>								
									<td><?= $row['address'] ?><center></td>
								</tr>
								<tr>
									<td><b>Username	</td>								
									<td><?= $row['username'] ?><center></td>
								</tr>
								<tr>
									<td><b>Password	</td>								
									<td><?= $row['password'] ?><center></td>
								</tr>
								<tr>
									<td colspan="2"><center><a href="editmyaccount.php?username=<?php echo $row['username']; ?>" class="btn btn-warning btn-block"><b>EDIT HERE</b></a></td>
								</tr>
							</tbody>
						</table>
					</div>	
				</div>
		</div>
		
		<?php endwhile; ?>
		
		
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