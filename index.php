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

	<div class="container-fluid">
		<div class="row meet mt-5">
			<div class="col-md-1"></div>
			<div class="col-md-5 center" >
				<div id="meet" style="margin: auto;"></div>
			</div>
			<div class="col-md-5" >
						<form action="#" method="get">
				<div class="card">
					<div class="card-body">
						<div class="page">
							<div class="page1">
								<h3>Personal Information</h3>
								<hr>
								<div class="form-group">
									<label for="" class="font1">Name:</label>
									<p class="font2" id="nama_verif" style="padding-left:20px;box-sizing:border-box;"></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Order Id:</label>
									<p class="font2" id="orderid_verif"  style="padding-left:20px;box-sizing:border-box;"></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Phone Number:</label>
									<p class="font2" id="phone_verif"  style="padding-left:20px;box-sizing:border-box;"></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Birth Date:</label>
									<p class="font2" id="birthdate_verif" style="padding-left:20px;box-sizing:border-box;"></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Gender:</label>
									<br>
									<input type="radio" name="gender" class="font1" id="male" value="male"> Male
									<input type="radio" name="gender" class="font1" id="female" value="female"> Female
								</div>
							</div>
							<div class="page2">
								<h3>Residence Address</h3>
								<hr>
								<div class="form-group">
									<label for="" class="font1">Address:</label>
									<p class="font2" id="address_user" style="padding-left:20px;box-sizing:border-box;"></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">City:</label>
									<p class="font2" id="city_user" style="padding-left:20px;box-sizing:border-box;"></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Zipcode:</label>
									<p class="font2" id="zip_code" style="padding-left:20px;box-sizing:border-box;"></p>
								</div>
								<h2>Billing Address</h2>
								<hr>
								<div class="form-group">
									<label for="" class="font1">Address:</label>
									<p class="font2" id="baddress_user" style="padding-left:20px;box-sizing:border-box;"></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">City:</label>
									<p class="font2" id="bcity_user" style="padding-left:20px;box-sizing:border-box;"></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Zipcode:</label>
									<p class="font2" id="bzip_code" style="padding-left:20px;box-sizing:border-box;"></p>
								</div>
								<h3>Comparison Point Address</h3>
								<hr>
									<div id="map">

									</div>
								</form-group>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div id="buttons">
									<a id="back" class="text-white btn btn-md btn-primary">Back</a>
									<a id="next" class="text-white btn btn-md btn-primary">Next</a>
									<button id="process" class="btn btn-md btn-primary">Process</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	<p></p>
</body>
<script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-app.js"></script>
	<!-- TODO: Add SDKs for Firebase products that you want to use
		https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-firestore.js"></script>
    <script src="app.js"></script>
    <script src="index.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAC2c9dXuqrmDlIMfESrOGHqw_usMiF0HQ&callback=initMap&libraries=&v=weekly"
      async
    ></script>
	<script src="https://meet.jit.si/external_api.js"></script>
	<script>
		getDetailUser("<?=$_GET['id_user']?>");
		initMap();
	</script>
	<script>
		$(document).ready(function(){
			$('#back').hide();
			$('#buttons').attr('class','d-flex justify-content-end');
			$('.page2').hide();
			$('#process').hide();
			$('#next').on('click',function(){
				$('#buttons').attr('class','d-flex justify-content-between');
				$('.page2').show();
				$('.page1').hide();
				$('#back').show();
				$('#next').hide();
				$('#process').show();
			})
			$('#back').on('click',function(){
				$('#buttons').attr('class','d-flex justify-content-end');
				$('.page2').hide();
				$('.page1').show();
				$('#next').show();
				$('#back').hide();
				$('#process').hide();
			})
		    var domain = "meet.jit.si";
			var options = {
				roomName: <?=$_GET['coderoom']?>,
				height: 800,
				parentNode: document.querySelector('#meet')
			}
		var api = new JitsiMeetExternalAPI(domain, options);
		});
	</script>
</html>