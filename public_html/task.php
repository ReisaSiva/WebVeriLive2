<?php 


require 'function.php';
$information = query ("SELECT * FROM information ORDER BY id ASC");


?>

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
    
      <form action="" class="form-inline">
          <div class="form-group">
            <select class="form-control" id="Kolom" name="Kolom" required="">
              <?php 
                $kolom=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
              ?>
              <option value="Nama" <?php if($kolom=="nama") echo "selected"; ?> >Nama</option>
              <option value="daerah" <?php if($kolom=="daerah") echo "selected"; ?> >Daerah</option>
            </select>
          </div>
            <div class="form-group">
              <input type="text" class="form-control" id="KataKunci" name="KataKunci" placeholder="Kata Kunci.." required="" value="<?php if (isset($_GET['KataKunci'])) echo $_GET['KataKunci']; ?>">
            </div><br>
            <button type="submit" class="btn">Cari</button>
             <a href="information.php" class="btn btn-danger">Reset</a>
      </form>
<br></br>
<div class="container table-responsive">
<table class="table" border="0" cellspacing="0" cellpadding="10" style="margin: auto;">
	<tr>
		<th>No. </th>
		
		<th>Customer Name</th>
		<th>Order Number</th>
		<th>Time</th>
		<th>Status</th>
	</tr>

	 <?php 
				$conn = mysqli_connect("localhost", "root", "", "verilive");
				$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
				$kolomCari=(isset($_GET['Kolom'])) ? $_GET['Kolom'] : "";
				$kolomKataKunci = (isset($_GET['KataKunci'])) ? $_GET['KataKunci'] : "";
				$limit = 5;
				$limitStart = ($page - 1) * $limit;

				if($kolomCari=="" && $kolomKataKunci==""){
					$result = mysqli_query($conn, "SELECT * from information LIMIT ".$limitStart.",".$limit);
				}else{
					$result = mysqli_query($conn, "SELECT * from information where $kolomCari LIKE '%$kolomKataKunci%' LIMIT ".$limitStart.",".$limit);
				}
				$no = $limitStart + 1;
				while($row = mysqli_fetch_array($result)){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['phone']; ?></td>
						<td><?php echo $row['gender']; ?></td>
					</tr>
					<?php 
				}
			 ?>
</table>

	<div style="margin: auto;">
    <ul class="pagination">
      <?php
      if($page == 1){ 
      ?>        
        <li class="disabled" style="list-style: none; display: inline;"><a href="#">Previous</a></li>
      <?php
      }
      else{ 
        $LinkPrev = ($page > 1)? $page - 1 : 1;
      ?>
        <li style="list-style: none;display: inline;"><a href="information.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
      <?php
        }
      ?>

      <?php
      $result = mysqli_query($conn, "SELECT * FROM information");        
      $JumlahData = mysqli_num_rows($result);
      $jumlahPage = ceil($JumlahData / $limit); 
      $jumlahNumber = 1; 
      $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
      $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
      for($i = $startNumber; $i <= $endNumber; $i++){
        $linkActive = ($page == $i)? ' class="active"' : '';
      ?>
        <li<?php echo $linkActive; ?>style="list-style: none;display: inline;"><a href="information.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php
        }
      ?>
      <?php       
      if($page == $jumlahPage){ 
      ?>
        <li class="disabled"style="list-style: none;display: inline;"><a href="#">Next</a></li>
      <?php
      }
      else{
        $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
      ?>
        <li style="list-style: none;display: inline;"><a href="information.php?page=<?php echo $linkNext; ?>">Next</a></li>
      <?php
      }
      ?>
    </ul>
  </div>
</div>
</article>
<br></br>


</body>
</html>