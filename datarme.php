<?php 
    session_start();
    if(!isset($_SESSION['NIK'])){
        header("Location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>HealtyDOC | RMD</title>
    <link rel="icon" href="image\logo.png">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css\style.css">
</head>
<body>
    <!-- header section -->
    <header  id="home" class="navbar navbar-expand-lg bg-light fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="image\header.png" alt="Logo" width="auto" height="50" class="d-inline-block align-text-top">
        </a>
        <div class="posisi">
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="home.php#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="home.php#about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="home.php#contact">Contact</a>
                </li>
              </ul>
              <a href="admin.php"><button class="btn">Login / Register</button></a>
            </div>
        </div>
      </div>
    </header>
    <main class="basic jrk">
      <section class="ukuran">
        <article class="artikel">
          <!-- AWAL CAROUSEL -->
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner" align="center">
                <div class="carousel-item active">
                  <img src="image/banner1.png" class="img" alt="...">
                </div>
                <div class="carousel-item next">
                  <img src="image/banner.png" class="img" alt="...">
                </div>
                <div class="carousel-item back">
                  <img src="image/banner2.png" class="img" alt="...">
                </div>
              </div>
          </div>
        </article>
        <article class="artikel1">
          <section class="box">
            <h1>Rekam Media Digital</h1>
            <p>Masukkan Nama dan NIK untuk mencari data rekam medis Anda</p>
            <div class="line"></div>
            <form class="layout" action="home.php" method="POST">
              <div>
                <label class="font1">Nama Lengkap</label>
                <input class="jss42 alpa" value="<?php echo $_SESSION['NAMA']?>" readonly="readonly">
              </div>
              <div>
                <label class="font1">NIK</label>
                <input class="jss42 alpa" value="<?php echo $_SESSION['NIK']?>" readonly="readonly">
              </div>
              <div id="about" class="jss43">
                <button class="jss44 delta" type="button" name="kirim" data-bs-toggle="modal" data-bs-target="#exampleModal">BUKA DATA</button>
              </div>
            </form>
            <div class="modal fade" id="exampleModal" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <a href="home.php">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </a>
                  </div>
                  <div class="modal-body">
                        <table class="table table-striped">
                          <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th>RME TERCATAT</th>
                                    <th>KELUHAN</th>
                                    <th>DIAGNOSA</th>
                                    <th>TANGGAL PERIKSA</th>
                                    <th>DOKTER</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                      include "koneksi.php";
                                      $nikpasien=$_SESSION['NIK'];
                                      $nama=$_SESSION['NAMA'];
                                      $query=mysqli_query($koneksi, "SELECT * FROM riwayat WHERE NIK=$nikpasien AND NAMA='$nama';");
                                      while ($data=mysqli_fetch_array($query)){
                                        echo "
                                        <tr>
                                        <td width='100'>".$data['NAMA']."</td>
                                        <td width='50'>".$data['TGLRME']."</td>
                                        <td width='125'>".$data['KELUHAN']."</td>
                                        <td width='125'>".$data['DIAGNOSA']."</td>
                                        <td width='50'>".$data['TGL']."</td>
                                        <td width='100'>".$data['DOKTER']."</td>
                                        </tr>
                                        ";
                                      };
                              ?>
                            </tbody>
                        </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </article>
      </section>
      <section class="about section-padding">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4 col-md-12 col-12">
                      <div class="about-img">
                          <img src="image/logo.png" alt="" class="img-fluid">
                      </div>
                  </div>
                  <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                      <div class="about-text">
                            <h2>HealtyDOC the Future<br/> of Electronic Medical Record</h2>
                            <p>HealtyDOC merupakan sebuah layanan digital untuk mencatat rekam medis pasien, sesuai PERATURAN MENTERI KESEHATAN TENTANG REKAM MEDIS Nomor 24 Tahun 2022 tentang Rekam Medis bahwa Perkembangan Teknologi Digital dalam masyarakat 
                               mengakibatkan transformasi digitalisasi pelayanan kesehatan sehingga Rekam Medis perlu diselenggarakan secara elektronik dengan prinsip Keamanan dan Kerahasiaan Data dan Informasi.
                               HeltyDOC bekerja sama dengan para Dokter dan Tenaga Kesehatan terkait dalam layanan penyimpanan data berbasis Web Server.</p>
                      </div>
                  </div>
              </div>
          </div>
      </section>
    </main>
    <section id="contact" class="contact section-padding">
      <div class="container mt-5 mb-5">
        <div class="row">
          <div class="col-md-12">
            <div class="section-header text-center pb-1">
              <h2>Contact Us</h2>
              <p>Hubungi Kami Jika Anda Menemukan Kesalahan</p>
            </div>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-md-12 p-0 pt-4 pb-2">
            <form action="#" class="bg-light p-2 m-auto">
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <input class="form-control" placeholder="Nama" required="" type="text">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <textarea class="form-control" placeholder="Pesan" required="" rows="3"></textarea>
                  </div>
                </div>
                <button class="btn btn-warning btn-lg btn-block mt-3" type="button">Kirim</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <footer class="bg-dark p-2 text-center">
      <div class="container">
        <p class="text-white">NUGRAH SATRIA BAGASSABIRIN | 21.12.2116</p>
      </div>
    </footer>
</body>
</html>