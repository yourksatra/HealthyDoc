<?php 
    session_start();
    if(!isset($_SESSION['NIP'])){
        header("Location: admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>BERANDA</title>
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
            <a class="navbar-brand" href="">BERANDA</a>
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
    <div class="card mb-3" style="max-width: 540px; margin: 5rem;">
    <div class="row g-0">
        <div class="col-md-4">
            <?php
                include "koneksi.php";
                    $nip = $_SESSION['NIP'];
                    $sql = mysqli_query($koneksi, "SELECT * FROM dokter where NIP='$nip';");
                        while ($row=mysqli_fetch_array($sql)){
                            $foto = $row['IMG'];
                        };
            ?>
            <img src='<?php echo "image/".$foto ?>' class="img-fluid rounded-start" alt="edit profile untuk menambah foto">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">dr. <?php echo $_SESSION['NAMA']; ?></h5>
                <p class="card-text">NIP <?php echo $_SESSION['NIP']; ?></p>
            </div>
        </div>
        </div>
    </div>
    <div class="card" style="max-width: 1200px; margin-left: 5rem;">
        <h2 style="margin-top: 1rem; margin-bottom:-1rem; margin-left:1rem;">TABEL REKAM MEDIS ELEKTRONIK</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th class="size">RME TERCATAT</th>
                    <th>KELUHAN</th>
                    <th>DIAGNOSA</th>
                    <th class="size">TANGGAL PERIKSA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                    $nip = $_SESSION['NIP'];
                    $sql = mysqli_query($koneksi, "SELECT * from riwayat where NIP='$nip';");
                        while ($row=mysqli_fetch_array($sql)){
                            echo "
                                <tr>
                                    <td width='150'>".$row['NAMA']."</td>
                                    <td width='150'>".$row['NIK']."</td>
                                    <td width='50'>".$row['TGLRME']."</td>
                                    <td width='150'>".$row['KELUHAN']."</td>
                                    <td width='150'>".$row['DIAGNOSA']."</td>
                                    <td width='50'>".$row['TGL']."</td>
                                </tr>
                            ";
                        };
                ?>
            </tbody>
        </table>
    </div>
</body>
<footer class="bg-dark p-2 text-center fixed-bottom">
    <div class="container">
        <p class="text-white">NUGRAH SATRIA BAGASSABIRIN | 21.12.2116</p>
    </div>
</footer>
</html>