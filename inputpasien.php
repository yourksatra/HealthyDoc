<?php 
    session_start();
    if(!isset($_SESSION['NIP'])){
        header("Location: admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>INPUT DATA PASIEN</title>
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
            <a class="navbar-brand" href="">INPUT DATA PASIEN BARU</a>
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
    <div class="card">
        <div class="card-body">
            <div class="card-body" style=" position: relative; margin: 1rem calc(180rem/20); margin-top:5rem" align="left">
                <form class="row g-2" action="inputpasien.php" method="POST" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="inputNIP" class="form-label">NIK</label>
                        <input name="nik" id="inputID" class="form-control" type="number" placeholder="16-Digit Angka">
                    </div>
                    <div class="col-12">
                        <label for="inputNama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="inputNama" name="nama">
                    </div>
                    <div class="col-5">
                            <label for="inputTTL" class="form-label">Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control" id="inputTTL" name="tempat">
                    </div>
                    <div class="col-md-4">
                        <label for="inputTglLahir" class="form-label">.</label>
                        <input type="date" class="form-control" id="inputTglLahir" name="tgllahir">
                    </div>
                    <div class="col-md-3">
                        <label for="inputGender" class="form-label">Jenis Kelamin</label>
                        <section class="form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="P">
                                <label class="form-check-label" for="inlineRadio1">P</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="L">
                                <label class="form-check-label" for="inlineRadio2">L</label>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-12">
                        <label for="inputAlamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="inputAlamat" name="alamat">
                    </div>
                    <div class="col-12" align="center" style="margin-top: 2rem">
                        <button type="submit" class="btn btn-outline-primary" name="input" value="submit">Simpan</button>
                    </div>
                </form>
                <?php
                    /*Mengecek apabila tombol Sign Up diklik*/
                    if (isset ($_POST['input'])) {
                        include ('koneksi.php');
                        /*Menerima dan Menampung data*/
                        $nik=$_POST['nik'];
                        $nama=$_POST['nama'];
                        $tmptlahir=$_POST['tempat'];
                        $ttl=$_POST['tgllahir'];
                        $newtgl = date("Y-m-d", strtotime($ttl));
                        $jk=$_POST['inlineRadioOptions'];
                        $almt=$_POST['alamat'];

                        $query = mysqli_query($koneksi, "INSERT INTO pasien VALUES ('$nik','$nama','$tmptlahir','$newtgl','$jk','$almt')");
                    }
                ?>
            </div>
        </div>
    </div>
</body>
<footer class="bg-dark p-2 text-center fixed-bottom">
    <div class="container">
        <p class="text-white">NUGRAH SATRIA BAGASSABIRIN | 21.12.2116</p>
    </div>
</footer>
</html>