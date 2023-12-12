<?php

require_once("../auth.php");
require_once("../connect.php");
$message = "";
$id = $_GET['id'];

if(isset($_POST['tambah'])){

  require_once("../config.php");
    // filter data yang diinputkan
    $nama = filter_input(INPUT_POST, 'nama');
    $jumlah = filter_input(INPUT_POST, 'jumlah', FILTER_SANITIZE_STRING);


    // menyiapkan query
    $sql = "INSERT INTO pemesanan_meja_hidangan(id_hidangan,id_meja,jumlah_hidangan)VALUES (:nama, $id,:jumlah)";
    $stmt = $db->prepare($sql);
    if($stmt->execute([':nama' => $nama , ':jumlah' => $jumlah])){
      echo "<script>alert('Pesanan Hidangan Berhasil Ditambahkan');  </script>";

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    
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
            <a  class="btn btn-light" href="daftar_pesanan_makanan.php?id=<?=$id?>"><i class="fa fa-angle-left"></i> Kembali Ke Detail </a>

              <h2>Tambah Hidangan Pada Pemesanan Meja</h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-form">
              <form id="contact" action="" method="post">
                <div class="row">
                
                
                  

      




                  <div class="col-sm-6">
                    <fieldset>
                <select class="selectpicker" data-live-search="true" name="nama" multiple title="Pilih Hidangan Anda" style="width:500px ; " multiple data-max-options="1">
                <optgroup label="Makanan" >
                     <?php
                $hidangan_makanan = "SELECT * FROM hidangan where jenis = 'Makanan' AND status='Tersedia' ";
                $hidangan_query1 = mysqli_query($koneksi,$hidangan_makanan);
                
                while($drop_hidangan=mysqli_fetch_array($hidangan_query1) ){
                  $daftarhidangan = $drop_hidangan['nama_hidangan'];
                  $id_hidangan = $drop_hidangan['id'];
                  $harga_hidangan = $drop_hidangan['harga'];
                  $harganya ="Rp.". number_format($harga_hidangan,0,",",".");
?> 
              <option value=<?php echo $id_hidangan;?> ><?php echo $daftarhidangan; ?> ||| Harga:<?php echo $harganya ?></option> 
<?php
                }
            ?>
                </optgroup>
                <optgroup label="Minuman">
                <?php
                $hidangan_minuman = "SELECT * FROM hidangan where jenis='Minuman' AND status='Tersedia' ";
                $hidangan_query2 = mysqli_query($koneksi,$hidangan_minuman);

                
                while($drop_hidangan=mysqli_fetch_array($hidangan_query2) ){
                  $daftarhidangan = $drop_hidangan['nama_hidangan'];
                  $id_hidangan = $drop_hidangan['id'];
                  $harga_hidangan = $drop_hidangan['harga'];
                  $harganya = number_format($harga_hidangan,0,",",".");
?> 
              <option value=<?php echo $id_hidangan;?> ><?php echo $daftarhidangan; ?> ||| Harga:<?php echo $harganya ?></option> 
<?php
                }
            ?>




                </optgroup>
       
                    </fieldset>
                  </div>
           
                    <div class="col-sm-6">
                    <fieldset>
                
                <input  type="number" name="jumlah" placeholder="Jumlah" min="1" class="form-control"required style="margin-left:0px;margin-top:20px"/>
                    </fieldset>
                  </div>

                
                
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button" name="tambah">Tambah Hidangan</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        
          <div class="col-md-8">
          <div  id="data"></div>  


</div>
<script>
 $(document).ready(function(){
      load_data();
      function load_data(page){
           $.ajax({
                url:"../data_3.php",
                method:"POST",
                data:{page:page},
                success:function(data){
                     $('#data').html(data);
                }
           })
      }
      $(document).on('click', '.halaman', function(){
           var page = $(this).attr("id");
           load_data(page);
      });
 });
 </script>
          
        
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
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>

    <script>
  $('.selectpicker').selectpicker();
  </script>
  </body>
</html>