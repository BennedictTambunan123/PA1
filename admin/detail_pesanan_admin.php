
<?php
 include "../connect.php";
 require_once("../auth.php");

 $id = $_GET["id"];

$daftar = "SELECT * FROM pemesanan_meja INNER JOIN meja on id_meja = meja.id where pemesanan_meja.id=$id";
$daftar_query = mysqli_query($koneksi,$daftar);
$detail = mysqli_fetch_array($daftar_query);
$harga_meja= $detail['harga'];
$per_pengunjung = ceil($detail["total_pengunjung"]/ ($detail['kapasitas_meja'] * 2));
$harga_full_meja = $harga_meja *  $per_pengunjung;
$format_harga_meja='Rp ' . number_format($harga_full_meja, 0, ",", ".");
$gambar = "SELECT * FROM pembayaran where id_pemesanan=$id";
$gambar_query = mysqli_query($koneksi,$gambar);
$fetch_gambar = mysqli_fetch_array($gambar_query);
$gambar_bukti = $fetch_gambar['gambar'];
$total_harga ="SELECT SUM(pemesanan_meja_hidangan.jumlah_hidangan * hidangan.harga) as jumlah
   FROM pemesanan_meja_hidangan
   INNER JOIN hidangan
   ON pemesanan_meja_hidangan.id_hidangan = hidangan.id where id_meja = $id
   ;";
   $total_query =mysqli_query($koneksi,$total_harga);
   $totalnya =mysqli_fetch_array($total_query);
   $total_makanan = $totalnya["jumlah"];
   $keseluruhan = $total_makanan + $harga_full_meja;
   $hasil1 ='Rp ' . number_format($keseluruhan,0,",",".");
   $sql = "SELECT a.id as id_p , b.harga,b.nama_hidangan,a.jumlah_hidangan FROM pemesanan_meja_hidangan a INNER JOIN hidangan b ON a.id_hidangan = b.id where id_meja = $id";
   $query = mysqli_query($koneksi,$sql);



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
                    <a class="nav-link " href="index_admin.php">Beranda
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
                      <img class="img img-responsive rounded-circle mb-3" width="160" src="/assets/images/profile.png">  </p>
                      <p class="dropdown-item"><?php echo $_SESSION["user"]["email"] ?></p>
                      <a class="dropdown-item" href="../logout.php">Log Out</a>

                     
                    </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="banner header-text">      </div>

    <div class="send-message">
    
      <div class="container">
        
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Konfirmasi Pesanan</h2>
            </div>
          </div>
          
          <div class="col-md-8">
            <div class="contact-form">
            <form action="" method="POST" enctype="multipart/form-data" id="contact"> 
                <div class="row">
                
                
                  

                  <div class="col-sm-12">
                    <fieldset>
                      <p class="text-left"> Nama Pemesan  </p> 
                    <input class="form-control" type="text" name="nama" placeholder="Nama Hidangan" value="<?=$detail['nama'] ?>"required readonly/>
                 
                  </fieldset>
                  </div>




                  <div class="col-sm-12">
                    <fieldset>
                    <p class="text-left"> Nomor Handphone  </p> 
                    <input class="form-control" type="text" name="nama" placeholder="Nama Hidangan" value="<?=$detail['no_handphone'] ?>"required readonly/>
                    </fieldset>
                  </div>
                  <div class="col-sm-12">
                    <fieldset>
                    <p class="text-left"> Jumlah Pesanan Meja  </p> 
                    <input class="form-control" type="text" name="nama" placeholder="Nama Hidangan" value="<?=$detail['total_meja'] ?>"required readonly/>
                    </label> 
                  </fieldset>
                  </div>
                  <div class="col-sm-12">
                    <fieldset>
                    <p class="text-left"> Total Pengunjung  </p> 
                    <input class="form-control" type="text" name="nama" placeholder="Nama Hidangan" value="<?=$detail['total_pengunjung'] ?>"required readonly/>
                    </label> 
                  </fieldset>
                  </div>


                    <div class="col-sm-12">
                    <fieldset>
                    <p class="text-left"> Total Harga Pesanan  </p> 
                    <input class="form-control" type="text" name="nama" placeholder="Nama Hidangan" value="<?=$hasil1 ?>"required readonly/>
                    </label> 
                  </fieldset>
                  </div>
                  <div class="col-sm-12">
                    <fieldset>
                    <p class="text-left"> Jenis Pembayaran  </p> 
                    <input class="form-control" type="text" name="nama" placeholder="Nama Hidangan" value="<?=$fetch_gambar['jenis_pembayaran'] ?>"required readonly/>
                    </label> 
                  </fieldset>
                  </div>

                  <div class="col-sm-12">
                    <fieldset>
                  
  
   
        <h1 class="text-center mt-5 mb-2">Daftar Hidangan yang dipesan</h1>
        <div style="overflow-x:auto;">
    <table border="2" class="text-center table table-striped" style="color:black;">
        <tr>
            <th>No</th>
            <th>Nama Hidanngan</th>
            <th> Jumlah </th>
            <th> Harga </th>
        </tr>
        <tr>
        <?php
        
    
    $urut = 1;
    $hitung_data = mysqli_num_rows($query);
    if ($hitung_data > 0) {
    while($x = mysqli_fetch_array($query)){
      $nama_hidangan = $x['nama_hidangan'];
      $jumlah_hidangan = $x['jumlah_hidangan'];
      $harga =$x['harga'];
      $harga_full = $harga * $jumlah_hidangan;
      $hasil = 'Rp ' . number_format($harga_full, 0, ",", ".");
      $ids = $x["id_p"];

       ?> 
       <td> <?php echo $urut++ ?> </td>
       <td> <?php echo $nama_hidangan ?> </td>
       <td> <?php echo $jumlah_hidangan ?>
       <td> <?php echo $hasil ?>  <?php 
       
    ?>
     </tr>

 
   
        

  
    <?php }}else{
?> 
 <td colspan='4' class="text-center">Tidak ada Pesanan Hidangan</td>
<?php
   
   
   
   } ?>
    </tr>
    </table>
    


                    </fieldset>
                  </div>
                
                  <div class="col-lg-12">
              
                  </div>
                </div>
         
            </div>
          </div>
        
          <div class="col-md-4">
            <h6 class="text-center">Bukti Pembayaran </h6>
            <img src="../bukti_pembayaran/<?= $gambar_bukti ?>" width="100%" class="img-fluid" alt="">
          
            
          </div>
        </div>
      </div>
      </form>
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


    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>
  </body>
</html>