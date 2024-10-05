<?php 
session_start();
unset($_SESSION['menu']);
$_SESSION['menu'] = 'index';
?>
<?php require './header.php';?>
<div class="row">
    <!-- Area Chart -->
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                <div class="justify-content-center text-center p-5">
                    <h5 class="text-center mb-5">
                        SISTEM PENDUKUNG KEPUTUSAN PENENTUAN PENERIMA RUMAH
                        BANTUAN
                    </h5>
                    <p>
                        Sistem pendukung keputusan dinyatakan pertama kali oleh Michael S. Scott
                        Morton pada tahun 1970 dengan istilah lain “Management Decision System” SPK
                        dibuat untuk mendukung tahap pengambilan keputusan diawali dengan
                        mengidentifikasi masalah, memilih data relevan, menentukan pendekatan yang
                        digunakan dalam proses pengambilan keputusan, sampai mengevaluasi pemilihan
                        alternatif.
                    </p>
                    <p>
                        Menurut Schaefer (2015: 10) MAUT digunakan untuk merubah dari beberapa
                        kepentingan kedalam nilai numerik dengan skala 0-1 dengan 0 mewakili pilihan
                        terburuk dan 1 terbaik. Hal ini memungkinkan perbandingan langsung beragam
                        nilai dengan tepat. Hasil akhirnya adalah urutan peringkat dari evaluasi
                        alternatif yang menggambarkan pilihan dari para pembuat keputusan (Lestari,
                        2018).
                    </p>
                    <p>
                        Program Bantuan Stimulan Perumahan Swadaya (BSPS) merupakan program
                        bantuan perbaikan rumah yang dilakukan secara swadaya oleh masyarakat
                        penerima bantuan dalam hal ini masyarakat yang terkategori Masyarakat
                        Berpenghasilan Rendah (MBR).
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require './footer.php';?>