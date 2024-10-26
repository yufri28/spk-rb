<?php 
session_start();
unset($_SESSION['menu']);
$_SESSION['menu'] = 'hasil-akhir';
require_once './header.php';
require_once './functions/hasil.php';
require_once './functions/periode.php';

$selectBobot = $koneksi->query("SELECT * FROM kriteria");
$periodeAktif = getPeriodeAktif();
$dataPeriode =  $Periode->getPeriode();
$dataHasilAkhir = $getDataHasil->getHasilAkhir();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <form action="../eksport/cetak_hasil.php" target="_blank" method="post">
                        <div class="card-header py-3">
                            <div class="d-lg-flex">
                                <h6 class="m-0 font-weight-bold text-primary">Hasil Akhir</h6>
                                <div class="d-flex col-lg-3 ml-lg-auto mr-lg-2 mb-3 mb-lg-0">
                                    <label for="filter-periode-hasil"
                                        class="d-flex mr-2 align-items-center text-nowrap">
                                        Periode
                                        :
                                    </label>
                                    <select id="filter-periode-hasil" name="filter-periode-hasil" class="form-control">
                                        <option value="">Choose...</option>
                                        <?php foreach ($dataPeriode as $key => $periode):?>
                                        <option value="<?=$periode['nama_periode'];?>"><?=$periode['nama_periode'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="">
                                    <input type="hidden" name="from" value="kepala">
                                    <button type="submit" name="cetak-with-img" class="btn btn-primary">
                                        <i class="fa fa-print"></i> PDF With IMG
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataHasil" class="table table-bordered nowrap" style="width:100%"
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
                                    <?php foreach ($dataHasilAkhir as $key => $hasil):?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$hasil['nama_alternatif'];?></td>
                                        <td><a href="../images/<?=$hasil['gambar'];?>" data-lightbox="image-1"
                                                data-title="<?=$hasil['nama_alternatif'];?>">
                                                <img style="width: 50px; height: 50px;"
                                                    src="../images/<?=$hasil['gambar'];?>"
                                                    alt="Gambar <?=$hasil['nama_alternatif'];?>">
                                            </a></td>
                                        <td><?=$hasil['no_kk'];?></td>
                                        <td><?=$hasil['nama_periode'];?></td>
                                        <td><a
                                                href="./perhitungan.php?per=<?=$hasil['id_periode'];?>"><?=$hasil['preferensi_akhir']??0;?></a>
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
<?php require_once './footer.php';?>