<?php include("config.php"); //$conn ?> 
<?php
	if(isset($_POST['username'])) {
		$username = $_POST['username'];	
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$contact_number = $_POST['contact_number'];
		$password = $_POST['password'];
		$address = $_POST['address'];

			$sql = "INSERT INTO user(user_name,email,contact_number,username,password,address) 
						VALUES ('$user_name','$email','$contact_number','$username','$password','$address')";
		if($conn -> query($sql) === true) {
			echo "<script>alert('Successfully sign up !'); window.location='index.php'</script>";
		} else { echo "<script>alert(' Please Do it Again !');</script>";}
	}
?>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
		function validateForm(){
			var user_name 		= document.forms["formz"]["user_name"].value;
			var contact_number 	= document.forms["formz"]["contact_number"].value;
			var email 			= document.forms["formz"]["email"].value;
			var address 		= document.forms["formz"]["address"].value;
			var username	 	= document.forms["formz"]["username"].value;
			var password 		= document.forms["formz"]["password"].value;
			
			if(user_name == ""){
				alert("Please Fill in your name!")
				return false;
			}
			if(contact_number == ""){
				alert("Please Fill in your phone number!")
				return false;
			}
			if(email == ""){
				alert("Please Fill in your email!")
				return false;
			}
			if(address == ""){
				alert("Please Fill in your address!")
				return false;
			}
			if(username == ""){
				alert("Please Fill in your username!")
				return false;
			}
			if(password == ""){
				alert("Please Fill in your password!")
				return false;
			}
			
		}
	</script>
</head>
<style>
	.sign_up
	{
		border-radius:5px;
		background:purple;
		padding:20px;
		width: 650px;
		margin: auto;
		color:#fff;
		font-size: 16px;
		font-family:Verdana;
		margin-top: 100px;
		opacity: 0.6;

	}
	.sign_up h1 
	{
		text-align:center;
		 margin:0;
		 padding:0;

	}

	.sign_up textarea,select
	{
		padding: 12px 20px;
		margin:8px 0;
		display: inline-block;
		border:1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		font-size: 18px;
		background: black;
		color: white;
		opacity:0.6;

	}
	.sign_up textarea[type=text]
	{
		width:85%;
		border: none;
		cursor: pointer;
	}
	.sign_up input,select
	{
		padding: 12px 20px;
		margin:8px 0;
		display: inline-block;
		border:1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		font-size: 18px;
		background: black;
		color: white;
		opacity:0.6;

	}
	.sign_up input[type=submit]
	{
		width:100%;
		border: none;
		cursor: pointer;
	}
	#address{width:85%;}
	#user_name{width:85%;}
	#email{width:85%;}
	#password{width:85%;}
	#contact_number{width:85%  ;}
	#username{width:85%;}
	
	input[type=submit]:hover
	{
		background:#45a049;
		transition: 0.6s;
	}
	option
	{
		color:white;
		background: purple;
	}

	/*button*/
	.submitbtn {
	  position: relative;
	  background-color:#B048B5;
	  border-radius:12px;
	  font-size: 20px;
	  color: #FFFFFF;
	  padding: 10px;
	  width: 80%;
	  text-align: center;
	  -webkit-transition-duration: 0.4s; /* Safari */
	  transition-duration: 0.4s;
	  text-decoration: none;
	  overflow: hidden;
	  cursor: pointer;
	}

	.submitbtn:after {
	  content: "";
	  background: #f1f1f1;
	  display: block;
	  position: absolute;
	  padding-top: 300%;
	  padding-left: 350%;
	  margin-left: -20px !important;
	  margin-top: -120%;
	  opacity: 0;
	  transition: all 0.8s
	}

	.submitbtn:active:after {
	  padding: 0;
	  margin: 0;
	  opacity: 1;
	  transition: 0s
	}

</style>

<body bgcolor="#e9e9e6" >
	<div class="sign_up">	
	<form method="post" action="" align="center" name="formz" onsubmit="return validateForm()">
		<center><h1> SIGN UP </h1></center>
		<br>
		<input 		autocomplete="off"	type="text" name="user_name" 		id="user_name" 		placeholder="Your Name" >
		<input 		autocomplete="off"	type="text" name="email" 			id="email" 			placeholder="Your Email">
		<input 		autocomplete="off"	type="text" name="contact_number" 	id="contact_number" placeholder="Your Phone Number">
		<input 		autocomplete="off"	type="text" name="username" 		id="username" 		placeholder="Your Username">
		<input 		autocomplete="off"	type="text" name="password" 		id="password" 		placeholder="Your Password">
		<textarea 	autocomplete="off"	type="text" name="address" 			id="address" 		placeholder="Your Address"></textarea>
		

		
		<br><br><br>
	 <button type="submit" class="submitbtn"><b>SUBMIT</b></button>
	 <br><br>
	 <a style="color: white ; float: left" href="index.php"><i style="font-size:24px" class="fa">&#xf060;</i></a>
	 
		</form>
	</div>

	
</body>
</html>