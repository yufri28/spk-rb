<?php 

    require_once '../config.php';
    
    class Kriteria{
        private $db;
        public function __construct()
        {
            $this->db = connectDatabase();
        }

        public function getKriteria(){
            return $this->db->query("SELECT * FROM `kriteria`");
        }
        public function tambahKriteria($dataKriteria)
        {
            $cek = $this->db->query("SELECT * FROM kriteria WHERE id_kriteria='".$dataKriteria['id_kriteria']."'");
            if (mysqli_num_rows($cek) > 0) {
                return $_SESSION['error'] = 'Kode Kriteria sudah ada!';
            } else{
                $stmtInsert = $this->db->prepare("INSERT INTO kriteria(id_kriteria,nama_kriteria,bobot_kriteria) VALUES (?,?,?)");
                $stmtInsert->bind_param("ssi",$dataKriteria['id_kriteria'],$dataKriteria['nama_kriteria'],$dataKriteria['bobot_kriteria']);
                $stmtInsert->execute();
                if ($stmtInsert->affected_rows > 0) {
                    return $_SESSION['success'] = 'Data berhasil ditambahkan!';
                } else{
                    return $_SESSION['error'] = 'Terjadi kesalahan dalam menyimpan data.';
                }
            }
            
            $stmtInsert->close();
        }
        public function editKriteria($dataKiteria)
        {
            $stmtUpdate = $this->db->prepare("UPDATE kriteria SET nama_kriteria=?, bobot_kriteria=? WHERE id_kriteria=?");
            $stmtUpdate->bind_param("sis", $dataKiteria['nama_kriteria'],$dataKiteria['bobot_kriteria'],$dataKiteria['id_kriteria']);
            $stmtUpdate->execute();
            if ($stmtUpdate) {
                return $_SESSION['success'] = 'Data berhasil diedit!';
            } else {
                return $_SESSION['error'] = 'Terjadi kesalahan dalam mengedit data.';
            }
            $stmtUpdate->close();
        }
        public function hapusKriteria($idKriteria)
        {
            $stmtDelete = $this->db->prepare("DELETE FROM kriteria WHERE id_kriteria=?");
            $stmtDelete->bind_param("s",$idKriteria);
            $stmtDelete->execute();
            if ($stmtDelete->affected_rows > 0) {
                return $_SESSION['success'] = 'Data berhasil dihapus!';
            } else{
                return $_SESSION['error'] = 'Terjadi kesalahan dalam menghapus data.';
            }
            $stmtDelete->close();
            
        }
    }

    $Kriteria = new Kriteria();

?>