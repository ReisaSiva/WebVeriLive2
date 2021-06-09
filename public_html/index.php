<?php 


require 'function.php';
$information = query ("SELECT * FROM information ORDER BY id ASC");


?>

<!DOCTYPE html>
<html>

<head>
	<link href='https://fonts.googleapis.com/css?​family=Roboto' rel='stylesheet'>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://meet.jit.si/external_api.js"></script>
	<script>
		$(document).ready(function(){
		    var domain = "meet.jit.si";
			var options = {
				roomName: "JitsiMeetAPIExample",
				width: 700,
				height: 700,
				parentNode: document.querySelector('#meet')
			}
		var api = new JitsiMeetExternalAPI(domain, options);
		});
	</script>
	<title>VeriLive</title>
</head>

<body>
	<!-- Just an image -->
	<nav class="navbar navbar-light">
		<div class="container-fluid">
		<a class="navbar-brand" href="#">
			<img src="Logo.png" width="200"  alt="">
		</a>
		</div>
	</nav>
	<div class="container-xl" style="margin-left: 10%; margin-right: 10%">
		<div class="row meet">
			<div class="col-md-6 center" >
				<div id="meet" style="margin: auto;"></div>
			</div>
			<div class="col-md-6" >
				<div class="card2" style="width: 100%;">
					<h1 class="font3" style="text-align: left; margin-left: 5%; margin-top: 20px; margin-bottom: 15px;">Personal Information</h1>
					<?php foreach ($information as $data) : ?>
					<p class="font1" style="text-align: left; margin-left: 5%;">Name:
					</p>
					<p class="font2" style="text-align: left; margin-left: 5%;"><?=$data[ "name"]; ?>	</p>
					<p class="font1" style="text-align: left; margin-left: 5%;">Order Id:
					</p>
					<p class="font2" style="text-align: left; margin-left: 5%;"><?=$data[ "id"]; ?>	</p>
					<p class="font1" style="text-align: left; margin-left: 5%;">Phone Number:
					</p>
					<p class="font2" style="text-align: left; margin-left: 5%;"><?=$data[ "phone"]; ?>	</p>
					<p class="font1" style="text-align: left; margin-left: 5%;">Birth Date:
					</p>
					<p class="font2" style="text-align: left; margin-left: 5%;"><?=$data[ "birth"]; ?>	</p>
					<p class="font1" style="text-align: left; margin-left: 5%;">Gender:
					</p>
					<p class="font2" style="text-align: left; margin-left: 5%;"><?=$data[ "gender"]; ?>	</p>
					<p class="font1" style="text-align: left; margin-left: 5%;">City:
					</p>
					<h1 style="text-align: left; margin-left: 5%;">Residence Address</h1>
					<p class="font2" style="text-align: left; margin-left: 5%;"><?=$data[ "email"]; ?>	</p>
					<p class="font1" style="text-align: left; margin-left: 5%;">Zip Code:
					</p>
					<p class="font2" style="text-align: left; margin-left: 5%;"><?=$data[ "password"]; ?>	</p>

					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<p></p>
</body>

</html>