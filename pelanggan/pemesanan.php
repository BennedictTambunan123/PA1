<?php
require_once("../connect.php");
require_once("../auth.php");
$message = "";
$daftar = "SELECT * FROM  meja ";
$daftar_query = mysqli_query($koneksi,$daftar);
$detail = mysqli_fetch_array($daftar_query);
$kapasitas_per_meja = $detail["kapasitas_meja"];
$harga_meja='Rp ' . number_format($detail["harga"], 0, ",", ".");

if(isset($_POST['pesan'])){

  require_once("../config.php");

    // filter data yang diinputkan
    $nama =  $_SESSION["user"]["name"];
    $no_handphone = $_SESSION["user"]["no_handphone"];
    // enkripsi password

    $total_pengunjung = filter_input(INPUT_POST, 'total_pengunjung');
    $kalkulasi_total_meja = $total_pengunjung / $kapasitas_per_meja;
    $total_meja = ceil($kalkulasi_total_meja);
    $jam = filter_input(INPUT_POST, 'jam');
    $tanggal = filter_input(INPUT_POST, 'tanggal');
    $id = $_SESSION["user"]["id"];

    // menyiapkan query
    $sql = "INSERT INTO pemesanan_meja(id_users,nama, no_handphone, total_meja, total_pengunjung,jam,tanggal,id_meja)VALUES ($id,'$nama', '$no_handphone', :total_meja, :total_pengunjung, :jam, :tanggal,1)";
    $stmt = $db->prepare($sql);
    if($stmt->execute([ 'total_meja'=>$total_meja, 'total_pengunjung'=>$total_pengunjung, 'jam'=>$jam, 'tanggal' => $tanggal])){
        header("Location: daftar_pesanan.php?pesan=update");
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
                    <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pemesanan</a>
                    
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
              <h2>Pemesanan Meja</h2>
              <?php
              ?>
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
                      <button type="submit" id="form-submit" class="filled-button" name="pesan">Pesan Meja</button>
                    </fieldset>
                  </div>
                  <h6 style="color:red;text-align:justify"class="mt-4">*Note : <br>JIKA JUMLAH PENGUNJUNG  LEBIH DARI 8 ORANG MAKA DIWAJIBKAN UNTUK MEMESAN HIDANGAN</h6>
                </div>
              </form>
            </div>
          </div>
        
          <div class="col-md-4">
            <img src="../assets/images/other-image-fullscren-1-1920x900.jpeg" width="100%" class="img-fluid" alt="">
            <h5 class="text-center" style="margin-top: 15px;">Kapasitas permeja untuk <?= $kapasitas_per_meja ?> orang</h5>
            <h5 class="text-center" style="margin-top: 15px;">Setiap Pemesanan 1 - <?= $kapasitas_per_meja * 2?> Pengunjung</h5>
            <h5 class="text-center" style="margin-top: 15px;"> Harga:<?= $harga_meja  ?></h5>

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


    <style>
  .error {
    color: yellow;
  }
</style>
<script>
  $(document).ready(function () {
    $('#form').validate({
      rules: {
        nama: {
          required: true
        },
        total_meja: {
          required: true,
          max: 4,
          min: 1,
          number:true
        },
        total_pengunjung: {
          required: true,
          min: 1,
          number:true
        },
        no_handphone: {
          required: true,
          rangelength: [10, 12],
          number: true
        },
        jam: {
          required: true,
          max: "23:00",
          min: "09:00"
        },
        password: {
          required: true,
          minlength: 8
        },
        confirmPassword: {
          required: true,
          equalTo: "#password"
        }
      },
      messages: {
        nama: 'Tolong isi Nama Lengkap Anda',
        total_meja: {
          required: 'Tolong Isi Jumlah Meja Pesanan Anda',
          max: 'Maksimal Pemesanan sampai 4',
          min: 'Minimal Pemesanan harus 1',
          number: 'Tolong isi dengan nomor',
        },
        total_pengunjung: {
          required: 'Tolong Isi Jumlah Meja Pesanan Anda',
          min: 'Minimal Pemesanan harus 1',
          number: 'Tolong isi dengan nomor',
        },
        no_handphone: {
          required: 'Tolong isi nomor handphone Anda',
          rangelength: 'Nomor Handphone hanya dapat disi 10 sampai 12'
        },
        jam: {
          required : 'Tolong Waktu Kunjung',
          min:'Waktu Buka Pada Jam 09:00',
          max:'Waktu Tutup Pada Jam 23:00',
        } ,
        password: {
          required: '',
          minlength: 'Password must be at least 8 characters long.',
        },
        confirmPassword: {
          required: 'Please enter Confirm Password.',
          equalTo: 'Konfirmasi Password tidak sesuai denga.',
        }
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  });
</script>
  </body>
</html>