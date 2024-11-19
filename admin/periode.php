<?php 
session_start();
unset($_SESSION['menu']);
$_SESSION['menu'] = 'periode';
require_once './header.php';
require_once './functions/periode.php';
?>
<?php 
if(isset($_POST['tambah'])){
    $nama_periode = $_POST['nama_periode'];
    $deskripsi = $_POST['deskripsi'];
    $kuota = $_POST['kuota'];
    $status = $_POST['status'];
    $dataPeriode = [
        "nama_periode" => $nama_periode,
        "deskripsi" => $deskripsi,
        "kuota" => $kuota,
        "status" => $status
    ];
    $Periode->tambahPeriode($dataPeriode);
}
if(isset($_POST['edit'])){
    $id_periode = $_POST['id_periode'];
    $nama_periode = $_POST['nama_periode'];
    $deskripsi = $_POST['deskripsi'];
    $kuota = $_POST['kuota'];
    $status = $_POST['status'];
    $dataPeriode = [
       "id_periode" => $id_periode,
       "nama_periode" => $nama_periode,
       "deskripsi" => $deskripsi,
       "kuota" => $kuota,
       "status" => $status
    ];
    $Periode->editPeriode($dataPeriode);
}
if(isset($_POST['hapus'])){
    $id_periode = $_POST['id_periode'];
    $Periode->hapusPeriode($id_periode);
}

$data_Periode = $Periode->getPeriode();
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
        window.location.href = '';
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
        window.location.href = '';
    }
});
</script>
<?php unset($_SESSION['error']); // Menghapus session setelah ditampilkan ?>
<?php endif; ?>
<div class="row">
    <!-- Area Chart -->
    <!-- Button trigger modal -->
    <div class="col-lg-12">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">
            + Tambah data
        </button>
        <div class="card">
            <!-- <div class="card-header">
                Featured
            </div> -->
            <div class="card-body">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Kriteria</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Periode</th>
                                        <th>Deskripsi</th>
                                        <th>Kouta</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_Periode as $key => $periode):?>
                                    <tr>
                                        <th scope="row"><?=$key+1;?></th>
                                        <td><?=$periode['nama_periode'];?></td>
                                        <td><?=$periode['deskripsi'];?>
                                        </td>
                                        <td><?=$periode['kuota'];?></td>
                                        <td><?=($periode['status'] == 'aktif') && ($Periode->getFinishPeriode($periode['id_periode']) < 1)?$periode['status']:'nonaktif';?>
                                        </td>
                                        <td><?=($Periode->getFinishPeriode($periode['id_periode']) > 0)?'Selesai':'Belum';?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#edit<?= $periode['id_periode'];?>">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#hapus<?= $periode['id_periode'];?>">
                                                Hapus
                                            </button>
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
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <small class="text-danger">(*) Wajib</small>
                        <div class="mt-2">
                            <label for="nama_periode" class="form-label">Nama Periode <small
                                    class="text-danger">*</small></label>
                            <input class="form-control" required name="nama_periode" type="text"
                                placeholder="Nama Periode" aria-label="default input example">
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="deskripsi" class="form-label">Deskripsi <small class="text-danger">*</small></label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="card-body">
                        <label for="kuota" class="form-label">Kuota <small class="text-danger">*</small></label>
                        <input class="form-control" required name="kuota" type="number" placeholder="Kuota"
                            aria-label="default input example">
                    </div>

                    <div class="card-body">
                        <label for="status" class="form-label">Status <small class="text-danger">*</small></label>
                        <select name="status" class="form-control" id="status">
                            <option value="">-- Pilih --</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Non-aktif</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" name="tambah" class="btn btn-outline-primary">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach ($data_Periode as $key => $periode):?>
<div class="modal fade" id="edit<?=$periode['id_periode'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <small class="text-danger">(*) Wajib</small>
                        <input class="form-control" name="id_periode" value="<?=$periode['id_periode'];?>" required
                            type="hidden" aria-label="default input example">
                        <div class="">
                            <label for="nama_periode" class="form-label">Nama Periode <small
                                    class="text-danger">*</small></label>
                            <input class="form-control" required name="nama_periode" type="text" placeholder="Periode"
                                value="<?=$periode['nama_periode'];?>" aria-label="default input example">
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="deskripsi" class="form-label">Deskripsi <small class="text-danger">*</small></label>
                        <textarea name="deskripsi" id="deskripsi"
                            class="form-control"><?=$periode['deskripsi'];?></textarea>
                    </div>
                    <div class="card-body">
                        <label for="kuota" class="form-label">Kuota <small class="text-danger">*</small></label>
                        <input class="form-control" value="<?=$periode['kuota'];?>" required name="kuota" type="number"
                            placeholder="Kuota" aria-label="default input example">
                    </div>

                    <div class="card-body" <?= $Periode->getFinishPeriode($periode['id_periode']) > 0 ?'hidden':'';?>>
                        <label for="status" class="form-label">Status <small class="text-danger">*</small></label>
                        <select name="status" class="form-control" id="status">
                            <option value="">-- Pilih --</option>
                            <option <?=$periode['status'] == 'aktif'?'selected':'';?> value="aktif">Aktif</option>
                            <option <?=$periode['status'] == 'nonaktif'?'selected':'';?> value="nonaktif">Non-aktif
                            </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" name="edit" class="btn btn-outline-primary">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php foreach ($data_Periode as $periode):?>
<div class="modal fade" id="hapus<?=$periode['id_periode'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Hapus Periode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="id_periode" value="<?=$periode['id_periode'];?>">
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus periode <strong>
                            <?=$periode['nama_periode'];?></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="hapus" class="btn btn-outline-primary">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php require_once './footer.php';?>