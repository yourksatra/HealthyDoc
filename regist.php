<!DOCTYPE html>
<html lang="en">
<head>
    <title>HealtyDOC | Register</title>
    <link rel="icon" href="image\logo.png">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css\log.css" rel="stylesheet">
</head>
<body class="bg">
    <?php echo"<script>alert('Hanya Dokter yang memiliki otoritas untuk Login dan Register')</script>" ?>
    <div  id="Regist" class="card">
        <h5 class="card-header"><img src="image\logo.png" alt="Logo" width="auto" height="50" class="d-inline-block align-text-center">
        Halaman Login & Register</h5>
        <div class="card-body">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php#Login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="regist.php#Regist">Register</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body" align="left">
                    <form class="row g-2" action="regist.php" method="POST" enctype="multipart/form-data">
                        <h5 class="card-title" align="center">Register</h5>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" name="email">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword4" name="password">
                        </div>
                        <div class="col-12">
                            <label for="inputNIP" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="inputID" name="nip" max="16">
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
                        <div class="col-12" align="center">
                            <button type="submit" class="btn btn-outline-primary" name="submit" value="submit">Sign Up</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    Kembali ke- <a href="home.php">Halaman Utama</a>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
    /*Mengecek apabila tombol Sign Up diklik*/
    if (isset ($_POST['submit'])) {
        include ('koneksi.php');
        /*Menerima dan Menampung data*/
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $tmptlahir = $_POST['tempat'];
        $ttl = $_POST['tgllahir'];
        $jk = $_POST['inlineRadioOptions'];
        $almt = $_POST['alamat'];

        $query = mysqli_query($koneksi, "INSERT INTO dokter VALUES ('$nip','$nama','$tmptlahir','$ttl','$jk','$almt',NULL,'$email','$pass')");
    }
?>
</html>