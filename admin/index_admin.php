<?php
 require_once("../auth.php");
 include "../connect.php";
$user = "SELECT COUNT(id) as jumlah from users where id_role=1";
$pesaan_belum_konfirmasi = "SELECT COUNT(id) as jumlah from pembayaran Where status='Tunggu Konfirmasi'";
$pesanan_konfirmasi = "SELECT COUNT(id) as jumlah from pembayaran Where status='Pesanan di Konfirmasi'";
$users = mysqli_query($koneksi,$user);
$pesan_belum = mysqli_query($koneksi,$pesaan_belum_konfirmasi);
$pesan_konfirm = mysqli_query($koneksi,$pesanan_konfirmasi);
$count_user = mysqli_fetch_array($users);
$count_pesanan_belum = mysqli_fetch_array($pesan_belum);
$count_pesanan_udah = mysqli_fetch_array($pesan_konfirm);
?>

<!DOCTYPE html>
<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Cafe Tepi Danau Bistro</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/stylee.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/comment.css">
        <!-- amchart css -->
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- modernizr css -->
	

    <style>
        body{
          font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .icon{
          background-color: #f33f3f;
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
          <a class="navbar-brand" href="index_admin.php"><h2>Tepi <em>Danau</em> Bistro</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index_admin.php">Beranda
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link " href="hidangan_admin.php">Menu</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pesanan</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="konfirmasi_pesanan.php">Konfirmasi Pesanan</a>
                      <a class="dropdown-item" href="daftar_pesanan.php">Daftar Pesanan</a>
                    </div>
                </li>

                <li class="nav-item"><a class="nav-link " href="contact_admin.php">Tentang</a></li>

                </li>
                
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo  $_SESSION["user"]["name"] ?>
                <div class="dropdown-menu">
                      <p class="dropdown-item"><?php echo $_SESSION["user"]["name"] ?></p>
                      
                      <p class="dropdown-item">
                      <img class="img img-responsive rounded-circle mb-3" width="160px" src="../assets/images/profile.png">  </p>
                      <p class="dropdown-item"><?php echo $_SESSION["user"]["email"] ?></p>
                      <a class="dropdown-item" href="../logout.php">Log Out</a>

                     
                    </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

            

    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h2 style="width:700px;margin:auto; box-shadow: 1px 2px 4px 5px;background-color:#f33f3f;color:aliceblue;border-radius:10px">Selamat Datang Admin</h2>
          </div>
        </div>
        <div class="banner-item-02">
        <div class="text-content">
            <h2 style="width:700px;margin:auto; box-shadow: 1px 2px 4px 5px;background-color:#f33f3f;color:aliceblue;border-radius:10px">Selamat Datang Admin</h2>
          </div>
        </div>
        <div class="banner-item-03">
        <div class="text-content">
            <h2 style="width:700px;margin:auto; box-shadow: 1px 2px 4px 5px;background-color:#f33f3f;color:aliceblue;border-radius:10px">Selamat Datang Admin</h2>
          </div>
        </div>
      </div>
    </div>
      </div>
   



            <div class="container" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top: 20px;">
			
                
                <div class="sales-report-area mt-5 mb-5">

              

                    <div class="row">
                        <div class="col-md">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <a href="manage_user.php"><div class="icon" style="background-color:#fb3653 ;"><i class="fa fa-user"></i></div></a>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <a href="manage_user.php"><h4 class="header-title mb-0">Pelanggan</h4></a>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1><?php echo $count_user["jumlah"] ?></h1>
                                    </div>
									</div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-md">
                            <div class="single-report">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <a href="konfirmasi_pesanan.php"><div class="icon" style="background-color:#fb3653 ;"><i class="fa fa-book"></i></div></a>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <a href="konfirmasi_pesanan.php"><h4 class="header-title mb-0">Pesanan Yang Belum Dikonfirmasi</h4></a>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1><?php echo $count_pesanan_belum["jumlah"] ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-md">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <a href="daftar_pesanan.php"><div class="icon" style="background-color:#fb3653 ;"><i class="fa fa-check"></i></div></a>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <a href="daftar_pesanan.php"><h4 class="header-title mb-0">Pesanan Yang Dikonfirmasi</h4></a>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1><?php echo $count_pesanan_udah["jumlah"] ?></h1>
                                    </div>
							
                                </div>
                            </div>
                        </div>
                        
                    </div>
<hr>
                    <div class="col-md d-flex  justify-content-center" >

                    <div class="single-report mb-xs-30" style="margin:5px;">
                                <div class="s-report-inner pr--20 pt--30 mb-3" style="">
                                    <a href="ubah_meja.php"><div class="icon" style="background-color:#fb3653 ;"><i class="fa fa-table"></i></div></a>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <a href="ubah_meja.php"><h4 class="header-title mb-0">Kelola Meja</h4></a>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                    </div>
							
                                </div>
                            </div>

                            <div class="single-report mb-xs-30" style="margin:5px" >
                                <div class="s-report-inner pr--20 pt--30 mb-3" style="">
                                    <a href="testimoni.php"><div class="icon" style="background-color:#fb3653 ;"><i class=" fa fa-comment"></i></div></a>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <a href="testimoni.php"><h4 class="header-title mb-0">Daftar Testimoni</h4></a>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                    </div>
							
                                </div>
                            </div>
                        </div>
                        </div>
                        
                


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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>
  </body>
</html>