
<?php
require_once("../auth.php");
require_once("../connect.php");
 $id = $_GET["id"];

$daftar = "SELECT * FROM pemesanan_meja INNER JOIN meja ON pemesanan_meja.id_meja = meja.id where pemesanan_meja.id=$id";
$daftar_query = mysqli_query($koneksi,$daftar);
$detail = mysqli_fetch_array($daftar_query);
$harga_meja= $detail['harga'];
$per_pengunjung = ceil($detail["total_pengunjung"]/ ($detail['kapasitas_meja'] * 2));
$harga_full_meja = $harga_meja *  $per_pengunjung;
$format_harga_meja='Rp ' . number_format($harga_full_meja, 0, ",", ".");
$cek_empty = "SELECT * FROM pemesanan_meja_hidangan where id_meja = $id; ";
$sql = "SELECT a.id as id_p , b.harga,b.nama_hidangan,a.jumlah_hidangan FROM pemesanan_meja_hidangan a INNER JOIN hidangan b ON a.id_hidangan = b.id where id_meja = $id";
$query = mysqli_query($koneksi,$sql);
$empty = mysqli_query($koneksi,$cek_empty);

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
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Goldman&family=Macondo&family=Permanent+Marker&family=Roboto:wght@300&family=Tapestry&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comforter&display=swap" rel="stylesheet">
    
    <title>Cafe Tepi Danau Bistro</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/stylee.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <style>
         body{
                background-color:#28292a;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
              }
            .containerr{
                margin:auto;
                width : 1000px;
                margin-bottom:300px;
                background-color:black;
                margin-top:100px;
                border-radius:10px;
                padding-top:1px;
            }
            .container h1{
                font-family:comforter;
                font-size:bold;
                color:#fff;
            }
            .container table{
                margin : auto;
                width : 900px;
                font-family:roboto;
            }
            .detail{
                font-family: Arial, Helvetica, sans-serif;
                font-size:bold;
                font-size:20px; 
                color:#fff;
                margin:10px;
            }
            .btn{
                float:right;
                margin-bottom:3px;
                margin:2px;
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
                <a class="nav-link  dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo  $_SESSION["user"]["name"] ?>
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


    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
    </div>
   
    <div class="container" style="   margin-bottom:300px;
                 background-color:black;
                margin-top:100px;
                border-radius:10px;
                padding-top:1px;
                color:white;box-shadow: 5px 10px white;border:2px solid gray"
                >
      <h1 class="text-center mt-4"> Detail Pesanan </h1>

      <div class="mb-10 row" style="font-size:14px">
    <label for="nama" class="col-sm-2 col-form-label" > Nama </label>
    <div class="col-sm-10">
      <h6> :<?=  $detail['nama'] ?>  </h6>
    </div>
    <label for="total" class="col-sm-2 col-form-label">Total Meja Pesanan</label>
    <div class="col-sm-10">
      <h6> :<?=  $detail['total_meja'] ?>  </h6>
    </div>
    <label for="pengunjung" class="col-sm-2 col-form-label">Total Pengunjung</label>
    <div class="col-sm-10">
      <h6> :<?=  $detail['total_pengunjung'] ?>  </h6>
    </div>
    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Datang</label>
    <div class="col-sm-10">
      <h6> :<?=  $detail['tanggal'] ?>  </h6>
    </div>
    <label for="jam" class="col-sm-2 col-form-label">Jam Datang</label>
    <div class="col-sm-10">
      <h6> :<?=  $detail['jam'] ?>  </h6>
    </div>
    <label for="jam" class="col-sm-2 col-form-label">Harga Pesanan meja</label>
    <div class="col-sm-10">
      <h6> :<?=  $format_harga_meja ?> </h6>
    </div>
      </div>

    
        <?php
        if(!empty(mysqli_fetch_array($empty))){

     
        ?>
   
        <h1 class="text-center mt-5 mb-2">Daftar Hidangan yang dipesan</h1>
        <div style="overflow-x:auto;">
    <table border="2" class="text-center" style="color:#fff;">
        <tr>
            <th>No</th>
            <th>Nama Hidanngan</th>
            <th> Jumlah </th>
            <th> Harga </th>
            <th>Aksi</th>
        </tr>
        <tr>
        <?php
        }
    
    $urut = 1;
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
      <td>   
        <a onclick="return confirm('Anda Yakin?');" href="hapus_pesanan_hidangan.php?id=<?php echo $ids ; ?>&ids=<?php echo $id ?> "><button style="float:none;"type="button" class="btn btn-danger">Hapus</button> </a>       
      </td>
   </tr>
 
   
        

  
    <?php } ?>
    </table>
        
    <?php 
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
    ?>
  
  <table class="mt-3">
    <tr>
      <td><h1 style="font-family:bebas neue"> Total Bayar: <?php echo $hasil1 ?></h1></td>
      <td>
        <a href="pembayaran.php?id=<?php echo $id; ?> "><button  type="button" class="btn btn-success">Pembayaran</button> </a>   
         
        <a href="pemesanan_hidangan.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-warning">Tambah Hidangan</button></a>
      </td>
    </tr>
  </table>

   
           
 
<br>
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


    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>
  </body>
</html>