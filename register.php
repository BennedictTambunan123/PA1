<!DOCTYPE html>
<html>
 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <title>Tepi Danau Bistro</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Comforter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comforter&display=swap" rel="stylesheet">
  
 

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
.<style type="text/css">
    body{
      background-color:#fff;
      }
		.register{
			 border-style:solid;
       border-color:gray;
       filter: opacity(80%);
       font-family: "Century Gothic",Verdana,sans-serif;
       
    }
    .containerr{

      margin:auto;
      border:2px solid #c0c0c0;
      border-radius:10px;
      background-color : #fff;
    }
    .containerr .card{
      margin : 5px;
      background-color:#F0FFF0;
       filter: opacity(80%);
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border:2px solid #c0c0c0;
        border-radius:10px;
    }
    .containerr .card form{
      margin : 5px;
    }
    .containerr .x{
      margin : 10px;
    }
    .container h1{
        font-family:comforter;
        font-size:bold;
        color:#007bff;
    }
	</style>
  </head>
  <body>
<div class="container">
  <div class="containerr mt-5 mb-5">
    <div class="x">
    <div class="row">
      <div class="col-md-6">
      <h1 class="mb-3">Cafe <i style="color:#fba337">Tepi Danau</i>  Bistro</h1>
        <img src="assets/images/slider-image-2-1920x600.jpeg" style="width:500px; margin-top:100px">
      </div>
      <div class="col-md-6">
        <div class="card">
        <form id="form" method="post" action="getData.php" >
        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" class="form-control form-control-sm" name="name" id="name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control form-control-sm" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control form-control-sm" name="alamat" id="alamat">
        </div>
        <div class="form-group">
          <label for="contact">No.Handphone</label>
          <input type="text" class="form-control form-control-sm" name="contact" id="contact">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="username" class="form-control form-control-sm" name="username" id="username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control form-control-sm" name="password" id="password">
        </div>
        <div class="form-group">
          <label for="confirmPassword">Konfirmasi Password</label>
          <input type="password" class="form-control form-control-sm" name="confirmPassword" id="confirmPassword">
        </div>
        <input type="submit" class="btn btn-primary" value="Submit" />
      </form>
      <hr style="border:2px solid black">
      <a  style="margin:2px"class="btn btn-primary" href="login.php">Login <i class="fa fa-angle-right"></i></a>
  
  <a style="margin:2px" class="btn btn-primary" href="index.php"><i class="fa fa-angle-left"></i> Kembali Ke Beranda </a>


      </div>
      </div>
    </div>
    </div>
  </div>
</div>
</body>
<style>
  .error {
    color: red;
  }
</style>
<script>
  $(document).ready(function () {
    $('#form').validate({
      rules: {
        name: {
          required: true
        },
        email: {
          required: true,
          email: true
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
        name: 'Tolong isi Nama Lengkap Anda',
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
 
</html>