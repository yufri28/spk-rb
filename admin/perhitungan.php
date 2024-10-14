<?php 
session_start();
unset($_SESSION['menu']);
$_SESSION['menu'] = 'hasil-akhir';
require_once './header.php';
require_once './functions/hasil.php';
require_once './functions/periode.php';


$total = 0;
$total_akhir_bobot = 0;
if(isset($_GET['per'])){
    $id_periode = $_GET['per'];
}else{
    echo "<script>alert('Tidak periode yang dipilih!');window.location.href='hasil-akhir.php';</script>";
}

// Initialize an associative array to hold the criteria values
$criteria = [
    'C1' => 0,
    'C2' => 0,
    'C3' => 0,
    'C4' => 0,
    'C5' => 0,
    'C6' => 0,
    'C7' => 0,
    'C8' => 0,
    'C9' => 0
];

// Fetch criteria data from the database
$selectBobot = $koneksi->query("SELECT * FROM kriteria");

while ($fetch = mysqli_fetch_assoc($selectBobot)) {
    $id = $fetch['id_kriteria'];
    if (isset($criteria[$id])) {
        $criteria[$id] = $fetch['bobot_kriteria'];
        $total += $fetch['bobot_kriteria'];
    }
}

// Extract individual criteria values
list($c1, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9) = array_values($criteria);

// Get the active period and other necessary data
$periodeAktif = getPeriodeAktif();
$dataPeriode = $Periode->getPeriode();
$dataHasilPreferensi = $getDataHasil->getPreferensiPerhitungan($c1, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9, $id_periode);
$dataPerhitungan = $getDataHasil->perhitungan($id_periode);
?>
<div class="row">
    <h1 class="col-12 text-center">Langkah-langkah Perhitungan</h1>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex">
                            <h6 class="m-0 font-weight-bold text-primary">Transformasi Data</h6>
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
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                        <th>C6</th>
                                        <th>C7</th>
                                        <th>C8</th>
                                        <th>C9</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataPerhitungan as $key => $perhitungan):?>
                                    <?php if($perhitungan['nama_alternatif'] != 'min' && $perhitungan['nama_alternatif'] != 'max'):?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$perhitungan['nama_alternatif'];?></td>
                                        <td><?=$perhitungan['C1'];?></td>
                                        <td><?=$perhitungan['C2'];?></td>
                                        <td><?=$perhitungan['C3'];?></td>
                                        <td><?=$perhitungan['C4'];?></td>
                                        <td><?=$perhitungan['C5'];?></td>
                                        <td><?=$perhitungan['C6'];?></td>
                                        <td><?=$perhitungan['C7'];?></td>
                                        <td><?=$perhitungan['C8'];?></td>
                                        <td><?=$perhitungan['C9'];?></td>
                                    </tr>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex">
                            <h6 class="m-0 font-weight-bold text-primary">Nilai Bobot Kriteria</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered nowrap" id="dataAlternatif" style="width:100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <?php for ($i = 1; $i <= 9; $i++): ?>
                                        <th>C<?=$i;?></th>
                                        <?php endfor; ?>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php 
                                        $c_values = [$c1, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9];
                                        foreach ($c_values as $c_value): ?>
                                        <td><?=$c_value.' / '.$total.' = '.round($c_value / $total, 1);?></td>
                                        <?php $total_akhir_bobot += round($c_value / $total, 1); ?>
                                        <?php endforeach; ?>
                                        <td><?=round($total_akhir_bobot,0);?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex">
                            <h6 class="m-0 font-weight-bold text-primary">Nilai Tertinggi dan Terendah</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered nowrap" id="dataAlternatif" style="width:100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>MIN / MAX</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                        <th>C6</th>
                                        <th>C7</th>
                                        <th>C8</th>
                                        <th>C9</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;?>
                                    <?php foreach ($dataPerhitungan as $key => $perhitungan):?>
                                    <?php if($perhitungan['nama_alternatif'] == 'min' || $perhitungan['nama_alternatif'] == 'max'):?>
                                    <tr>
                                        <td><?=++$i?></td>
                                        <td><?=$perhitungan['nama_alternatif'];?></td>
                                        <td><?=$perhitungan['C1'];?></td>
                                        <td><?=$perhitungan['C2'];?></td>
                                        <td><?=$perhitungan['C3'];?></td>
                                        <td><?=$perhitungan['C4'];?></td>
                                        <td><?=$perhitungan['C5'];?></td>
                                        <td><?=$perhitungan['C6'];?></td>
                                        <td><?=$perhitungan['C7'];?></td>
                                        <td><?=$perhitungan['C8'];?></td>
                                        <td><?=$perhitungan['C9'];?></td>
                                    </tr>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan Nilai Utilitas</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered nowrap" id="dataAlternatifUtilitas" style="width:100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alternatif</th>
                                        <th>Utilitas C1</th>
                                        <th>Utilitas C2</th>
                                        <th>Utilitas C3</th>
                                        <th>Utilitas C4</th>
                                        <th>Utilitas C5</th>
                                        <th>Utilitas C6</th>
                                        <th>Utilitas C7</th>
                                        <th>Utilitas C8</th>
                                        <th>Utilitas C9</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;?>
                                    <?php foreach ($dataPerhitungan as $key => $perhitungan):?>
                                    <?php if($perhitungan['nama_alternatif'] != 'min' && $perhitungan['nama_alternatif'] != 'max'):?>
                                    <tr>
                                        <td><?=++$i?></td>
                                        <td><?=$perhitungan['nama_alternatif'];?></td>
                                        <td><?=$perhitungan['utilitas_C1'];?></td>
                                        <td><?=$perhitungan['utilitas_C2'];?></td>
                                        <td><?=$perhitungan['utilitas_C3'];?></td>
                                        <td><?=$perhitungan['utilitas_C4'];?></td>
                                        <td><?=$perhitungan['utilitas_C5'];?></td>
                                        <td><?=$perhitungan['utilitas_C6'];?></td>
                                        <td><?=$perhitungan['utilitas_C7'];?></td>
                                        <td><?=$perhitungan['utilitas_C8'];?></td>
                                        <td><?=$perhitungan['utilitas_C9'];?></td>
                                    </tr>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex">
                            <h6 class="m-0 font-weight-bold text-primary">Nilai Preferensi</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered nowrap" id="tableAlternatifPreferensi" style="width:100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alternatif</th>
                                        <th>Gambar</th>
                                        <th>No KK</th>
                                        <th>Periode</th>
                                        <th>Preferensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataHasilPreferensi as $key => $preferensi):?>
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
                                        <td><?=$preferensi['nama_periode'];?></td>
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