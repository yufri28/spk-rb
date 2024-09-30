<?php 
session_start();
unset($_SESSION['menu']);
$_SESSION['menu'] = 'hasil-per';
require_once './header.php';
require_once './functions/hasil.php';

$selectBobot = $koneksi->query("SELECT * FROM kriteria");
$periodeAktif = getPeriodeAktif();
$numRowsHasilAkhir = $getDataHasil->getHasilAkhirByPeriode($periodeAktif['id_periode'])->num_rows;
$jumlahKuota = 0;


if(mysqli_num_rows($selectBobot) <= 0){
    $_SESSION['error-bobot'] = 'Harap mengisi data bobot kriteria terlebih dahulu!';
}

if (empty($periodeAktif)) {
    $_SESSION['error-periode'] = 'Harap mengisi data periode aktif terlebih dahulu!';
}

$jumlahKuota  = $periodeAktif['kuota'];


?>
<?php if (isset($_SESSION['error-bobot'])): ?>
<script>
var errorBobot = '<?php echo $_SESSION["error-bobot"]; ?>';
Swal.fire({
    title: 'Error!',
    text: errorBobot,
    icon: 'error',
    confirmButtonText: 'OK'
}).then(function(result) {
    if (result.isConfirmed) {
        window.location.href = './kriteria.php';
    }
});
</script>
<?php unset($_SESSION['error-bobot']); // Menghapus session setelah ditampilkan ?>
<?php endif; ?>
<?php if (isset($_SESSION['error-periode'])): ?>
<script>
alert("Silahkan set periode aktif terlebih dahulu!");
window.location.href = './periode.php';
</script>
<?php unset($_SESSION['error-periode']); // Menghapus session setelah ditampilkan ?>
<?php endif; ?>
<?php 

// Inisialisasi array dengan nilai default 0
$bobotKriteria = array_fill(1, 9, 0);

foreach ($selectBobot as $bobot) {
    $id = (int) substr($bobot['id_kriteria'], 1); // Ambil angka dari id_kriteria (misalnya 'C1' menjadi 1)
    if (isset($bobotKriteria[$id])) {
        $bobotKriteria[$id] = $bobot['bobot_kriteria'];
    }
}

// Gabungkan array bobot dengan id_periode
$parameterArray = array_merge($bobotKriteria, [$periodeAktif['id_periode']]);

// Panggil fungsi dengan semua parameter
$dataPreferensi = $getDataHasil->getDataPreferensi(...$parameterArray);

if (isset($_POST['simpan-hasil'])) {

    $combinedArray = array();
    $tampungArray = array(); // Array untuk tampung data gabungan

    // Ambil data dari POST dan isi $tampungArray
    for ($i = 0; $i < count($_POST['id_alternatif']); $i++) {
        $idAlternatif = $_POST['id_alternatif'][$i];
        $nilaiPreferensi = $_POST['preferensi'][$i];
        $id_periode = $periodeAktif['id_periode'];
        
        $tampungArray[] = array(
            'id_alternatif' => $idAlternatif,
            'nilai_preferensi' => $nilaiPreferensi,
            'f_id_periode' => $id_periode
        );
    }
    
    // Periksa jumlah data preferensi yang sudah ada
    $numRows = 0;
    if ($dataPreferensi != null) {
        $numRows = mysqli_num_rows($dataPreferensi);
    }

    // Pastikan jumlah data memenuhi kuota
    if ($jumlahKuota <= $numRows) {
        if (count($tampungArray) > 0) {
            for ($j = 0; $j < min($jumlahKuota, count($tampungArray)); $j++) {
                $combinedArray[] = array(
                    'f_id_alternatif' => $tampungArray[$j]['id_alternatif'],
                    'preferensi_akhir' => $tampungArray[$j]['nilai_preferensi'], // Sesuaikan dengan data yang ada
                    'f_id_periode' => $tampungArray[$j]['f_id_periode']
                );
            }
            $getDataHasil->simpanHasil($combinedArray);
        } else {
            $_SESSION['error'] = "Jumlah KK belum mencukupi kuota!";
        }
    } else {
        $_SESSION['error'] = "Jumlah KK belum mencukupi kuota!";
    }
}

?>
<?php if (isset($_SESSION['success'])): ?>
<script>
var success = '<?php echo $_SESSION["success"]; ?>';
Swal.fire({
    title: 'Success!',
    text: success,
    icon: 'success',
    confirmButtonText: 'OK'
}).then(function(result) {
    if (result.isConfirmed) {
        window.location.href = '';
    }
});
</script>
<?php unset($_SESSION['success']); // Menghapus session setelah ditampilkan ?>
<?php endif; ?>
<?php if (isset($_SESSION['error'])): ?>
<script>
var error = '<?php echo $_SESSION["error"]; ?>';
Swal.fire({
    title: 'Error!',
    text: error,
    icon: 'error',
    confirmButtonText: 'OK'
}).then(function(result) {
    if (result.isConfirmed) {
        window.location.href = '';
    }
});
</script>
<?php unset($_SESSION['error']); // Menghapus session setelah ditampilkan ?>
<?php endif; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil Perengkingan</h6>
                            <div class="ml-auto">
                                <form action="" method="post">
                                    <?php if ($numRowsHasilAkhir < 1): ?>
                                    <?php if($dataPreferensi->num_rows > 0):?>
                                    <?php foreach ($dataPreferensi as $preferensi): ?>
                                    <input type="hidden" name="id_alternatif[]"
                                        value="<?= htmlspecialchars($preferensi['id_alternatif']) ?>">
                                    <input type="hidden" name="preferensi[]"
                                        value="<?= htmlspecialchars($preferensi['preferensi']) ?>">
                                    <?php endforeach; ?>
                                    <button type="submit" name="simpan-hasil" class="btn btn-primary mb-2">Simpan
                                        Hasil</button>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered nowrap" id="dataAlternatif" style="width:100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alternatif</th>
                                        <th>Gambar</th>
                                        <th>No KK</th>
                                        <th>Jenis Dinding</th>
                                        <th>Kondisi Dinding</th>
                                        <th>Jenis Atap</th>
                                        <th>Kondisi Atap</th>
                                        <th>Jenis Lantai</th>
                                        <th>Kondisi Lantai</th>
                                        <th>Kamar Mandi/Toilet</th>
                                        <th>Pendapatan Keluarga</th>
                                        <th>Jumlah Tanggungan</th>
                                        <th>Preferensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataPreferensi as $key => $preferensi):?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$preferensi['nama_alternatif'];?></td>
                                        <td><a href="../images/<?=$preferensi['gambar'];?>" data-lightbox="image-1"
                                                data-title="<?=$preferensi['nama_alternatif'];?>">
                                                <img style="width: 50px; height: 50px;"
                                                    src="../images/<?=$preferensi['gambar'];?>"
                                                    alt="Gambar <?=$preferensi['nama_alternatif'];?>">
                                            </a></td>
                                        <td><?=$preferensi['no_kk'];?></td>
                                        <td><?=$preferensi['nama_C1'];?></td>
                                        <td><?=$preferensi['nama_C2'];?></td>
                                        <td><?=$preferensi['nama_C3'];?></td>
                                        <td><?=$preferensi['nama_C4'];?></td>
                                        <td><?=$preferensi['nama_C5'];?></td>
                                        <td><?=$preferensi['nama_C6'];?></td>
                                        <td><?=$preferensi['nama_C7'];?></td>
                                        <td><?=$preferensi['nama_C8'];?></td>
                                        <td><?=$preferensi['nama_C9'];?></td>
                                        <td><?=$preferensi['preferensi']??0;?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once './footer.php';?>