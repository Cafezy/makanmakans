<?php
	session_start();
	require 'config.php';
	
	
	if(isset($_POST['uname'])){
		
		$uname		= $_POST['uname'];
		$pname 		= $_POST['pname'];
		$pprice 	= $_POST['pprice'];
		$pimage 	= $_POST['pimage'];
		$pcode 		= $_POST['pcode'];
		$username	= $_POST['username'];
		$pqty 		= 1;
		
		$stmt = $conn->prepare("SELECT product_code FROM cart WHERE product_code=?");
		$stmt->bind_param("s",$pcode);
		$stmt->execute();
		$res = $stmt->get_result();
		$r	 = $res->fetch_assoc();
		$code= $r['product_code'];
	
		if(!$code){
			$query = $conn->prepare("INSERT INTO cart (user_name,product_name, product_price,product_image,qty,total_price,product_code,username) VALUES(?,?,?,?,?,?,?,?)");
			$query->bind_param("ssssisss",$uname,$pname,$pprice,$pimage,$pqty,$pprice,$pcode,$username);
			$query->execute();
			
			echo '<div class="alert alert-success alert-dismissible mt-2">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Item added to your cart!</strong>
				</div>';
		}
		else{
			
			echo '<div class="alert alert-danger alert-dismissible mt-2">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Item already added to your cart!</strong>
				</div>';
		}
	}
	
	if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
		$stmt = $conn->prepare("SELECT * FROM cart");
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		echo $rows;
	}
	
	if(isset($_GET['remove'])){
		$id = $_GET['remove'];
		
		$stmt = $conn->prepare("DELETE FROM cart WHERE id=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
		
		$_SESSION['showAlert']= 'block';
		$_SESSION['message']= 'Item removed from the cart!';
		header('location:cart.php');
	}
	if(isset($_GET['removed'])){
		$id = $_GET['removed'];
		
		$stmt = $conn->prepare("DELETE FROM orders WHERE id=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
		
		$_SESSION['showAlert']= 'block';
		$_SESSION['message']= 'Item removed from the cart!';
		header('location:track.php');
	}
	
	if(isset($_GET['clear'])){
		
		
		$stmt = $conn->prepare("DELETE FROM cart");
		$stmt->execute();
		
		$_SESSION['showAlert']= 'block';
		$_SESSION['message']= 'All item removed from the cart!';
		header('location:cart.php');
	}
	
	if(isset($_POST['qty'])){
		$qty = $_POST['qty'];
		$pid = $_POST['pid'];
		$pprice = $_POST['pprice'];
		
		$tprice = $qty*$pprice;
		
		$stmt = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE id=?");
		$stmt->bind_param("isi",$qty,$tprice,$pid);
		$stmt->execute();
		
	}
	
	
?>