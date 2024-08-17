<?php
    $host = 'localhost';
    $username = 'root';
    $password = ''; 
    $database = 'datahltydoc';

    $pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
    $koneksi= mysqli_connect($host,$username,$password) or die ("koneksi ke MYSQL gagal");
    mysqli_select_db($koneksi, $database) or die ("koneksi ke database gagal");
?>