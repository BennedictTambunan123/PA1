<?php
include "../connect.php";
include "../auth.php"; 

// php update data in mysql database using PDO
$id = $_GET['id'];
$sql = "SELECT * FROM pemesanan_meja WHERE id= $id";
$query = mysqli_query($koneksi,$sql);
$x = mysqli_fetch_array($query);
$nama = $x['nama'];
$no_handphone = $x['no_handphone'];
$total_meja = $x['total_meja'];
$total_pengunjung = $x['total_pengunjung'];
$jam = $x['jam'];
$tanggal = $x['tanggal'];

$daftar = "SELECT * FROM  meja ";
$daftar_query = mysqli_query($koneksi,$daftar);
$detail = mysqli_fetch_array($daftar_query);
$kapasitas_per_meja = $detail["kapasitas_meja"];
$harga_meja='Rp ' . number_format($detail["harga"], 0, ",", ".");

if(isset($_POST['ubah'])){
   
     $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $no_handphone = filter_input(INPUT_POST, 'no_handphone', FILTER_SANITIZE_STRING);
    // enkripsi password
    $total_pengunjung = filter_input(INPUT_POST, 'total_pengunjung');
    $kalkulasi_total_meja = $total_pengunjung / $kapasitas_per_meja;
    $total_meja = ceil($kalkulasi_total_meja);
    $jam = filter_input(INPUT_POST, 'jam');
    $tanggal = $_POST['tanggal'];
    $sql = "UPDATE pemesanan_meja SET  total_meja='$total_meja', total_pengunjung='$total_pengunjung', jam='$jam', tanggal='$tanggal' WHERE id=$id";
    $query = mysqli_query($koneksi,$sql);
    if($query){
        header("Location: daftar_pesanan.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Comforter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comforter&display=swap" rel="stylesheet">
    
    <title>Cafe Tepi Danau Bistro</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/stylee.css">
    <link rel="stylesheet" href="../assets/css/owl.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>



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
                    <a class="nav-link" href="index.php">Beranda
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 
                


                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pemesanan</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="pemesanan.php">Pemesanan Meja</a>
                      <a class="dropdown-item" href="daftar_pesanan.php">Daftar Antrian Pesanan</a>
                      <a class="dropdown-item" href="konfirmasi_pesanan.php">Konfirmasi Pesanan</a>
                    </div>
                </li>
                
                <li class="nav-item"><a class="nav-link" href="contact.php">Tentang </a></li>
                <li class="nav-item"><a class="nav-link" href="testimoni.php">Testimoni</a></li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo  $_SESSION["user"]["name"] ?>
                <div class="dropdown-menu">
                      <p class="dropdown-item"><?php echo $_SESSION["user"]["name"] ?></p>
                      
                      <p class="dropdown-item">
                      <img class="img img-responsive rounded-circle mb-3" width="160" src="../assets/images/profile.png">  </p>
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


    

    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Ubah Pemesanan Meja</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="" method="post">
                <div class="row">
                
                
                  

                  <div class="col-sm-6">
                    <fieldset>
                      <p class="text-left"> Total Pengunjung </p>
                      <input  value="<?= $total_pengunjung ?>"name="total_pengunjung" type="number" class="form-control" id="date" placeholder="Jumlah Pengunjung" required="" min="1">
                    </fieldset>
                  </div>




                 
                    <div class="col-sm-6">
                    <fieldset>
                    <p class="text-left"> Jam Kedatangan </p>
                      <input value="<?= $jam ?>" name="jam" type="time" class="form-control" id="date" placeholder="Jam Datang" max="21:00" min="11:00" required="">
                    </fieldset>
                  </div>

                  <div class="col-sm-6">
                    <fieldset>
                    <p class="text-left"> Tanggal Kedatangan </p>
                      <input value="<?= $tanggal ?>" name="tanggal" type="date" class="form-control" id="name" placeholder="Tanggal Datang" min="<?= date('Y-m-d') ?>" required="">
                    </fieldset>
                  </div>
                
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button" name="ubah">Ubah</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        
          <div class="col-md-4">
            <img src="../assets/images/other-image-fullscren-1-1920x900.jpeg" width="100%" class="img-fluid" alt="">

            <h5 class="text-center" style="margin-top: 15px;">Setiap Pemesanan 1 Meja</h5>
            <h5 class="text-center" style="margin-top: 15px;">Harga: <?=$harga_meja ?></h5>

          </div>
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


  </body>

  <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>

