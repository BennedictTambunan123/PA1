<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "cafe bistro";

    $koneksi = mysqli_connect($host,$user,$pass,$db);
    if(!$koneksi){
        die ("Tidak Terkoneksi");
    }
?>