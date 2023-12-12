
<?php
 include "../connect.php";
 require_once("../auth.php");
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
    <style>
         .body{
                background-color:#28292a;
                
            }
            .containerr{
                margin:auto;
    
                margin-bottom:300px;
            }
            .containerr h1{
                font-family:comforter;
                font-size:bold;
                margin-top:100px; 
                color:black;
            }
            .containerr table{
                margin : auto;
        
            }
            .btn{
              margin:5px;
              float:left;
            }
            td{
              margin:10px;
            }
            .body-class{
              background-color:#fff;margin-left:50px ;margin-right:50px;
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
                    <a class="nav-link" href="index_admin.php">Beranda
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link " href="hidangan_admin.php">Menu</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pesanan</a>
                    
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
    <div class="body">
    <div class="body-class">

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">

   <div class="container">
    <div class="containerr">
        <h1 class="text-center">Daftar Pesanan Yang Sudah Dikonfirmasi</h1>
        <div style="overflow-x:auto;">
    <table   class="text-center table table-striped" style="color:black">
        <tr style="background-color:#f33f3f ; color:black">
            <th>No</th>
            <th>Nama</th>
            <th>No Handphone</th>
            <th>Total Meja</th>
            <th>Total Pengunjung</th>
            <th>Jam</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <tr>
        <?php

    $id =$_SESSION["user"]["id"];        
    $sql = "SELECT * FROM pembayaran INNER JOIN pemesanan_meja on pembayaran.id_pemesanan = pemesanan_meja.id where status='Pesanan di Konfirmasi'";
    $query = mysqli_query($koneksi,$sql);
    $urut = 1;
    $hitung_data = mysqli_num_rows($query);
    if ($hitung_data > 0) {
    while($x = mysqli_fetch_array($query)){
        $id = $x['id'];
        $nama = $x['nama'];
        $no_handphone = $x['no_handphone'];
        $total_meja = $x['total_meja'];
        $total_pengunjung = $x['total_pengunjung'];
        $jam = $x['jam'];
        $tanggal = $x['tanggal'];
    
    ?>
    <td scope="row"><?php echo $urut++ ?></td>
    <td scope="row"> <?php echo $nama ?> </td>
    <td scope="row"> <?php echo $no_handphone ?> </td>
    <td scope="row"> <?php echo $total_meja ?> </td>
    <td scope="row"> <?php echo $total_pengunjung ?> </td>
    <td scope="row"> <?php echo $jam ?> </td>
    <td scope="row"> <?php echo $tanggal ?> </td>
    <td scope="row">
    <a href="detail_pesanan_admin.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-warning">Detail</button></a> <br> <br>
   
        
    </td>
    </tr>
    <?php }} else{
     ?> 
     <tr>
     <td colspan='8' class="text-center">Tidak ada Pesanan Meja yang di pesan</td>
 </tr> <?php
    } ?>
    </table>
        </div>
    </div>
   </div>
   </div>
       
    <footer>
    
        <div class="row" style="background-color:#28292a;"> 
          <div class="col-md-12">
            <div class="inner-content">
              <ul class="social-icons" style="margin:0px">
              <li><a target="_blank" href="https://www.facebook.com/pages/Tepi-Danau-Bistro/101258915344340"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="https://l.instagram.com/?u=https%3A%2F%2Flinktr.ee%2Ftepidanaubistro&e=ATPT26kMRVzyBSrfvWqwhwBn1xWRD4EyfzGhPssdWynqp1b9CcujQm2QiWVb50N3IcZcrW8gouPWTODiYAwdLwFldxeSJdDxUegzog&s=1"><i class="fa fa-whatsapp"></i></a></li>
                <li><a target="_blank" href="https://www.instagram.com/tepidanau_bistro/"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>
  </body>
</html>