

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Halaman Admin</title>
</head>
<body>
<nav class="navbar navbar-light">
		<div class="container-fluid">
		<a class="navbar-brand" href="#">
			<img src="Logo.png" width="90"  alt="">
		</a>
		</div>
	</nav>
<h1>Daftar Informasi User</h1>
<!-- <a href="registerinformation.php ?>">Tambah data information</a> -->
<br></br>
	<div><b>Pencarian</b></div>
<br></br>
<div class="container table-responsive">
<table class="table" border="0" cellspacing="0" cellpadding="10" style="margin: auto;">
  <thead>
	<tr>
		<th>Loan ID </th>
		<th>Name</th>
		<th>Order Number</th>
		<th>Time</th>
		<th>Status</th>
	</tr>
  </thead>
        <tbody id="myTable">
        </tbody>
</div>
</article>
<br></br>
</body>

<script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-app.js"></script>
	<!-- TODO: Add SDKs for Firebase products that you want to use
		https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-firestore.js"></script>
    <script src="app.js"></script>
    <script src="index.js"></script>
</html>