

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>My Cart</title>
		
		<meta charset="UTF-8">
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
					<li class="nav-item"><a class="nav-link" 		href="myaccount.php">	<b>My Account</b></a></li>
					<li class="nav-item active"><a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" style="font-size:20px"></i> <span id="cart-item" class="badge badge-danger"style="font-size:10px"></span></a></li>
					<li class="nav-item"><a class="nav-link"		href="index.php"><i class="fa fa-sign-out" style="font-size:20px"></i></a></li>
				</ul>
			</div>
		</nav>
		
		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<?php
					session_start();?>
					<div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];} else{echo 'none';} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']); ?></strong> 
					</div>
					
					<div class="table-responsive mt-2" >
						<table class="table table-bordered table-striped text-center" >
							
							<thead>
								<tr>
									<td colspan="7"><h4 class="text-center text-info m-0"> Order in your cart!</td>
								</tr>	
								
								<tr>
									<th>No			</th>
									<th>Image		</th>
									<th>Name		</th>
									<th>Price		</th>
									<th>Quantity	</th>
									<th>Total Price	</th>
									<th><a href="action.php?clear=all" class= "badge-danger badge p-2" onclick="return confirm('Are you sure you want to clear all your cart?')" style="font-size:15px"><i class="fa fa-trash"></i>&nbsp; &nbsp; Clear Cart</a></th>
								</tr>
							</thead>

							<tbody>
								<?php
									require 'config.php';
									$stmt = $conn->prepare("SELECT * FROM cart");
									$stmt->execute();
									$result = $stmt->get_result();
									$tot_pay=0;$count=1;
									while($row = $result->fetch_assoc()):
									
								?>
								<tr>
									<td><?php echo $count ?>.</td>
									<input type="hidden" class="pid" value="<?= $row['id']?>">
									<td><img src="<?= $row['product_image'] ?>" width="100"></td>
									<td><?= $row['product_name'] ?></td>
									<td>RM &nbsp; <?= number_format($row['product_price'],2); ?></td> <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
									<td><center><input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;"></td>
									<td>RM &nbsp; <?= number_format($row['total_price'],2); ?></td>
									<td><a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o" style="font-size:23px"></i></a></td>
								</tr>
								
								<?php 
									$tot_pay +=$row['total_price']; 
									$count++;
								?>
								<?php endwhile; ?>
								
								<tr>
									<td colspan="3"><a href="allfood.php" class="btn btn-success"><i class="fa fa-cart-plus"></i> &nbsp; Continue Shopping</a></td>
									<td colspan="2"><b>Grand Total</b></td>
									<td><b>RM &nbsp<?= number_format($tot_pay,2); ?> </b></td>
									<td><a href="checkout.php" class="btn btn-info <?= ($tot_pay>1)?"":"disabled"; ?>"><i class="fa fa-credit-card"></i>&nbsp; &nbsp; Checkout</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				
				</div>
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">			</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">		</script>
		
		<script type="text/javascript">
			$(document).ready(function(){
				
				$(".itemQty").on('change', function(){
					var $el = $(this).closest('tr');
					
					var pid = $el.find(".pid").val();
					var pprice = $el.find(".pprice").val();
					var qty = $el.find(".itemQty").val();
					location.reload(true);
					$.ajax({
						url: 'action.php',
						method: 'post',
						cache: false,
						data: {qty:qty,pid:pid,pprice:pprice},
						success: function(response){
							
							console.log(response);
						}
					});
				});
				
				
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