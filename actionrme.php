<?php
        session_start();
        include ('koneksi.php');
        $nik=$_POST['NIK'];
        $nama=$_POST['nama'];
        $_SESSION['NIK'] = $nik;
        $_SESSION['NAMA'] = $nama;

        header("location:datarme.php?nik=$nik");
?>