
<!DOCTYPE html>
<html lang="en">

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
		  
			<a class="navbar-brand" href="allfood.php"><b>Cafezy Delivery</b>&nbsp; <i class="fa fa-coffee" style="font-size:20px"></i></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>

			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">	
					<ul class="navbar-nav ml-auto">	
					<li class="nav-item"><a class="nav-link" 		href="track.php">		<b>Track Order</b></a></li>
					<li class="nav-item"><a class="nav-link" 		href="checkout.php">	<b>Checkout</b></a></li>
					<li class="nav-item"><a class="nav-link" 		href="myaccount.php">	<b>My Account</b></a></li>
					<li class="nav-item"><a class="nav-link" 		href="cart.php">		<i class="fa fa-shopping-cart" style="font-size:20px"></i> <span id="cart-item" class="badge badge-danger"style="font-size:10px"></span></a></li>
					<li class="nav-item"><a class="nav-link"		href="index.php">		<i class="fa fa-sign-out" style="font-size:20px"></i></a></li>
				</ul>
			</div>
		</nav>
		
		<div class="container">
			<div id="message"></div>
			<div class="row mt-5 pb-3">
				<?php session_start(); 
					include 'config.php';
					$stmt = $conn->prepare("SELECT * FROM product,user WHERE username='".$_SESSION['username']."' ");
					$stmt-> execute();
					$result = $stmt->get_result();
					
					
					while($row = $result->fetch_assoc()):
				?>
				
				<div class="col-sm-6 com-md-4 col-lg-3 mb-2">
					<div class="card-deck">
						<div class="card p-2 border-secondary mb-2">
							
							<img src="<?= $row['location'] ?>" class="card-img-top" height="190px" >
							
							<div class="card-body p-1">
								<h4 class="card-title text-center text-info"><?= $row['product_name'] ?></h4>
								<h5 class="card-text text-center text-danger">RM &nbsp;<?= number_format($row['product_price'],2) ?></h5>
								
							</div>
							
							<div class="card-footer p-1">
								<form action="" class="form-submit">
									
									<input type="hidden" class="uname"  	value="<?= $row['user_name'] 		?>">
									<input type="hidden" class="pname"  	value="<?= $row['product_name'] 	?>">
									<input type="hidden" class="pprice" 	value="<?= $row['product_price']	?>">
									<input type="hidden" class="pimage" 	value="<?= $row['location']			?>">
									<input type="hidden" class="pcode"  	value="<?= $row['product_code'] 	?>">
									<input type="hidden" class="username"  	value="<?= $row['username'] 		?>">
									
									<button class="btn btn-info btn-block addItemBtn">Add to cart &nbsp; <i class="fa fa-cart-plus"></i></button>
									
								</form>
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

		<script type="text/javascript">
			$(document).ready(function(){
				$(".addItemBtn").click(function(e){
					e.preventDefault();
					
					var $form 		= $(this).closest(".form-submit");
	
					var uname 		= $form.find(".uname").val();
					var pname 		= $form.find(".pname").val();
					var pprice 		= $form.find(".pprice").val();
					var pimage 		= $form.find(".pimage").val();
					var pcode 		= $form.find(".pcode").val();
					var username 	= $form.find(".username").val();
					
					
					$.ajax({
						url: 'action.php',
						method: 'post',
						data: {uname:uname,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode,username:username},
						success:function(response){
							$("#message").html(response);
							window.scrollTo(0,0);
							load_cart_item_number();
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