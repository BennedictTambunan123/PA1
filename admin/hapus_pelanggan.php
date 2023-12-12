<?php
//including the database connection file
include "../config.php";

//getting id of the data from url
$id = $_GET['id'];

$sqli ="DELETE FROM users WHERE id=:id";
$querys =$db->prepare($sqli);
$querys->execute(array(':id' =>$id));

//redirecting to the display page (index.php in our case)
echo "<script>alert('Berhasil di Hapus'); document.location.href = 'manage_user.php'; </script>";
?>