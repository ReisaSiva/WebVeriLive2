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
			<?php foreach ($information as $data) {}?>
			<div class="col-md-5" >
						<form action="#" method="get">
				<div class="card">
					<div class="card-body">
						<div class="card-title">
							<h4>Personal Information</h4>
						</div>
						<hr>
						<div class="page">
							<div class="page1">
								<div class="form-group">
									<label for="" class="font1">Name:</label>
									<p class="font2" style="padding-left:20px;box-sizing:border-box;"><?=$data['name']?></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Order Id:</label>
									<p class="font2" style="padding-left:20px;box-sizing:border-box;"><?=$data['id']?></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Phone Number:</label>
									<p class="font2" style="padding-left:20px;box-sizing:border-box;"><?=$data['phone']?></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Birth Date:</label>
									<p class="font2" style="padding-left:20px;box-sizing:border-box;"><?=date('d/M/Y',strtotime($data['birth']))?></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Name:</label>
									<p class="font2" style="padding-left:20px;box-sizing:border-box;"><?=$data['name']?></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Order Id:</label>
									<p class="font2" style="padding-left:20px;box-sizing:border-box;"><?=$data['id']?></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Phone Number:</label>
									<p class="font2" style="padding-left:20px;box-sizing:border-box;"><?=$data['phone']?></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Birth Date:</label>
									<p class="font2" style="padding-left:20px;box-sizing:border-box; align"><?=date('d/M/Y',strtotime($data['birth']))?></p>
								</div>
							</div>
							<div class="page2">
								<div class="form-group">
									<label for="" class="font1">Email:</label>
									<p class="font2" style="padding-left:20px;box-sizing:border-box;"><?=$data['email']?></p>
								</div>
								<div class="form-group">
									<label for="" class="font1">Password:</label>
									<p class="font2" style="padding-left:20px;box-sizing:border-box;"><?=$data['password']?></p>
								</div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://meet.jit.si/external_api.js"></script>
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
				roomName: "VeriLive",
				height: 800,
				parentNode: document.querySelector('#meet')
			}
		var api = new JitsiMeetExternalAPI(domain, options);
		});
	</script>
</html>