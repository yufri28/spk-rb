<?php 
require_once './config.php';
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
                    <div class="col-lg-5 mb-1 mb-lg-0">
                        <h2 class="my-3 mt-4 display-5 fw-bolder ls-tight">
                            Sistem Pendukung Keputusan <br />
                            <span style="color:#57C5B6">Penentuan
                                Penerima Rumah Bantuan</span>
                        </h2>
                        <h5 style="color: hsl(217, 10%, 50.8%)">
                            Sistem pendukung keputusan menggunakan metode <i style="color:#116A7B">Multi-Attribute
                                Utility Theory</i>
                        </h5>
                        <p class="fw-bolder" style="color: hsl(217, 10%, 50.8%)">
                            <?php if(getPeriodeAktif() && getFinishPeriode(getPeriodeAktif()['id_periode']) > 0){
                                echo "Penetapan penerima rumah bantuan Program Bantuan Stimulan
                            Perumahan Swadaya (BSPS) periode <strong>".getPeriodeAktif()['nama_periode']."</strong> telah dilakukan. Bapak/Ibu bisa cek hasil pengumumannya dengan masukkan No KK pada kolom di bawah ini!";
                            }elseif(getPeriodeAktif() && getFinishPeriode(getPeriodeAktif()['id_periode']) < 1){
                                echo "Saat ini Program Bantuan Stimulan
                            Perumahan Swadaya (BSPS) periode <strong>".getPeriodeAktif()['nama_periode']."</strong> dalam proses penetapan penerima rumah bantuan.";
                            }else{
                                echo 'Saat ini Program Bantuan Stimulan
                            Perumahan Swadaya (BSPS) belum dibuka.';
                            }
                            ?>
                        </p>
                        <?php if(getPeriodeAktif() && getFinishPeriode(getPeriodeAktif()['id_periode']) > 0):?>
                        <form action="./pengumuman.php" method="get">
                            <div class="d-flex">
                                <input type="text" placeholder="Masukkan No KK" class="form-control py-2 px-4 me-2"
                                    name="nokk" id="nokk">
                                <button type="submit" class="btn btn-lg py-2 px-4 col-lg-3"
                                    style="background-color: #29ADB2; color: white;">Cek</button>
                            </div>
                        </form>
                        <?php endif;?>
                    </div>
                    <div class="col-lg-7 mb-1 mt-4 mb-lg-0">
                        <div class="card">
                            <div class="card-body shadow-lg d-flex justify-content-center py-5 px-md-5">
                                <ul>
                                    <li>
                                        Sistem pendukung keputusan dinyatakan pertama kali oleh Michael S. Scott
                                        Morton pada tahun 1970 dengan istilah lain “Management Decision System” SPK
                                        dibuat untuk mendukung tahap pengambilan keputusan diawali dengan
                                        mengidentifikasi masalah, memilih data relevan, menentukan pendekatan yang
                                        digunakan dalam proses pengambilan keputusan, sampai mengevaluasi pemilihan
                                        alternatif.
                                    </li>
                                    <li>
                                        Menurut Schaefer (2015: 10) MAUT digunakan untuk merubah dari beberapa
                                        kepentingan kedalam nilai numerik dengan skala 0-1 dengan 0 mewakili pilihan
                                        terburuk dan 1 terbaik. Hal ini memungkinkan perbandingan langsung beragam
                                        nilai dengan tepat. Hasil akhirnya adalah urutan peringkat dari evaluasi
                                        alternatif yang menggambarkan pilihan dari para pembuat keputusan (Lestari,
                                        2018).
                                    </li>
                                    <li>
                                        Program Bantuan Stimulan Perumahan Swadaya (BSPS) merupakan program
                                        bantuan perbaikan rumah yang dilakukan secara swadaya oleh masyarakat
                                        penerima bantuan dalam hal ini masyarakat yang terkategori Masyarakat
                                        Berpenghasilan Rendah (MBR).
                                    </li>
                                </ul>
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