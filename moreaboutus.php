<!DOCTYPE html>
<html lang="en">
<head>
	<title>More About Us</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<br><br><br><br>
	<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-lg-12 px-5 pb-4 mt-5">
					
					 <div class="table-responsive-xl mt-5"> 
						<table class="table table-bordered table-hover"  >
							
							<thead>
								<tr>
									<th colspan="2"><h4 class="text-center  m-0 text-dark"> <b>ABOUT US </th>
								</tr>	
							</thead>
							<tbody>								
								<tr>
									<td>Opration Hours</td>								
									<td><p id="demo"></p></td>
								</tr>
								<tr>
									<td><b>Contact Number	</td>								
									<td><p id="demo1"></p>
									</td>
								</tr>
								<tr>
									<td><b>Email</td>								
									<td><p id="demo2"></p></td>
								</tr>
								<tr>
									<td><b>Address	</td>								
									<td><p id="demo3"></p></td>
								</tr>
							</tbody>
						</table>
					</div>	
				</div>
			</div>
	</div>
	
	

	<script>
	var myObj, x,y,z,n;
	myObj = { operationhours: "<b>Weekdays : 8.00 am - 12.00am <br>Saturday : 10.00am - 12.00am <br>Sunday : Off", contact: "<b>Office number : 06-2833099<b><br>Fax number : 06-2855044", email: "<b>cafezy.info@gmail.com</b>", add: "<b>Cafezy,55,Jalan Hang Jebat,75200 Malacca</b>" };
	x = myObj.operationhours;
	y = myObj.contact;
	z = myObj.email;
	n = myObj.add;
	document.getElementById("demo").innerHTML = x;
	document.getElementById("demo1").innerHTML = y;
	document.getElementById("demo2").innerHTML = z;
	document.getElementById("demo3").innerHTML = n;
	</script>

	<script src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">			</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">		</script>

</body>
</html>