<?php 
  include 'koneksi.php';

  $id= $_GET['nik'];
  $query = mysqli_query($koneksi, "DELETE FROM rme WHERE NIK='$id';");
  $query = mysqli_query($koneksi, "DELETE FROM pasien WHERE NIK='$id';");
    
  echo "<script>alert('Data Berhasil Dihapus')</script>";
  header("location:tabelpasien.php");
?>