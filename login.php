<?php 

require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    $sql = "SELECT * FROM users WHERE username=:username and id_role=1";
    $sqli = "SELECT * FROM users WHERE username=:username and id_role=2";
    $sqlx = "SELECT * FROM users WHERE not username = :username ";

    $stmt = $db->prepare($sql);
    $stml =$db->prepare($sqli);

    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
    );

    $stmt->execute($params);
    $stml->execute($params);

  
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $admin = $stml->fetch(PDO::FETCH_ASSOC);

    if($admin){
      // verifikasi password
      if(password_verify($password, $admin["password"])){
          
          // buat Session
          session_start();
          $_SESSION["user"] = $admin;
          // login sukses, alihkan ke halaman timeline
          header("Location: admin/index_admin.php");
      
  }

  else{
    echo "<script>alert('Password Salah');history.go(-1) </script>";  
  }
  
 
}


    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: pelanggan/index.php");
        
    }

    else{
      echo "<script>alert('Password Salah') </script>";  
    }
   
    }
    else{
      echo "<script>alert('Username Salah') </script>";
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
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Comforter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comforter&display=swap" rel="stylesheet">
    <title>Cafe Tepi Danau Bistro</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <style type="text/css">
      body{
  
      }
    .container{
        margin:auto;
        margin-bottom:300px;
        margin-top : 150px;
        padding : 30px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border:2px solid #c0c0c0;
        border-radius:10px;

    }
    .container h1{
        font-family:comforter;
        font-size:bold;
        color:#007bff;
    }
    .card{
      width: 500px;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border:2px solid #c0c0c0;
        border-radius:10px;
        background-color:#F0FFF0;
       filter: opacity(80%);
       margin-left: 30px;
    }
    .error {
    color: orange;
  }
	</style>

  </head>
<body>
  <div class="container">
    <h1 class="mb-3">Cafe <i style="color:#fba337">Tepi Danau</i>  Bistro</h1>

    <div class="row">
      <div class="col">
      <img src="assets/images/slider-image-2-1920x600.jpeg" style="width:500px;">
      </div>
      <div class="col">
        <div class="card">
        <form action="" method="POST" style="margin:10px;" id="form">
            <div class="form-group">
                <label  for="username">Username</label>
                <input class="form-control form-control-sm" type="text" name="username" placeholder="Username atau email" required/>
            </div>


            <div class="form-group">
                <label  for="password">Password</label>
                <input class="form-control form-control-sm" type="password" name="password" placeholder="Password" required/>
            </div>

            <input type="submit" class="btn btn-primary" name="login" value="Masuk" />

        </form>
        <hr style="border:2px solid black">

        <a  style="margin:2px"class="btn btn-primary" href="register.php">Daftar <i class="fa fa-angle-right"></i></a>
  
          <a style="margin:2px" class="btn btn-primary" href="index.php"><i class="fa fa-angle-left"></i> Kembali Ke Beranda </a>

        </div>
      </div>
    </div>
  </div>
    
  <script>
  $(document).ready(function () {
    $('#form').validate({
      rules: {
        password: {
          required: true
        },
        email: {
          required: true
        },
        alamat: {
          required: true
        },
        contact: {
          required: true,
          rangelength: [10, 12],
          number: true
        },
        username: {
          required: true
        },
        confirmPassword: {
          required: true,
          equalTo: "#password"
        }
      },
      messages: {
        password: 'Tolong isi Password Anda',
        email: {
          required: 'Tolong Isi Email Anda',
          email: 'Tolong isi Emali yang valid',
        },
        alamat : 'Tolong isi alamat Anda',
        contact: {
          required: 'Tolong isi nomor handphone Anda',
          rangelength: 'Nomor Handphone hanya dapat disi 10 sampai 12'
        },
        username: 'Tolong isi username Anda',
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