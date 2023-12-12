
<?php
 include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Comforter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comforter&display=swap" rel="stylesheet">
    
    <title>Cafe Tepi Danau Bistro</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/stylee.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <style>
         body{
          font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                background-color:#28292a;
            }
            .containerr{
                margin:auto;
                width : 1000px;
                margin-bottom:100px;
            }
            .containerr h1{
                /* font-family:comforter; */
                font-size:bold;
                margin-top:200px; 
                color:#fff;
            }
            .containerr p{
                /* font-family:comforter; */
                font-size:bold;
                color:#fff;
                font-size:20px;
            }
            .containerr .row .col table{
              font-size:bold;
                color:#fff;
                font-size:10px;

            }
            .jam{
              margin-top:-150px
            }
            .jumbotron h1{
              border:2px solid white;
              border-bottom-width: 20px;
            }
    </style>
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
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
                
                <li class="nav-item active"><a class="nav-link " href="contact.php">Tentang </a></li>
                <li class="nav-item"><a class="nav-link " href="testimoni.php">Testimoni </a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login </a></li>

            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
    </div>
   
    <div class="jumbotron text-white jumbotron-image shadow" style="background-image: url(https://images.unsplash.com/photo-1552152974-19b9caf99137?fit=crop&w=1350&q=80);">
      <h1 class="text-center" style="margin-top:120px;">
        TENTANG
      </h1>
<hr> <hr>
      <div class="row">
          <div class="col">
            <div class="inner-content">
              <div class="row" >
                  <h4 style="font-size: 24px;color:white;margin:auto;">Profil Cafe Tepi Danau Toba Bistro</h4> <hr style="border: 1px solid white;width:100%">
                  <p style="font-size: 20px;color:white;">Tepi Danau Toba Bistro merupakan sebuah restoran yang berada di daerah Balige tepatnya di kawasan Lumban Silintong. Restoran ini merupakan salah satu restoran yang ramai dikunjungi, selain karena restoran ini memiliki bangunan yang menarik, restoran ini juga memiliki lokasi yang strategis dan dekat dengan tepi Danau Toba. Tepi danau sendiri di ambil dari lokasi bistro sendiri, yaitu di tepian danau toba. sedangkan bistro diambil dari  bahasa Prancis yang artinya restoran kecil. Tepi danau bistro di bangun pada bulan Agustus 2020 dan selesai pada Desember 2020 dan menyelenggarakan soft opening pada 20 Desember 2020. Beberapa menu andalan bistro yakni varian hotplate, nasi goreng sapi, ayam geprek, varian jus, juga lemon tea dingin yang menjadi favorit para pelanggan</p>
                </div>
              </div>
            </div>
          </div>
    </div>
   
    <div class="containerr" style="margin-top:-100px">

            <div class="row">
              <div class="col">
                <h1>Alamat</h1>
                <p>Jl.Pemandian no.1 , Desa Lumban Silintong.</p>
                <p>Balige</p>
                <p>Kabupaten Toba</p>
                <p>Sumatera Utara</p>
              </div>
            </div>
            <div class="jam">
            <h1 class="mb-3">Jam Operasional</h1>
              <table style="color:white" cellpadding="6">
                <tr>
                  <td>Senin</td>
                  <td>11:00 - 22.00</td>
                </tr>
                <tr>
                  <td>Selasa</td>
                  <td>11:00 - 22.00</td>
                </tr>
                <tr>
                  <td>Rabu</td>
                  <td>11:00 - 22.00</td>
                </tr>
                <tr>
                  <td>Kamis</td>
                  <td>11:00 - 22.00</td>
                </tr>
                <tr>
                  <td>Jumat</td>
                  <td>11:00 - 23.00</td>
                </tr>
                <tr>
                  <td>Sabtu</td>
                  <td>11:00 - 23.00</td>
                </tr>
                <tr>
                  <td>Minggu</td>
                  <td>11:00 - 23.00</td>
                </tr>
              </table>
              </div>
   
    </div>
          </div>
         
       

   
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
          </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>
</html>