<?php

require_once("../config.php");
require_once("../auth.php");
$message = "";
if(isset($_POST['tambah'])){


    // filter data yang diinputkan
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $jenis = filter_input(INPUT_POST, 'jenis', FILTER_SANITIZE_STRING);
    $keterangan = $_POST['keterangan'];
    // enkripsi password
    $harga = filter_input(INPUT_POST, 'harga');
    $status = filter_input(INPUT_POST, 'status');

    

    
    $file_size = $_FILES['gambar']['size'];
    $file_type = $_FILES['gambar']['type'];
    $fileName = $_FILES['gambar']['name'];//Tidak menampilkan Array saat menguplod
    $tempName = $_FILES['gambar']['tmp_name'];

//tentukan lokasi file akan dipindahkan
$dirUpload ='../hidangan/';
$con = mysqli_connect("localhost", "root", "" , "cafe bistro") or die($con);


//pindahkan file
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM hidangan WHERE gambar='$fileName' "));
if ($cek > 0){
echo "<script>window.alert('Tolong Ganti nama File Gambar') </script>";
} else if ($file_size < 2048000 and ($file_type == 'image/jpeg' or $file_type == 'image/png'))
    {
      $moveUpload = move_uploaded_file($tempName,$dirUpload.$fileName);
     $image   = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
     $sql = "INSERT INTO hidangan(nama_hidangan,jenis,harga,gambar,deskripsi,status)VALUES (:nama, :jenis, :harga ,:gambar ,:keterangan,:status)";
     $stmt = $db->prepare($sql);
     if($stmt->execute([':nama' => $nama, ':jenis' => $jenis, ':harga'=>$harga,':gambar' => $fileName ,':keterangan' => $keterangan,':status' => $status])){
      echo "<script>alert('Berhasil Ditambahkan'); document.location.href = 'hidangan_admin.php'; </script>";
    }
     else{
      echo "<script>alert('File Tidak Sesuai'); </script>";
     }
    }
    else{
      echo "<script>alert('File Gambar Tidak Sesuai');  </script>";
    }

    // menyiapkan query
   
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
    <style>
       
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
                    <a class="nav-link " href="index_admin.php">Beranda
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link active" href="hidangan_admin.php">Menu</a></li>

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
    
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Tambah Hidangan</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
            <form action="" method="POST" enctype="multipart/form-data" id="contact">
                <div class="row">
                
                
                  

                  <div class="col-sm-12">
                    <fieldset>
                      <p class="text-left"> Nama Hidangan     </p> 
                    <input class="form-control" type="text" name="nama" placeholder="Nama Hidangan" required/>
                 
                  </fieldset>
                  </div>




                  <div class="col-sm-6">
                    <fieldset>
                    <p class="text-left"> Jenis</p> 
                    <select class="custom-select" name="jenis" required="">
                    <option value="" not selected>Pilih</option>
                     <option  value="Makanan">Makanan</option>
                     <option value="Minuman">Minuman</option>
                </select>
                  </label>
                    </fieldset>
                  </div>

                  <div class="col-sm-6">
                    <fieldset>
                    <p class="text-left"> Status</p> 
                    <select class="custom-select" name="status" required="">
                    <option value="" not selected>Pilih</option>
                     <option  value="Tersedia">Tersedia</option>
                     <option value="Tidak Tersedia">Tidak Tersedia</option>
                </select>
                  </label>
                    </fieldset>
                  </div>

                  
                    <div class="col-sm-12">
                    <fieldset>
                    <p class="text-left"> Harga </p> 
                    <input class="form-control" type="number"  name="harga" placeholder="Harga" required min="1"/>
                    </label> 
                  </fieldset>
                  </div>

                  <div class="col-sm-12">
                    <fieldset>
                    <p class="text-left"> Keterangan   </p> 
                    <textarea class="form-control"  name="keterangan" required> </textarea>
                    </label>
      
                  </div>
                
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button" name="tambah">Tambah Hidangan</button>
                    </fieldset>
                  </div>
                </div>
         
            </div>
          </div>
        
          <div class="col-md-4">
            <img src="../img/image.png" width="100%" class="img-fluid" alt="">
            <input class="form-control" type="file" name="gambar"/>

            
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