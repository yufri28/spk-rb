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
    echo $count;
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
        <?php if ($numRowsHasilAkhir < 1): ?>
        <?php if($periodeAktif != null):?>
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
            + Tambah data
        </button>
        <?php endif; ?>
        <?php endif; ?>
        <div class="card">
            <!-- <div class="card-header">
                Featured
            </div> -->
            <div class="card-body">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Kepala Keluarga</h6>
                        <div class="ml-auto">
                            <form action="" method="post">
                                <?php if ($numRowsHasilAkhir < 1): ?>
                                <?php if($periodeAktif != null):?>
                                <?php foreach ($dataAlternatif as $alternatif): ?>
                                <?php 
                                    // Mengumpulkan ID kriteria dan sub kriteria
                                    $arr_id_kriteria = [
                                        htmlspecialchars($alternatif['id_kriteria_C1']??'-'),
                                        htmlspecialchars($alternatif['id_kriteria_C2']??'-'),
                                        htmlspecialchars($alternatif['id_kriteria_C3']??'-'),
                                        htmlspecialchars($alternatif['id_kriteria_C4']??'-'),
                                        htmlspecialchars($alternatif['id_kriteria_C5']??'-'),
                                        htmlspecialchars($alternatif['id_kriteria_C6']??'-'),
                                        htmlspecialchars($alternatif['id_kriteria_C7']??'-'),
                                        htmlspecialchars($alternatif['id_kriteria_C8']??'-'),
                                        htmlspecialchars($alternatif['id_kriteria_C9']??'-')
                                    ];

                                    $arr_id_sub_kriteria = [
                                        htmlspecialchars($alternatif['id_sub_C1']??'-'),
                                        htmlspecialchars($alternatif['id_sub_C2']??'-'),
                                        htmlspecialchars($alternatif['id_sub_C3']??'-'),
                                        htmlspecialchars($alternatif['id_sub_C4']??'-'),
                                        htmlspecialchars($alternatif['id_sub_C5']??'-'),
                                        htmlspecialchars($alternatif['id_sub_C6']??'-'),
                                        htmlspecialchars($alternatif['id_sub_C7']??'-'),
                                        htmlspecialchars($alternatif['id_sub_C8']??'-'),
                                        htmlspecialchars($alternatif['id_sub_C9']??'-')
                                    ];
                                ?>
                                <input type="hidden" name="f_id_alternatif[]"
                                    value="<?= htmlspecialchars($alternatif['id_alternatif']) ?>">
                                <input type="hidden" name="f_id_kriteria[]"
                                    value="<?= htmlspecialchars(json_encode($arr_id_kriteria)) ?>">
                                <input type="hidden" name="f_id_sub_kriteria[]"
                                    value="<?= htmlspecialchars(json_encode($arr_id_sub_kriteria)) ?>">
                                <input type="hidden" name="periode"
                                    value="<?= htmlspecialchars(getPeriodeAktif()['id_periode']) ?>">
                                <?php endforeach; ?>
                                <button type="submit" name="usulkan" class="btn btn-primary mb-2">Ujukan</button>
                                <?php endif; ?>
                                <?php endif; ?>
                            </form>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <div class="alert text-center alert-warning" role="alert">
                                Kepala Keluarga yang sudah mendapat di periode-periode sebelumnya tidak akan tampil
                                lagi
                                pada tabel ini.
                                <?= ($numRowsHasilAkhir < 1) ? $periodeAktif != null?'<br><strong>Silahkan ajukan calon penerima rumah bantuan periode '.$periodeAktif['nama_periode'].'.</strong>':'<br><strong>Saat ini belum ada Program Bantuan Stimulan Perumahan Swadaya (BSPS) yang dibuka.</strong>':'';?>
                            </div>
                        </div>
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
                                        <th>Aksi</th>
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
                                        <td>
                                            <button data-toggle="modal"
                                                data-target="#edit<?=$data_alternatif['id_alternatif'];?>" type="button"
                                                class="btn btn-sm btn-primary">Edit</button>
                                            <button data-toggle="modal"
                                                data-target="#hapus<?=$data_alternatif['id_alternatif'];?>"
                                                type="button" class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <small class="text-danger">(*) Wajib</small>
                        <div class="">
                            <label for="exampleFormControlInput1" class="form-label">Nama Alternatif <small
                                    class="text-danger">*</small></label>
                            <input type="text" class="form-control" required name="nama_alternatif"
                                id="exampleFormControlInput1" placeholder="Nama Alternatif" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="gambar" class="form-label">Foto Rumah <small
                                    class="text-danger">*</small></label>
                            <input type="file" accept=".jpg, .jpeg, .png" class="form-control" name="gambar" id="gambar"
                                required placeholder="Gambar" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="no_kk" class="form-label">No KK <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" name="no_kk" id="no_kk" required
                                placeholder="No KK" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="c1" class="form-label">Jenis dinding <small
                                    class="text-danger">*</small></label>
                            <select class="form-control" name="C1" required aria-label="Default select example">
                                <option value="">-- Pilih Jenis dinding --</option>
                                <?php foreach ($dataSubC1 as $key => $c1):?>
                                <option value="<?=$c1['id_sub_kriteria'];?>">
                                    <?=$c1['nama_sub_kriteria'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="c2" class="form-label">Kondisi Dinding <small
                                    class="text-danger">*</small></label>
                            <select class="form-control" name="C2" required aria-label="Default select example">
                                <option value="">-- Pilih Kondisi Dinding --</option>
                                <?php foreach ($dataSubC2 as $key => $c2):?>
                                <option value="<?=$c2['id_sub_kriteria'];?>">
                                    <?=$c2['nama_sub_kriteria'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="c3" class="form-label">Jenis Atap <small class="text-danger">*</small></label>
                            <select class="form-control" name="C3" required aria-label="Default select example">
                                <option value="">-- Pilih Jenis Atap --</option>
                                <?php foreach ($dataSubC3 as $key => $c3):?>
                                <option value="<?=$c3['id_sub_kriteria'];?>">
                                    <?=$c3['nama_sub_kriteria'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="c4" class="form-label">Kondisi atap <small class="text-danger">*</small></label>
                            <select class="form-control" name="C4" required aria-label="Default select example">
                                <option value="">-- Pilih kondisi atap --</option>
                                <?php foreach ($dataSubC4 as $key => $c4):?>
                                <option value="<?=$c4['id_sub_kriteria'];?>">
                                    <?=$c4['nama_sub_kriteria'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="c5" class="form-label">Jenis Lantai <small class="text-danger">*</small></label>
                            <select class="form-control" name="C5" required aria-label="Default select example">
                                <option value="">-- Pilih Jenis Lantai --</option>
                                <?php foreach ($dataSubC5 as $key => $c5):?>
                                <option value="<?=$c5['id_sub_kriteria'];?>">
                                    <?=$c5['nama_sub_kriteria'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="c6" class="form-label">Kondisi lantai <small
                                    class="text-danger">*</small></label>
                            <select class="form-control" name="C6" required aria-label="Default select example">
                                <option value="">-- Pilih kondisi lantai --</option>
                                <?php foreach ($dataSubC6 as $key => $c6):?>
                                <option value="<?=$c6['id_sub_kriteria'];?>">
                                    <?=$c6['nama_sub_kriteria'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="c7" class="form-label">Kamar Mandi/Toilet <small
                                    class="text-danger">*</small></label>
                            <select class="form-control" name="C7" required aria-label="Default select example">
                                <option value="">-- Pilih Kamar Mandi/Toilet --</option>
                                <?php foreach ($dataSubC7 as $key => $c7):?>
                                <option value="<?=$c7['id_sub_kriteria'];?>">
                                    <?=$c7['nama_sub_kriteria'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="c8" class="form-label">Pendapatan Keluarga <small
                                    class="text-danger">*</small></label>
                            <select class="form-control" name="C8" required aria-label="Default select example">
                                <option value="">-- Pilih Pendapatan Keluarga --</option>
                                <?php foreach ($dataSubC8 as $key => $c8):?>
                                <option value="<?=$c8['id_sub_kriteria'];?>">
                                    <?=$c8['nama_sub_kriteria'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="c9" class="form-label">Jumlah Tanggungan <small
                                    class="text-danger">*</small></label>
                            <select class="form-control" name="C9" required aria-label="Default select example">
                                <option value="">-- Pilih Jumlah Tanggungan --</option>
                                <?php foreach ($dataSubC9 as $key => $c9):?>
                                <option value="<?=$c9['id_sub_kriteria'];?>">
                                    <?=$c9['nama_sub_kriteria'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($dataAlternatif as $alternatif):?>
<div class="modal fade" id="edit<?=$alternatif['id_alternatif'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="id_alternatif" value="<?=$alternatif['id_alternatif'];?>">
                <div class="modal-body">
                    <div class="card-body">
                        <small class="text-danger">(*) Wajib</small>
                        <div class="">
                            <label for="exampleFormControlInput1" class="form-label">Nama Alternatif <small
                                    class="text-danger">*</small></label>
                            <input type="text" class="form-control" required name="nama_alternatif"
                                value="<?=$alternatif['nama_alternatif'];?>" id="exampleFormControlInput1"
                                placeholder="Nama Alternatif" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <input type="hidden" name="gambar_lama" value="<?=$alternatif['gambar'];?>">
                            <label for="gambar" class="form-label">Foto Rumah</label>
                            <input type="file" accept=".jpg, .jpeg, .png" class="form-control"
                                value="<?=$alternatif['gambar'];?>" name="gambar" id="gambar" placeholder="Gambar" />
                            <small><i>Jika gambar tidak diubah, maka tidak perlu diupload lagi.</i></small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="c1" class="form-label">Jenis dinding <small
                                    class="text-danger">*</small></label>
                            <select class="form-control" name="c1" required aria-label="Default select example">
                                <option value="">-- Pilih Jenis dinding --</option>
                                <?php foreach ($dataSubC1 as $key => $c1):?>
                                <option <?=$c1 == $alternatif['C1'] ? 'selected':'';?> value="<?=$c1;?>">
                                    <?=$c1;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="merek" class="form-label">Merek <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" value="<?=$alternatif['merek'];?>" name="merek"
                                id="merek" required placeholder="Merek" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="harga" class="form-label">Harga <small class="text-danger">*</small></label>
                            <select class="form-control" name="harga" required aria-label="Default select example">
                                <option value="">-- Pilih Harga --</option>
                                <?php foreach ($dataSubHarga as $key => $harga):?>
                                <option <?=$harga['id_sub_kriteria'] == $alternatif['id_sub_C1'] ? 'selected':'';?>
                                    value="<?=$harga['id_sub_kriteria'];?>">
                                    <?=$harga['nama_sub_kriteria'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="kualitas" class="form-label">Kualitas <small
                                    class="text-danger">*</small></label>
                            <select class="form-control" name="kualitas" required aria-label="Default select example">
                                <option value="">-- Pilih Kualitas --</option>
                                <?php foreach ($dataSubKualitas as $key => $kualitas):?>
                                <option <?=$kualitas['id_sub_kriteria'] == $alternatif['id_sub_C2'] ? 'selected':'';?>
                                    value="<?=$kualitas['id_sub_kriteria'];?>">
                                    <?=$kualitas['nama_sub_kriteria'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="volume" class="form-label">Volume <small class="text-danger">*</small></label>
                            <select class="form-control" name="volume" required aria-label="Default select example">
                                <option value="">-- Pilih Volume --</option>
                                <?php foreach ($dataSubVolume as $key => $volume):?>
                                <option <?=$volume['id_sub_kriteria'] == $alternatif['id_sub_C3'] ? 'selected':'';?>
                                    value="<?=$volume['id_sub_kriteria'];?>">
                                    <?=$volume['nama_sub_kriteria'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="kelengkapan" class="form-label">Kelengkapan <small
                                    class="text-danger">*</small></label>
                            <select class="form-control" name="kelengkapan" required
                                aria-label="Default select example">
                                <option value="">-- Pilih Kelengkapan --</option>
                                <?php foreach ($dataSubKelengkapan as $key => $kelengkapan):?>
                                <option
                                    <?= $kelengkapan['id_sub_kriteria'] == $alternatif['id_sub_C4'] ? 'selected':'';?>
                                    value="<?=$kelengkapan['id_sub_kriteria'];?>">
                                    <?=$kelengkapan['nama_sub_kriteria'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php foreach ($dataAlternatif as $alternatif):?>
<div class="modal fade" id="hapus<?=$alternatif['id_alternatif'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="id_alternatif" value="<?=$alternatif['id_alternatif'];?>">
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus alternatif <strong>
                            <?=$alternatif['nama_alternatif'];?></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" name="hapus" class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php require_once './footer.php';?>