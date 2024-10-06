<?php 
session_start();
unset($_SESSION['menu']);
$_SESSION['menu'] = 'alternatif';
require_once './header.php';
require_once './functions/data_alternatif.php';
require_once './functions/hasil.php';

$periodeAktif = getPeriodeAktif()??null;
$numRowsHasilAkhir = 0;
if(!empty($periodeAktif)){
    $numRowsHasilAkhir = $Alternatif->getUsulNumRows($periodeAktif['id_periode'])->num_rows;
}
$dataAlternatif = $Alternatif->getAlternatif();
$dataSubC1 = $Alternatif->getSubC1();
$dataSubC2 = $Alternatif->getSubC2();
$dataSubC3 = $Alternatif->getSubC3();
$dataSubC4 = $Alternatif->getSubC4();
$dataSubC5 = $Alternatif->getSubC5();
$dataSubC6 = $Alternatif->getSubC6();
$dataSubC7 = $Alternatif->getSubC7();
$dataSubC8 = $Alternatif->getSubC8();
$dataSubC9 = $Alternatif->getSubC9();

$usulkanDataAlt = [];
$usulkanDataAltKriteria = [];
$count = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['usulkan'])) {
    // Ambil data dari form
    $id_alternatif = $_POST['f_id_alternatif'];
    $id_kriteria = array_map('json_decode', $_POST['f_id_kriteria']);
    $id_sub_kriteria = array_map('json_decode', $_POST['f_id_sub_kriteria']);
    $periode = htmlspecialchars($_POST['periode']);

    foreach ($id_alternatif as $index => $alternatif_id) {
        // Iterasi berdasarkan kriteria
        foreach ($id_kriteria[$index] as $kriteria_index => $kriteria_value) {
            if (!empty($kriteria_value)) { // Hanya tampilkan jika kriteria ada nilainya
                $insert = $Alternatif->usulkanData($alternatif_id,$kriteria_value,$id_sub_kriteria[$index][$kriteria_index],$periode);
                if($insert){
                    ++$count;
                }
            }
        }
        
    }
    // echo $count;
    if($count == 0){
        $_SESSION['error'] = 'Terjadi kesalahan saat pengajuan data!';
    }else{
        $_SESSION['success'] = 'Pengajuan data berhasil!';
    }

}


// tambah alternatif
if(isset($_POST['tambah'])){
    $nama_alternatif = htmlspecialchars($_POST['nama_alternatif']);
    $no_kk = htmlspecialchars($_POST['no_kk']);
    
    // Pastikan ada file gambar yang diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $namaFile = $_FILES['gambar']['name'];
        $lokasiSementara = $_FILES['gambar']['tmp_name'];
        
        // Tentukan lokasi tujuan penyimpanan
        $targetDir = '../images/';
        $targetFilePath = $targetDir . $namaFile;

        // Cek apakah nama file sudah ada dalam direktori target
        if (file_exists($targetFilePath)) {
            $fileInfo = pathinfo($namaFile);
            $baseName = $fileInfo['filename'];
            $extension = $fileInfo['extension'];
            $counter = 1;

            // Loop hingga menemukan nama file yang unik
            while (file_exists($targetFilePath)) {
                $namaFile = $baseName . '_' . $counter . '.' . $extension;
                $targetFilePath = $targetDir . $namaFile;
                $counter++;
            }
        }

        // Pindahkan file gambar dari lokasi sementara ke lokasi tujuan
        if (move_uploaded_file($lokasiSementara, $targetFilePath)) {
            $C1 = htmlspecialchars($_POST['C1']);
            $C2 = htmlspecialchars($_POST['C2']);
            $C3 = htmlspecialchars($_POST['C3']);
            $C4 = htmlspecialchars($_POST['C4']);
            $C5 = htmlspecialchars($_POST['C5']);
            $C6 = htmlspecialchars($_POST['C6']);
            $C7 = htmlspecialchars($_POST['C7']);
            $C8 = htmlspecialchars($_POST['C8']);
            $C9 = htmlspecialchars($_POST['C9']);
        
            $dataAlternatif = [
                'nama_alternatif' => $nama_alternatif,
                'gambar' => $namaFile,
                'no_kk' => $no_kk
            ];
            
            $dataKecAltKrit = [
                'C1' => $C1,
                'C2' => $C2,
                'C3' => $C3,
                'C4' => $C4,
                'C5' => $C5,
                'C6' => $C6,
                'C7' => $C7,
                'C8' => $C8,
                'C9' => $C9
            ];
            $Alternatif->addDataAlternatif($dataAlternatif,$dataKecAltKrit);
        } else {
            return $_SESSION['error'] = 'Tidak ada data yang dikirim!';
        }
    } else {
        return $_SESSION['error'] = 'Tidak ada data yang dikirim!';
    }    
}

// edit alternatif
if(isset($_POST['edit'])){
    $id_alternatif = htmlspecialchars($_POST['id_alternatif']);
    $nama_alternatif = htmlspecialchars($_POST['nama_alternatif']);
    $no_kk = htmlspecialchars($_POST['no_kk']);
    
    // Pastikan ada file gambar yang diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $namaFile = $_FILES['gambar']['name'];
        $lokasiSementara = $_FILES['gambar']['tmp_name'];
        
        // Tentukan lokasi tujuan penyimpanan
        $targetDir = '../images/';
        $targetFilePath = $targetDir . $namaFile;

        // Cek apakah nama file sudah ada dalam direktori target
        if (file_exists($targetFilePath)) {
            $fileInfo = pathinfo($namaFile);
            $baseName = $fileInfo['filename'];
            $extension = $fileInfo['extension'];
            $counter = 1;

            // Loop hingga menemukan nama file yang unik
            while (file_exists($targetFilePath)) {
                $namaFile = $baseName . '_' . $counter . '.' . $extension;
                $targetFilePath = $targetDir . $namaFile;
                $counter++;
            }
        }

        // Pindahkan file gambar dari lokasi sementara ke lokasi tujuan
        if (move_uploaded_file($lokasiSementara, $targetFilePath)) {
            // Hapus file gambar lama jika ada
            $gambarLama = $_POST['gambar_lama'];
            $pathGambarLama = $targetDir . $gambarLama;
            if (file_exists($pathGambarLama) && is_file($pathGambarLama)) {
                unlink($pathGambarLama); // Hapus file gambar lama
            }

            $C1 = htmlspecialchars($_POST['C1']);
            $C2 = htmlspecialchars($_POST['C2']);
            $C3 = htmlspecialchars($_POST['C3']);
            $C4 = htmlspecialchars($_POST['C4']);
            $C5 = htmlspecialchars($_POST['C5']);
            $C6 = htmlspecialchars($_POST['C6']);
            $C7 = htmlspecialchars($_POST['C7']);
            $C8 = htmlspecialchars($_POST['C8']);
            $C9 = htmlspecialchars($_POST['C9']);
        
            $dataAlternatif = [
                'id_alternatif' => $id_alternatif,
                'nama_alternatif' => $nama_alternatif,
                'gambar' => $namaFile,
                'no_kk' => $no_kk
            ];
            
            $dataKecAltKrit = [
                'C1' => $C1,
                'C2' => $C2,
                'C3' => $C3,
                'C4' => $C4,
                'C5' => $C5,
                'C6' => $C6,
                'C7' => $C7,
                'C8' => $C8,
                'C9' => $C9
            ];

            
            $Alternatif->editDataAlternatif($dataAlternatif,$dataKecAltKrit);
        } else {
            return $_SESSION['error'] = 'Tidak ada data yang dikirim!';
        }
    } else {
        
        $C1 = htmlspecialchars($_POST['C1']);
        $C2 = htmlspecialchars($_POST['C2']);
        $C3 = htmlspecialchars($_POST['C3']);
        $C4 = htmlspecialchars($_POST['C4']);
        $C5 = htmlspecialchars($_POST['C5']);
        $C6 = htmlspecialchars($_POST['C6']);
        $C7 = htmlspecialchars($_POST['C7']);
        $C8 = htmlspecialchars($_POST['C8']);
        $C9 = htmlspecialchars($_POST['C9']);
    
        $dataAlternatif = [
            'id_alternatif' => $id_alternatif,
            'nama_alternatif' => $nama_alternatif,
            'gambar' => $_POST['gambar_lama'],
            'no_kk' => $no_kk
        ];
        
        $dataKecAltKrit = [
            'C1' => $C1,
            'C2' => $C2,
            'C3' => $C3,
            'C4' => $C4,
            'C5' => $C5,
            'C6' => $C6,
            'C7' => $C7,
            'C8' => $C8,
            'C9' => $C9
        ];
        
        $Alternatif->editDataAlternatif($dataAlternatif,$dataKecAltKrit);
    }
}

if(isset($_POST['hapus'])){
    $id_alternatif = htmlspecialchars($_POST['id_alternatif']);
    $Alternatif->hapusDataAlternatif($id_alternatif);
}


$arr_id_kriteria = [];
$arr_id_sub_kriteria = [];
?>
<?php if (isset($_SESSION['success'])): ?>
<script>
var successfuly = '<?php echo $_SESSION["success"]; ?>';
Swal.fire({
    title: 'Sukses!',
    text: successfuly,
    icon: 'success',
    confirmButtonText: 'OK'
}).then(function(result) {
    if (result.isConfirmed) {
        // window.location.href = '';
        window.location.href = window.location.href;
    }
});
</script>
<?php unset($_SESSION['success']); // Menghapus session setelah ditampilkan ?>
<?php endif; ?>
<?php if (isset($_SESSION['error'])): ?>
<script>
Swal.fire({
    title: 'Error!',
    text: '<?php echo $_SESSION['error']; ?>',
    icon: 'error',
    confirmButtonText: 'OK'
}).then(function(result) {
    if (result.isConfirmed) {
        // window.location.href = '';
        window.location.href = window.location.href;
    }
});
</script>
<?php unset($_SESSION['error']); // Menghapus session setelah ditampilkan ?>
<?php endif; ?>
<div class="row">
    <!-- Area Chart -->
    <!-- Button trigger modal -->
    <div class="col-lg-12">
        <div class="card">
            <!-- <div class="card-header">
                Featured
            </div> -->
            <div class="card-body">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Kepala Keluarga</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered nowrap" id="dataKepalaKeluarga" style="width:100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kepala Keluarga</th>
                                        <th>Foto Rumah</th>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;?>
                                    <?php foreach ($dataAlternatif as $key => $data_alternatif):?>
                                    <tr>
                                        <td><?=(++$i);?></td>
                                        <td><?=$data_alternatif['nama_alternatif']??'-??'-'';?></td>
                                        <td><a href="../images/<?=$data_alternatif['gambar'];?>" data-lightbox="image-1"
                                                data-title="<?=$data_alternatif['nama_alternatif'];?>">
                                                <img style="width: 50px; height: 50px;"
                                                    src="../images/<?=$data_alternatif['gambar'];?>"
                                                    alt="Gambar <?=$data_alternatif['nama_alternatif'];?>">
                                            </a></td>
                                        <td><?=$data_alternatif['no_kk']??'-';?></td>
                                        <td><?=$data_alternatif['nama_C1']??'-';?></td>
                                        <td><?=$data_alternatif['nama_C2']??'-';?></td>
                                        <td><?=$data_alternatif['nama_C3']??'-';?></td>
                                        <td><?=$data_alternatif['nama_C4']??'-';?></td>
                                        <td><?=$data_alternatif['nama_C5']??'-';?></td>
                                        <td><?=$data_alternatif['nama_C6']??'-';?></td>
                                        <td><?=$data_alternatif['nama_C7']??'-';?></td>
                                        <td><?=$data_alternatif['nama_C8']??'-';?></td>
                                        <td><?=$data_alternatif['nama_C9']??'-';?></td>
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