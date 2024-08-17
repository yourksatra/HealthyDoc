<?php 
    session_start();
    if(!isset($_SESSION['NIP'])){
        header("Location: admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PENGINPUTAN REKAM MEDIS</title>
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
            <a class="navbar-brand" href="">FORM INPUT DATA RME</a>
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
    <?php
        $nip=$_SESSION['NIP'];
    ?>
    <div class="card">
        <div class="card-body">
            <div class="card-body" style=" position: relative; margin: 1rem calc(180rem/20); margin-top:5rem" align="left">
                <form class="row g-2" action="inputrme.php" method="POST" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="inputNIP" class="form-label">NIK Pasien</label>
                        <select name="nik" id="inputID" class="form-select form-select-lg mb-1" style="height:2.5rem; font-size:1rem">
                            <option>NIK</option>
                            <?php
                                include "koneksi.php";
                                $sql = mysqli_query($koneksi,"SELECT * FROM pasien");
                                while($data = mysqli_fetch_array($sql)){
                                    echo "<option value=$data[NIK]>$data[NIK] || $data[NAMA]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="inputNama" class="form-label">Keluhan</label>
                        <input type="text" class="form-control" id="inputKeluhan" name="Klhn">
                    </div>
                    <div class="col-12">
                        <label for="inputTTL" class="form-label">Diagnosa</label>
                        <input type="text" class="form-control" id="inputTTL" name="diagnosa">
                    </div>
                    <div class="col-md-12">
                        <label for="inputAlamat" class="form-label">Tindakan</label>
                        <input type="text" class="form-control" id="inputAlamat" name="tindakan" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputTglLahir" class="form-label">Tanggal Pemeriksaan Dokter</label>
                        <input type="date" class="form-control" id="inputTglLahir" name="tglperiksa">
                    </div>
                    <div class="col-6">
                        <label for="inputNIP" class="form-label">Tangal Rekam Medis Tercatat</label>
                        <input type="date" class="form-control" id="inputID" name="tglrme" value="<?php echo date('Y-m-d');?>">
                    </div>
                    <div class="col-12">
                        <label for="inputNIP" class="form-label">NIP Dokter</label>
                        <input type="text" class="form-control" id="inputID" name="nip" value='<?php echo "$nip" ?>' readonly="readonly">
                    </div>
                    <div class="col-12" align="center" style="margin-top: 2rem">
                        <button type="submit" class="btn btn-outline-primary" name="simpan" value="submit">Simpan</button>
                    </div>
                </form>
                <?php
                    if (isset ($_POST['simpan'])) {
                        include ('koneksi.php');
                            $nip=$_SESSION['NIP'];
                            $nik = $_POST['nik'];
                            $klhn = $_POST['Klhn'];
                            $diagnosa = $_POST['diagnosa'];
                            $tindakan = $_POST['tindakan'];
                            $tgl = $_POST['tglperiksa'];
                            $newtgl = date("Y-m-d", strtotime($tgl));
                            
                            $sql = mysqli_query($koneksi,"INSERT INTO rme SET NIK='$nik', 
                                                keluhan='$klhn', diagnosa='$diagnosa', tglperiksa='$newtgl', 
                                                tindakan='$tindakan', TglRME= CURRENT_DATE(), NIP='$nip';");
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