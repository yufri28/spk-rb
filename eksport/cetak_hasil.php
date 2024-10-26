<?php
session_start();

include '../admin/functions/hasil.php';
require_once '../config.php';

if(isset($_POST['filter-periode-hasil'])){
    $periode = htmlspecialchars($_POST['filter-periode-hasil']);

    if($periode != null){
        $dataHasilAkhir = $getDataHasil->getHasilAkhirByNamaPeriode($periode);
    }else{
        $dataHasilAkhir = $getDataHasil->getHasilAkhir($periode);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>DATA HASIL AKHIR</title>
    <style>
    .header {
        text-align: center;
        margin: 0 auto;
        width: 80%;
    }

    .header-content {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px 0;
    }

    .header-logo img {
        width: 100px;
        height: 100px;
    }

    .header-text {
        margin-left: 20px;
        text-align: left;
    }

    .header h2,
    .header h3 {
        margin: 0;
    }

    hr {
        border: 1px solid black;
        margin-top: 20px;
    }

    .titik-dua {
        text-align: center;
    }

    th {
        padding: 5px 0;
    }

    td {
        padding-left: 7px;
    }

    table {
        font-size: 5pt;
    }
    </style>
</head>

<body>
    <div class="header">
        <div class="header-content">
            <div class="header-text">
                <h2>DESA OEMATNUNU</h2>
            </div>
        </div>
        <hr>
        <?php
        $no = 1;
        if (mysqli_num_rows($dataHasilAkhir) < 1) {
            if($_POST['from'] == 'kepala'){
                echo "<script>alert('Tidak ada data yang dapat dicetak!');window.location.href='../kepala/hasil-akhir.php'</script>";
            }else{
                echo "<script>alert('Tidak ada data yang dapat dicetak!');window.location.href='../admin/hasil-akhir.php'</script>";
            }
        }
        echo "<h4><u>DATA HASIL PERANGKINGAN PENERIMA RUMAH BANTUAN</u></h4>";
        ?>
    </div>

    <table border="1" cellspacing="0" style="width: 100%; border-collapse: collapse; text-wrap:wrap;" align="center">
        <thead>
            <tr style="text-align: center;">
                <th style="padding: 15px;">No</th>
                <th style="padding: 15px;">Nama Alternatif</th>
                <th style="padding: 15px;">Gambar</th>
                <th style="padding: 15px;">No KK</th>
                <th style="padding: 15px;">Periode</th>
                <th style="padding: 15px;">Preferensi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = mysqli_fetch_array($dataHasilAkhir, MYSQLI_BOTH)) : ?>
            <tr>
                <td>
                    <?= $no++; ?>.
                </td>
                <td>
                    <?php echo $data['nama_alternatif']; ?>
                </td>
                <td>
                    <img style="width: 50px; height: 50px;" src="../images/<?=$data['gambar'];?>"
                        alt="Gambar <?=$data['nama_alternatif'];?>">
                </td>
                <td>
                    <?php echo $data['no_kk']; ?>
                </td>
                <td>
                    <?php echo $data['nama_periode']; ?>
                </td>
                <td>
                    <?php echo $data['preferensi_akhir']; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script>
    window.print();
    </script>

</body>

</html>