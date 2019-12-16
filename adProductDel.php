<?php 
include_once("config.php");
$select = "DELETE product from product where id='".$_GET['id']."'";
$query = mysqli_query($conn, $select) or die($select);
header ("location: admin.php");	1

?>