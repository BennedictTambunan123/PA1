<?php
 include "connect.php";
 date_default_timezone_set("Asia/Jakarta");



?>



<!DOCTYPE html>
<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <title>Cafe Tepi Danau Bistro</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/stylee.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/comment.css">


    <style>
        body{
          font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

      </style>
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    
   
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Tepi <em>Danau</em> Bistro</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link " href="index.php">Beranda
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pemesanan</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" onClick="alert('Silahkan Login dulu');document.location.href = 'login.php';"  href="#">Pemesanan Meja</a>
                      <a class="dropdown-item" onClick="alert('Silahkan Login dulu');document.location.href = 'login.php';"  href="#">Konfirmasi Pesanan</a>
                      <a class="dropdown-item" onClick="alert('Silahkan Login dulu');document.location.href = 'login.php';"  href="#">Daftar Pesanan</a>
                    </div>
                </li>
                
                <li class="nav-item"><a class="nav-link " href="contact.php">Tentang </a></li>
                <li class="nav-item active"><a class="nav-link " href="testimoni.php">Testimoni </a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login </a></li>

            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text"> 
      







    <div class="container" style="text-align:left;">

      <div class="container mt-5">



            <div class="panel panel-info">
                <div class="panel-body">
                    <form action="index.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Komentar:</label><br>
                                <textarea  name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tulis Komentar Anda" required></textarea>
                                <br>
                                    <button name="addreview" type="submit" class="btn btn-primary" onClick="alert('Silahkan Login dulu');document.location.href = 'login.php';"  href="#">Tambah Komentar</button>
                                </form>


      </div>
            </div>
        </div>
      </div>
            </div>
            </div>
<div class="container" style="border:1px solid black;width:100%">
<div class="be-comment-block">
    <?php 
											$brgs=mysqli_query($koneksi,"SELECT * from testimoni INNER JOIN users ON testimoni.id_users = users.id order by testimoni.create_at DESC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){
												$id = $p['id'];

                       
$day = date('D', strtotime($p["create_at"]));
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);

												?>
     
   
                       <div class="be-comment">
		<div class="be-img-comment">	
			<a href="">
				<img src="assets/images/profile.png" alt="" class="be-ava-comment">
			</a>
		</div>
		<div class="be-comment-content">
			<span class="be-comment-name">
				<a href="#"><?= $p["name"] ?></a>
			</span>
			<span class="be-comment-time">
				<i class="fa fa-clock-o"></i>
				<?= $dayList[$day] ?>-<?= $p["create_at"] ?>
			</span>
			<p class="be-comment-text">
				<?= $p["komentar"] ?>
			</p>
		</div>
	</div>
  <?php 
											}
											?>

                            </div>
                        </div>
                    </div>
                </div>
               
               
</div>
                </div>



                    </div>

<br>
<br>
<footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <ul class="social-icons">
                <li><a target="_blank" href="https://www.facebook.com/pages/Tepi-Danau-Bistro/101258915344340"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="https://l.instagram.com/?u=https%3A%2F%2Flinktr.ee%2Ftepidanaubistro&e=ATPT26kMRVzyBSrfvWqwhwBn1xWRD4EyfzGhPssdWynqp1b9CcujQm2QiWVb50N3IcZcrW8gouPWTODiYAwdLwFldxeSJdDxUegzog&s=1"><i class="fa fa-whatsapp"></i></a></li>
                <li><a target="_blank" href="https://www.instagram.com/tepidanau_bistro/"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>

                    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>
</html>