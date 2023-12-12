<?php

require_once("../auth.php");
require_once("../connect.php");
$message = "";
$id = $_GET['id'];
$id_user = $_SESSION["user"]["id"];
date_default_timezone_set("Asia/Jakarta");
$cekty = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM pemesanan_meja INNER JOIN meja ON id_meja = meja.id Where pemesanan_meja.id= $id "));
$date1 = $cekty['tanggal'];
$date2 = $cekty['jam'];
$date3 = date_create("$date1 $date2");
date_add($date3, date_interval_create_from_date_string('-1 hours'));
$date4= date_format($date3, 'Y-m-d ');
$Clock= date_format($date3, 'H:i');

$per_pengunjung = ceil($cekty["total_pengunjung"]/ ($cekty['kapasitas_meja'] * 2));
$harga_meja= $cekty['harga'];
$harga_full_meja = $harga_meja *  $per_pengunjung;
$format_harga_meja='Rp ' . number_format($harga_full_meja, 0, ",", ".");


$total_harga ="SELECT SUM(pemesanan_meja_hidangan.jumlah_hidangan * hidangan.harga) as jumlah
   FROM pemesanan_meja_hidangan
   INNER JOIN hidangan
   ON pemesanan_meja_hidangan.id_hidangan = hidangan.id where id_meja = $id
   ;";
   $total_query =mysqli_query($koneksi,$total_harga);
   $totalnya =mysqli_fetch_array($total_query);
   $total_makanan = $totalnya["jumlah"];
   $keseluruhan = $total_makanan + $harga_full_meja;
   $totalnya = number_format($keseluruhan,0,",",".");
   $totalnya_makanan ="Rp.". number_format($total_makanan,0,",",".");

   



if(isset($_POST['kirim'])){

  require_once("../config.php");
    // filter data yang diinputkan
    $nama = filter_input(INPUT_POST, 'nama');
    $jenis = filter_input(INPUT_POST, 'jenis', FILTER_SANITIZE_STRING);
    $file_size = $_FILES['gambar']['size'];
    $file_type = $_FILES['gambar']['type'];
    $fileName = $_FILES['gambar']['name'];
    $tempName = $_FILES['gambar']['tmp_name'];
    $con = mysqli_connect("localhost", "root", "" , "cafe bistro") or die($con);
    $cekx = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM pemesanan_meja where id=$id"));
    $tanggal_pesanan = $cekx['tanggal'];


$date1 = $cekx['tanggal'];
$date2 = $cekx['jam'];
$date3 = date_create("$date1 $date2");
date_add($date3, date_interval_create_from_date_string('-1 hours'));
$date4= date_format($date3, 'Y-m-d H:i:s');

$date = date('Y-m-d H:i:s');


$cekt = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pembayaran Where id_pemesanan = $id "));

//tentukan lokasi file akan dipindahkan
$dirUpload ='../bukti_pembayaran/';


$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM pembayaran WHERE gambar='$fileName' "));
if (strtotime($date) >= strtotime($date4)) {
  echo "<script>alert('Waktu Untuk Pembayaran sudah habis'); document.location.href = 'daftar_pesanan.php'; </script>";
} 
else if ($cekt > 0){
  echo "<script>alert('Tidak Bisa melakukan dua kali pembayaran'); document.location.href = 'daftar_pesanan.php'; </script>";
  }
else if ($cek > 0){
echo "<script>window.alert('Tolong Ganti nama File Gambar') </script>";
} else if ($file_size < 2048000 and ($file_type == 'image/jpeg' or $file_type == 'image/png'))
    {
      $moveUpload = move_uploaded_file($tempName,$dirUpload.$fileName);


    // menyiapkan query
    $sql = "INSERT INTO pembayaran(nama_pengirim,id_pemesanan,jenis_pembayaran,status,gambar,total_harga)VALUES (:nama,$id,:jenis ,'Tunggu Konfirmasi',:bukti,$keseluruhan) ";
    $stmt = $db->prepare($sql);
    if($stmt->execute([':nama' => $nama , ':jenis' => $jenis ,':bukti' => $fileName])){
        header("Location: konfirmasi_pesanan.php");
    }
    
  }
  else{
    echo "<script>alert('File Gambar Tidak Sesuai');  </script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/stylee.css">
    <link rel="stylesheet" href="../assets/css/owl.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>


<style>
 .gbr img{
            width : 240px;
          }
          .gbr p{
            color:black;
            font-size:20px;
          }
        tr{
          width: 50%;
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
                <li class="nav-item">
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


    

        <div class="banner header-text">  </div>
    <div class="send-message">


      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="row">
            <div class="col-md-6">


     

<h2>PEMBAYARAN</h2>


              <table border="1" style="width:90% ;">
              <tr class="text-left font-weight-bold">
          <td>Nama Pemesan</td>  <td>   :  </td><td><h6 class="text-left font-weight-bold"><?=  $cekty['nama'] ?>     </td></td>
        </tr>
        <tr class="text-left font-weight-bold">
          <td>Total Meja</td>  <td>   :    </td><td><h6 class="text-left font-weight-bold"><?=  $cekty['total_meja'] ?>     </td></td>
        </tr> 
        <tr class="text-left font-weight-bold">
          <td>Total Pengunjung     </td>  <td>   : </td><td><h6 class="text-left font-weight-bold"><?=  $cekty['total_pengunjung'] ?>     </td>
        </tr>
        <tr class="text-left font-weight-bold">
          <td>Jam Datang     </td>  <td>   :   </td><td><h6 class="text-left font-weight-bold"><?=  $cekty['jam'] ?>     </td>
        </tr>
        <tr class="text-left font-weight-bold">
          <td>Harga Pemesanan Meja     </td>  <td>  : </td><td><h6 class="text-left font-weight-bold"><?=  $format_harga_meja ?></td>
        </td></td>
        <tr class="text-left font-weight-bold">
          <td>Harga Pemesanan Hidangan     </td>  <td>  : </td><td> <?=  $totalnya_makanan ?></td>
        </tr>
        


                <tr>
           <td>   <h6 class="text-left font-weight-bold ">Tanggal Batas Pembayaran </td> <td> : </td> 
              <td> <h6 class="text-left font-weight-bold"> <?php echo $date4 ?> </h6></td> 
        </tr>   <tr>
              <td>  <h6 class="text-left font-weight-bold">Jam Batas Pembayaran </td> <td>  : </td >
                  <td> <h6 class="text-left font-weight-bold"> <?=$Clock  ?></h6> </td>
        </tr>
        
        </tr>
            <tr>
                <td> <h6 class="text-left font-weight-bold">Total Pembayaran     </td>  <td>  : </td> <td> <h6 class="text-left font-weight-bold"> Rp. <?php echo $totalnya ?> </h6> </td>
        </tr>
        </table>
            </div>
            <div class="col-md-6">

            <div class="alert alert-danger text-left" role="alert">
  Perhatian!!! Tolong melakukan pembayaran sesuai dengan total harga agar pesanan di konfirmasi 
        </div>
            
            </div></div> </div>



                 
          
          </div>
          <div class="col-md-4">
            <div class="contact-form">
              <form id="contact" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                
                <input class="form-control" type="hidden" name="nama" value="<?=$_SESSION['user']['name']  ?>" required/>
           
                

              <div style=" border-radius:10px;
        background-color:#F0FFF0;
       filter: opacity(95%);margin-top:200px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                  <div class="col-sm-12" style="margin-top:10px ;">
                    <fieldset> 
                    <h6 class="text-left"> Pilih Metode Pembayaran </h6>
                    <select class="custom-select" name="jenis" required="">
                    <option not selected value=""> Pilih Jenis Pembayaran </option>
                     <option value="OVO">OVO</option>
                     <option value="DANA">DANA</option>
                     <option value="BNI">BNI</option>
                     <option value="Mandiri">Mandiri</option>
                     <option value="GO PAY">GO PAY</option>
                </select>
                    </fieldset>
                  </div>




                  <div class="col-sm-12">
                    <fieldset>
                    <h6 class="text-left"> Masukan Bukti pembayaran </h6>
                    <div class="mb-3">
                    <input style="margin:0px"class="form-control" type="file" id="formFile" name="gambar" required=""/>
                    </div>
                    </fieldset>
                  </div>
                    
                
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button" name="kirim">Kirim</button>
                    </fieldset>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        
          <div class="col-md-8">


            <h3 class="text-center" style="margin-top: 15px;">Media Pembayaran

            <div class="gbr">
            <img src="../img/qris.jpeg" class="mx-auto d-block"/>
   
   <p>BarCode Qris</p>
      <img src="../img/mandiri.jpg" class="mx-auto d-block"/>
   
      <p>Bank Mandiri - 107 00 0644 237 2</p>
      <br>
      <!-- <a href="https://www.dana.id/" target="_blank"> LINK DANA </a> <br><br>
       -->
      <img src="../img/bri.png" class="mx-auto d-block"/>
      <p> Bank BRI - 031401030857507 </p>
      <br>
      <!-- <a href="https://www.ovo.id/" target="_blank"> LINK OVO </a> <br><br> -->
      </div>
        </h3>

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



    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>


   
  </body>
</html>