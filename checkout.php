<?php
	require 'config.php';
	
	$tot_pay = 0;
	$allItems = '';
	$items = array();
	
	$sql = "SELECT CONCAT(product_name, '(',qty,')' ) AS ItemQty, total_price FROM cart";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while($row = $result->fetch_assoc()){
		$tot_pay +=$row['total_price'];
		$items[] = $row['ItemQty'];
	}
	$allItems = implode(", ", $items);
?>
<?php include("config.php"); //$conn ?> 
<?php
	if(isset($_POST['uname'])) {
		$uname 			= $_POST['uname'];	
		$products 		= $_POST['products'];
		$tot_pay 		= $_POST['tot_pay'];
		$pmode 			= $_POST['pmode'];
		$email 			= $_POST['email'];
		$address		= $_POST['address'];
		$contact_number = $_POST['contact_number'];
		$status 		= $_POST['status'];
		

		$sql = "INSERT INTO orders(uname,products,tot_pay,pmode,email,address,contact_number,status) 
				VALUES ('$uname','$products','$tot_pay','$pmode','$email','$address','$contact_number','$status')";
	
		if($conn -> query($sql) === true) {
			echo "<script>alert('Your Order has been placed!'); window.location='checkout.php'</script>";
			
				$stmt = $conn->prepare("DELETE FROM cart");
				$stmt->execute();
		
				$_SESSION['showAlert']= 'block';
				$_SESSION['message']= 'All item removed from the cart!';
				header('location:cart.php');
			
		} else { echo "<script>alert('Please Do it Again !');</script>";}
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Checkout</title>
		
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
					<li class="nav-item active"><a class="nav-link" href="checkout.php">	<b>Checkout</b></a></li>
					<li class="nav-item"><a class="nav-link" 		href="myaccount.php">	<b>My Account</b></a></li>
					<li class="nav-item"><a class="nav-link" 		href="cart.php"><i class="fa fa-shopping-cart" style="font-size:20px"></i> <span id="cart-item" class="badge badge-danger"style="font-size:10px"></span></a></li>
					<li class="nav-item"><a class="nav-link"		href="index.php"><i class="fa fa-sign-out" style="font-size:20px"></i></a></li>
				</ul>
			</div>
		</nav>
		
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-11 px-4 pb-4">
					
					 <div class="table-responsive-xl mt-5"> 
						<table class="table table-bordered table-hover "  >
							
							<thead class="thead-light">
								<tr>
									<th colspan="3"><h4 class="text-center text-info m-0"> ORDER INFORMATION</th>
								</tr>	
							</thead>
							<tbody>								
								<tr>
									<td><b>Product(s)										</td>
									<td><center>:											</td>
									<td><center><?= $allItems; ?>							</td>
								</tr>
								<tr>
									<td><b>Delivery Charge									</td>
									<td><center>:											</td>
									<td><center>Free										</td>
								</tr>
								<tr>
									<td><b>Total Amount Payable								</td>
									<td><center>:											</td>
									<td><center>RM &nbsp;<?= number_format($tot_pay,2) ?>	</td>
								</tr>	
							</tbody>
						</table>
					</div>	
				</div>
			</div>
			
			<div class="row justify-content-center">
				<div class="col-lg-11 px-4 pb-4">
					
					 <div class="table-responsive-xl mt-5"> 
						<table class="table table-bordered table-hover "  >
							
							<thead class="thead-light">
								<tr>
									<th colspan="3"><h4 class="text-center text-info m-0"> CUSTOMER INFORMATION</th>
								</tr>	
							</thead>
							<tbody>	
								<?php
									include 'config.php';
									session_start();
									$stmt = $conn->prepare("SELECT * FROM user WHERE username='".$_SESSION['username']."' ");
									$stmt-> execute();
									$result = $stmt->get_result();
									
									
									while($row = $result->fetch_assoc()):
								?>
								<tr>
									<td><b>Name									</td>
									<td><center>:								</td>
									<td><center><?= $row['user_name']?>			</td>
								</tr>
								<tr>
									<td><b>Address								</td>
									<td><center>:								</td>
									<td><center><?= $row['address']?>			</td>
								</tr>
								<tr>
									<td><b>Email								</td>
									<td><center>:								</td>
									<td><center><?= $row['email']?>				</td>
								</tr>
								<tr>
									<td><b>Contact Number						</td>
									<td><center>:								</td>
									<td><center><?= $row['contact_number']?>	</td>
								</tr>
							</tbody>
						
						</table>
					</div>	
				</div>
			</div>
			
			<div class="row justify-content-center">
				<div class="col-lg-11 px-4 pb-4">
					
					<div class="table-responsive-xl mt-5"> 
						<table class="table table-bordered table-hover "  >
							
							<thead class="thead-light">
								<tr>
									<th colspan="3"><h4 class="text-center text-info m-0"> METHOD PAYMENT</th>
								</tr>	
							</thead>
							<tbody>								
								<tr>
									<td><b><center>CASH ON DELIVERY</td>
								</tr>
							</tbody>
						</table>
					</div>	
				</div>
			</div>
			
			<div class="row justify-content-center">
				<div class="col-lg-11 px-4 pb-4" >
					
					<div class="table-responsive-xl mt-5"> 
						<form action="" method="post" action="checkout.php">
							<div class="form-group">
								<input type="hidden" name="products" 		value="<?= $allItems; ?>">
								<input type="hidden" name="tot_pay" 		value="<?= $tot_pay; ?>">
								<input type="hidden" name="pmode" 			value="cod">
								<input type="hidden" name="uname" 			value="<?= $row['user_name']?>">
								<input type="hidden" name="email"	 		value="<?= $row['email']?>">
								<input type="hidden" name="address"	 		value="<?= $row['address']?>">
								<input type="hidden" name="contact_number"	value="<?= $row['contact_number']?>">
								<input type="hidden" name="status"			value="Your order has been placed">
								
								<button type="submit" name="submit"  class="btn btn-danger btn-block <?= ($tot_pay>1)?"":"disabled"; ?>"><b>PLACE ORDER</button>
								
							</div>
						</form>
					</div>
				</div>
			</div>		
			<?php endwhile; ?>
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