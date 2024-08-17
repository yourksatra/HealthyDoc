<?php 
    session_start();
    if(!isset($_SESSION['NIP'])){
        header("Location: admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>DATA PASIEN</title>
    <link rel="icon" href="image\logo.png">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css\second.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <img src="image\header.png" alt="Logo" width="auto" height="50" class="d-inline-block align-text-top">
            <a class="navbar-brand" href="">ACTION TABEL PASIEN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li><a class="nav-link" href="beranda.php">BERANDA</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PROFILE
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light">
                            <li><a class="dropdown-item" href="editdokter.php">Edit Profile</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ACTION
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light">
                            <li><a class="dropdown-item" href="inputpasien.php">Input Data Pasien</a></li>
                            <li><a class="dropdown-item" href="tabelpasien.php">Tabel Pasien</a></li>
                            <li><a class="dropdown-item" href="inputrme.php">Input Rekam Medis</a></li>
                        </ul>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="logout.php">
                            <button type="button" class="btn btn-outline-primary" style="margin-top: 10px">LOGOUT</button>
                        </a>
                    </li>
                </ul>
            </div>
            </div>
        </div>
    </nav>
    <table class="table" style="margin: 3rem calc(20rem/40); width:1350px">
        <div style="margin: 2rem; margin-top: 6rem">
            <a href="inputpasien.php"  class="btn btn-primary">+ Input Data Pasien</a>
        </div>
        <thead>
            <tr>
                <th>NIK</th>
                <th>NAMA</th>
                <th>TANGGAL LAHIR</th>
                <th>JENIS KELAMIN</th>
                <th>ALAMAT</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>      
                <?php 
                    include ('koneksi.php');

                    $sql=mysqli_query($koneksi, "SELECT * FROM pasien order by NAMA ASC");
                        while ($row=mysqli_fetch_array($sql)){
                            echo "
                                  <tr>
                                    <td width='100'>".$row['NIK']."</td>
                                    <td width='125'>".$row['NAMA']."</td>
                                    <td width='50'>".$row['TGLLAHIR']."</td>
                                    <td width='50'>".$row['JENKELCUS']."</td>
                                    <td width='150'>".$row['ALAMAT']."</td>
                                    <td width='20'> 
                                      <a class='btn btn-info' href='editpasien.php?nik=".$row['NIK']."'>Edit</a> 
                                      <a class='btn btn-danger' href='hapusdata-pasien.php?nik=".$row['NIK']."'>Hapus</a> 
                                    </td>
                                  </tr>
                            ";
                        };
                ?>
        </tbody>
    </table>
</body>
<footer class="bg-dark p-2 text-center fixed-bottom">
    <div class="container">
        <p class="text-white">NUGRAH SATRIA BAGASSABIRIN | 21.12.2116</p>
    </div>
</footer>
</html>