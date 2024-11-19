<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "spk_pem_kost";

// // Membuat koneksi
// $conn = new mysqli($servername, $username, $password, $database);

// // Memeriksa koneksi
// if ($conn->connect_error) {
//     die("Koneksi gagal: " . $conn->connect_error);
// }

// Konfigurasi database
define('DB_HOST', 'localhost'); // Ganti dengan host database Anda
define('DB_USERNAME', 'root'); // Ganti dengan username database Anda
define('DB_PASSWORD', ''); // Ganti dengan password database Anda
define('DB_NAME', 'spk_rb'); // Ganti dengan nama database Anda

// Konfigurasi URL
define('BASE_URL', 'http://localhost/spk-rb/'); // Ganti dengan URL dasar website Anda

// Fungsi untuk menghubungkan ke database
function connectDatabase()
{
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    return $conn;
}

$koneksi = connectDatabase();
cekPeriode($koneksi);
function cekPeriode($koneksi)
{
    // Query untuk mendapatkan periode dengan id_periode = -1
    $result = $koneksi->query("SELECT * FROM `periode` WHERE id_periode = -1");

    // Cek apakah ada periode dengan id_periode = -1
    if (mysqli_num_rows($result) == 0) {
        // Jika tidak ada periode aktif, maka input data default
        $koneksi->query("INSERT INTO `periode` (id_periode, nama_periode, deskripsi, kuota, status) VALUES (-1, 'none', '-', 0, 'nonaktif')");
    }
}

function getPeriodeAktif(){
    $db = connectDatabase();
    $getData = $db->query("SELECT * FROM periode WHERE status='aktif'");
    $fecth = mysqli_fetch_assoc($getData);
    return $fecth;
}

function getFinishPeriode($id_periode = null){
    $db = connectDatabase();
    return $db->query("SELECT DISTINCT ha.f_id_periode FROM `periode` p JOIN hasil_akhir ha ON ha.f_id_periode=p.id_periode WHERE p.id_periode!=-1 AND ha.f_id_periode='$id_periode'")->num_rows;
}
?>