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
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/stylee.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <style>
         body{
          font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            .containerr{
                background-color:black;
                margin:auto;
                border-radius: 15px 50px 30px;
                width:1200px
            }
            .containerr section{
              margin : 15px;
            }
            .containerr h1{
                font-family:comforter;
                font-size:bold;
                margin-top:200px; 
                color:#fff;
            }
            .containerr table{
                width : 1000px;
                margin-top: 10px;
            }
            td{
              margin-bottom:100px;
            }
            .container2{
              width : 1000px;
              margin:auto;
            }
            </style>
  </head>

  <body>



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

                <li class="nav-item active"><a class="nav-link " href="hidangan_admin.php">Menu</a></li>

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


    <!-- Page Content -->
    <!-- Banner Starts Here -->


    
    <div class="page-heading about-heading header-text" style="background-image: url(../hidangan/hidangan.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
			<h4 style=" width:600px;margin:auto;box-shadow: 1px 2px 4px 5px;background-color:aliceblue">Menu Hidangan  </h4>>
            </div>
          </div>
        </div>
      </div>
    </div>

   
	<div class="products">
  <div class="container">
  <div style="text-align:left;margin-bottom :10px;">
      <a class="btn btn-danger text-left" href="kelola_hidangan.php" role="button" style="background-color:#f33f3f;color:#fff;font-weight:bold">Kelola Hidangan</a>
    </div>
    <div style="text-align:left;margin-bottom :10px;">
      <a class="btn btn-light text-left" href="add_hidangan.php" role="button" style="color:#fb3653;font-weight:bold;  border: 2px solid #f33f3f;">Tambah Hidangan</a>
    </div>
<div class="row">
<div  id="data"></div>  


</div>
<script>
 $(document).ready(function(){
      load_data();
      function load_data(page){
           $.ajax({
                url:"../data.php",
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
  

  <br> 

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