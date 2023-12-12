<?php
//including the database connection file
include "../config.php";

//getting id of the data from url
$ids = $_GET['id'];
$id = $_GET['ids'];

$sqli ="DELETE FROM pemesanan_meja_hidangan WHERE id=:id";
$querys =$db->prepare($sqli);
$querys->execute(array(':id' =>$ids));

//redirecting to the display page (index.php in our case)
header("Location: daftar_pesanan_makanan.php?id=$id");
?>