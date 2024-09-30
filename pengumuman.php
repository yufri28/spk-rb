<?php 
require_once './config.php';
$koneksi = connectDatabase();
$getPeriodeAktif = getPeriodeAktif();
$hasilCek = [];

if(empty($getPeriodeAktif)){
    echo "<script>alert('Saat ini Program Bantuan Stimulan Perumahan Swadaya (BSPS) belum dibuka!')
        window.location.href = 'index.php
    ;</script>";
}
if(isset($_GET['nokk'])){
    $cek = $koneksi->query("SELECT * FROM hasil_akhir ha 
                    JOIN alternatif a ON a.id_alternatif=ha.f_id_alternatif
                    JOIN periode p ON p.id_periode=ha.f_id_periode
                    WHERE p.id_periode='".$getPeriodeAktif['id_periode']."' AND a.no_kk='".htmlspecialchars($_GET['nokk'])."'");
    $hasilCek = mysqli_fetch_assoc($cek);
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>SPK Penentuan Penerima Rumah Bantuan</title>
    <style>
    #mapid {
        height: 100vh;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Prompt&family=Righteous&family=Roboto:wght@500&display=swap"
        rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
        <div class="container-fluid p-4">
            <a class="navbar-brand ms-4" style="font-family: 'Roboto', sans-serif;" href="#">SPK PENENTUAN RUMAH
                BANTUAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-md btn-primary py-2 px-4  me-5" href="./auth/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <hr class="mt-5 pt-4">
        <div class="px-5 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%);">
            <div class="container" style="height:100vh;">
                <div class="row gx-lg-5 align-items-center">
                    <div class="mb-1 d-flex mt-4 mb-lg-0 justify-content-center">
                        <div class="col-lg-8 card">
                            <div class="card-body row shadow-lg d-flex justify-content-center py-5 px-md-5">
                                <?php if($hasilCek != []):?>
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                        <h6 class="text-center">Selamat,
                                            <strong><?=$hasilCek['nama_alternatif'];?></strong>
                                            dengan
                                            No KK <strong><?=$hasilCek['no_kk'];?></strong> terpilih untuk
                                            menerima rumah bantuan periode
                                            <strong><?=$hasilCek['nama_periode']?>.</strong></strong>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-6 d-flex justify-content-center">
                                    <img src="./images/<?=$hasilCek['gambar'];?>" class="img-fluid"
                                        alt="Gambar <?=$hasilCek['nama_alternatif'];?>">
                                </div>
                                <?php else:?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <h6 class="text-center">Maaf, No KK <strong><?=$_GET['nokk'];?></strong> tidak
                                            terpilih untuk menerima rumah bantuan pada periode ini.
                                        </h6>
                                    </div>
                                </div>
                                <?php endif;?>
                                <a href="./index.php" class="btn btn-primary mt-2">Kembali ke beranda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <footer class="bg-white text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #F0F0F0;">
            © 2024 Copyright:
            Desa Oematnunu
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>