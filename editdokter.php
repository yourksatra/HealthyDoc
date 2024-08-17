<?php 
    session_start();
    if(!isset($_SESSION['NIP'])){
        header("Location: admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>EDIT PROFILE</title>
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
            <a class="navbar-brand" href="">EDIT PROFILE</a>
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
        include ('koneksi.php');

        if (isset($_SESSION['NIP'])){ 
            $nip=$_SESSION['NIP']; 
            $sql_edit=mysqli_query($koneksi,"SELECT * FROM dokter where NIP='$nip'");
            while ($data=mysqli_fetch_array($sql_edit)){
                $nama = $data['NAMA'];
                $tmptlahir = $data['TMPLAHIR'];
                $ttl = $data['TGLLAHIR'];
                $jk = $data['JENKELCUS'];
                $almt = $data['ALAMAT'];
                $foto= $data['IMG'];
                $email = $data['EMAIL'];
                $pass = $data['PASSWORD_DOKTER'];
            }    
        }
    ?>
    <div class="card">
        <div class="card-body">
            <div class="card-body" style=" position: relative; margin: 1rem calc(180rem/20); margin-top:5rem" align="left">
                <form class="row g-2" action="editdokter.php" method="POST" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="inputNIP" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="inputID" name="nip" value="<?php echo $nip ?>" readonly="readonly">
                    </div>
                    <div class="col-12">
                        <label for="inputNama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="inputNama" name="nama" value="<?php echo $nama ?>">
                    </div>
                    <div class="col-5">
                        <label for="inputTTL" class="form-label">Tempat</label>
                        <input type="text" class="form-control" id="inputTTL" name="tempat" value="<?php echo $tmptlahir ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="inputTglLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="inputTglLahir" name="tgllahir" value="<?php echo $ttl ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="inputGender" class="form-label">Jenis Kelamin</label>
                        <?php
                            if($jk=='P'){
                                echo "                                
                                    <section class='form-control'>
                                        <div class='form-check form-check-inline'>
                                            <input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio1' value='P' checked>
                                            <label class='form-check-label' for='inlineRadio1'>P</label>
                                        </div>
                                        <div class='form-check form-check-inline'>
                                            <input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio2' value='L'>
                                            <label class='form-check-label' for='inlineRadio2'>L</label>
                                        </div>
                                    </section>
                                ";
                            }else{
                                echo "                                
                                    <section class='form-control'>
                                        <div class='form-check form-check-inline'>
                                            <input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio1' value='P'>
                                            <label class='form-check-label' for='inlineRadio1'>P</label>
                                        </div>
                                        <div class='form-check form-check-inline'>
                                            <input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio2' value='L' checked>
                                            <label class='form-check-label' for='inlineRadio2'>L</label>
                                        </div>
                                    </section>
                                ";
                            }
                        ?>
                    </div>
                    <div class="col-md-12">
                        <label for="inputAlamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="inputAlamat" name="alamat" value="<?php echo $almt ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo $email ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="text" class="form-control" id="inputPassword4" name="password" value="<?php echo $pass ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Foto Profile</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" id="fileCover" name="filefoto" value="<?php echo $foto ?>">
                        </div>
                    </div>
                    <div class="col-12" align="center" style="margin-top: 2rem">
                        <button type="submit" class="btn btn-outline-primary" name="simpan" value="submit">Simpan Perubahan</button>
                    </div>
                </form>
                <?php
                    /*Mengecek apabila tombol Sign Up diklik*/
                    if (isset ($_POST['simpan'])) {
                        include ('koneksi.php');
                            $nip=$_SESSION['NIP'];
                            $email = $_POST['email'];
                            $pass = $_POST['password'];
                            $nama = $_POST['nama'];
                            $tmptlahir = $_POST['tempat'];
                            $ttl = $_POST['tgllahir'];
                            $jk = $_POST['inlineRadioOptions'];
                            $almt = $_POST['alamat'];
                            $foto = basename($_FILES["filefoto"]["name"]);

                            $target_dir = "image/";
                            $target_file = $target_dir . basename($_FILES["filefoto"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                            // Allow certain file formats
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif" ) {
                            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            $uploadOk = 0;
                            }

                            // Check if $uploadOk is set to 0 by an error
                            if ($uploadOk == 0) {
                            echo "Maaf, file Anda gagal diupload.";
                            // if everything is ok, try to upload file
                            } else {
                                if (move_uploaded_file($_FILES["filefoto"]["tmp_name"], $target_file)) {
                                    echo "File ". htmlspecialchars( basename( $_FILES["filefoto"]["name"])). " berhasil diupload.";
                                } else {
                                    echo "Maaf, ada error ketika mengupload file Anda.";
                                }
                            }

                            $sql = mysqli_query($koneksi,"UPDATE dokter SET NAMA='$nama', TMPLAHIR='$tmptlahir', TGLLAHIR='$ttl', JENKELCUS='$jk', ALAMAT='$almt', IMG='$foto', EMAIL='$email', PASSWORD_DOKTER='$pass' WHERE NIP=$nip;");
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