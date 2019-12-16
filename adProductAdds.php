<?php
require_once('config.php');
$sproductname = $_POST['productname'];
$sproductprice = $_POST['productprice'];
$sproductcode = $_POST['productcode'];

    
        //Upload pdf files into D:/Bahan

    if(isset($_FILES) & !empty($_FILES)){
	$product_image = $_FILES['fupload']['name'];
	//$size = $_FILES['fupload']['size'];
	//$type = $_FILES['fupload']['type'];
	$tmp_name = $_FILES['fupload']['tmp_name'];
	$extension = substr($product_image, strpos($product_image, '.') +1);
    }
    $location = "image/";
    if(isset($product_image) &!empty($product_image)){
	if($extension == "jpeg" || $extension == "jpg"){
		if(move_uploaded_file($tmp_name, $location.$product_image)){
			
			//Masukkan data dalam upload
			$sqlUpload = "INSERT INTO `product` (product_name,product_price,product_image,product_code,location) VALUES ('$sproductname','$sproductprice','$product_image','$sproductcode','$location$product_image')";
			$resUpload = mysqli_query($conn, $sqlUpload);
			if($resUpload)
			{
				mysqli_commit($conn);
				print '<script>alert("One product has been Added");</script>';
				//header("location; menu.php");//
				print '<script>window.location.assign("adProductAdd.php");</script>';
			}
			else
			{
				mysqli_rollback($conn);
				print '<script>alert("Invalid");</script>';
				print '<script>window.location.assign("adProductAdd.php");</script>';
			}
					}
				}
				}
?>
			
	
	