<?php
include_once("connect.php")
?>



<!DOCTYPE html>
<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <title>Cafe Tepi Danau Bistro</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/stylee.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/comment.css">


    <style>
        body{
          font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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
                    <a class="nav-link active" href="index.php">Beranda
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pemesanan</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" onClick="alert('Silahkan Login dulu');document.location.href = 'login.php';"  href="#">Pemesanan Meja</a>
                      <a class="dropdown-item" onClick="alert('Silahkan Login dulu');document.location.href = 'login.php';"  href="#">Konfirmasi Pesanan</a>
                      <a class="dropdown-item" onClick="alert('Silahkan Login dulu');document.location.href = 'login.php';"  href="#">Daftar Pesanan</a>
                    </div>
                </li>
                
                <li class="nav-item"><a class="nav-link " href="contact.php">Tentang </a></li>
                <li class="nav-item"><a class="nav-link " href="testimoni.php">Testimoni </a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login </a></li>

            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
        <div class="text-content">
            <h2 style="width:700px;margin:auto; box-shadow: 1px 2px 4px 5px;background-color:#f33f3f;color:aliceblue;border-radius:10px">Selamat Datang</h2>
          </div>
        </div>
        <div class="banner-item-02">
        <div class="text-content">
            <h2 style="width:700px;margin:auto; box-shadow: 1px 2px 4px 5px;background-color:#f33f3f;color:aliceblue;border-radius:10px">Selamat Datang</h2>
          </div>
        </div>
        <div class="banner-item-03">
        <div class="text-content">
            <h2 style="width:700px;margin:auto; box-shadow: 1px 2px 4px 5px;background-color:#f33f3f;color:aliceblue;border-radius:10px">Selamat Datang</h2>
          </div>
        </div>
      </div>
    </div>
   
    
         


<br>
<br>
      <div class="services" style="" >
      <div class="container" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <div class="row">
          <div class="col-md-12 ">   
            <div class="section-heading">
              <h2 style="color:black">Menu</h2>

              <a  class="btn btn-danger" onClick="alert('Silahkan Login dulu');" href="login.php"  style="color:#fff;padding:10px">Lakukan Pemesanan Meja <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
 
  <div  id="data"></div>  


</div>
<script>
 $(document).ready(function(){
      load_data();
      function load_data(page){
           $.ajax({
                url:"data_1.php",
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
<div class="container mt-5">




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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
</body>
</html>
</body>