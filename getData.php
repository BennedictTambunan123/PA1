<?php
 
  // database connection
  $con = mysqli_connect("localhost", "root", "" , "cafe bistro") or die($con);
 
  // post data


  if(!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = filter_input(INPUT_POST, 'contact');
    $username = $_POST['username'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $alamat = $_POST['alamat'];
    $cek_user=mysqli_num_rows(mysqli_query($con, "SELECT username FROM users"));
    $usernamecek= " SELECT * from users where username='$username'";
    $emailcheck="SELECT * from users where email='$email' ";                                                                   //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan
    $prosescekusername= mysqli_query($con, $usernamecek);
    $prosescekemail = mysqli_query($con, $emailcheck);
 
 
    if(mysqli_num_rows($prosescekemail)>0){
      echo "<script>alert('Email Sudah Digunakan');history.go(-1) </script>";  
    }
   else if (mysqli_num_rows($prosescekusername)>0) { //proses mengingatkan data sudah ada
    
    echo "<script>alert('Username Sudah Digunakan');history.go(-1) </script>";  
}
else{
$sql = "INSERT INTO users (name, email, no_handphone, username , password , alamat,id_role) VALUES ('$name', '$email', '$contact','$username','$password','$alamat',1)";
$insertData = mysqli_query($con,$sql);
  }
if($insertData){
  echo "<script>alert('Berhasil Registrasi'); </script>"; 
  header("Location:login.php");
} else {
  echo "Something went wrong!";
}
}
 
?>