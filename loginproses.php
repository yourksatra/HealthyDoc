<?php
    session_start(); // Start session nya
    include "koneksi.php"; // Load file koneksi.php
    $nip = $_POST['NIP'];
    $mail = $_POST['email'];
    $pass = $_POST['password'];

    $sql = $pdo->prepare("SELECT * FROM dokter where NIP=:a and EMAIL=:b and PASSWORD_DOKTER =:c");
    $sql->bindParam(':a', $nip);
    $sql->bindParam(':b', $mail);
    $sql->bindParam(':c', $pass);
    $sql->execute();
    $data = $sql->fetch();
    if( ! empty($data)){ 
        $_SESSION['NIP'] = $data['NIP'];
        $_SESSION['NAMA'] = $data['NAMA'];
        header("location:beranda.php?nip=$nip");
    }else{
        echo"<script>alert('Data yang Anda Inputkan Salah. Silahkan Coba Lagi!');</script>";
        header("location: admin.php");
    }
?>