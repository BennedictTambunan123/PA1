
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
                    <a class="nav-link active" href="index_admin.php">Beranda
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item "><a class="nav-link " href="hidangan_admin.php">Menu</a></li>

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
    <div class="body">
    <div class="body-class">

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">

   <div class="container">
    <div class="containerr">
        <h1 class="text-center">Daftar Pelanggan</h1>
<br>
        <br>
        <br>
        <div style="overflow-x:auto;">
    <table   class="text-center table table-striped" style="color:black" id="myTable">
        <tr style="background-color:#f33f3f ; color:black">
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>No Handphone</th>
            <th>Email</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
        <tr>
        <?php
            $no = 1;
            $query = "select * from users where id_role = '1' order by id asc";
            $data = mysqli_query($koneksi,$query);
            while($hasil = mysqli_fetch_assoc($data)) {
        ?>
    <td scope="row"><?= $no++?></td>
    <td scope="row"><?= $hasil['name']?></td>
    <td scope="row"><?= $hasil['no_handphone']?></td>
    <td scope="row"><?= $hasil['email']?></td>
    <td scope="row"><?= $hasil['username']?></td>
    <td scope="row">
        <a href="hapus_pelanggan.php?id=<?php echo $hasil['id']; ?>" onclick="return confirm('Anda Yakin?');"><button type="button" class="btn btn-danger">Hapus</button></a>
        
    </td>
    </tr>
    <?php }?>
    </table>
        </div>
 
   </div>
   </div>
       
    <footer>
    
        <div class="row" style="background-color:#28292a;"> 
          <div class="col-md-12">
            <div class="inner-content">
              <ul class="social-icons" style="margin:0px">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
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

    <script>

</script>
  </body>
</html>