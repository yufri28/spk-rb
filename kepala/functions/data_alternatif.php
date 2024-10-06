<?php 

    require_once '../config.php';
    class Alternatif{
        private $db;
        public function __construct()
        {
            $this->db = connectDatabase();
        }

        public function getAlternatif(){
            // return $this->db->query("SELECT a.nama_alternatif, a.id_alternatif, a.gambar, a.no_kk, kak.id_alt_kriteria,
            //     MAX(CASE WHEN k.id_kriteria = 'C1' THEN kak.id_alt_kriteria END) AS id_alt_C1,
            //     MIN(CASE WHEN k.id_kriteria = 'C2' THEN kak.id_alt_kriteria END) AS id_alt_C2,
            //     MIN(CASE WHEN k.id_kriteria = 'C3' THEN kak.id_alt_kriteria END) AS id_alt_C3,
            //     MAX(CASE WHEN k.id_kriteria = 'C4' THEN kak.id_alt_kriteria END) AS id_alt_C4,
            //     MAX(CASE WHEN k.id_kriteria = 'C5' THEN kak.id_alt_kriteria END) AS id_alt_C5,
            //     MAX(CASE WHEN k.id_kriteria = 'C6' THEN kak.id_alt_kriteria END) AS id_alt_C6,
            //     MAX(CASE WHEN k.id_kriteria = 'C7' THEN kak.id_alt_kriteria END) AS id_alt_C7,
            //     MAX(CASE WHEN k.id_kriteria = 'C8' THEN kak.id_alt_kriteria END) AS id_alt_C8,
            //     MAX(CASE WHEN k.id_kriteria = 'C9' THEN kak.id_alt_kriteria END) AS id_alt_C9,
            //     MAX(CASE WHEN k.id_kriteria = 'C1' THEN kak.f_id_sub_kriteria END) AS id_sub_C1,
            //     MIN(CASE WHEN k.id_kriteria = 'C2' THEN kak.f_id_sub_kriteria END) AS id_sub_C2,
            //     MIN(CASE WHEN k.id_kriteria = 'C3' THEN kak.f_id_sub_kriteria END) AS id_sub_C3,
            //     MAX(CASE WHEN k.id_kriteria = 'C4' THEN kak.f_id_sub_kriteria END) AS id_sub_C4,
            //     MAX(CASE WHEN k.id_kriteria = 'C5' THEN kak.f_id_sub_kriteria END) AS id_sub_C5,
            //     MAX(CASE WHEN k.id_kriteria = 'C6' THEN kak.f_id_sub_kriteria END) AS id_sub_C6,
            //     MAX(CASE WHEN k.id_kriteria = 'C7' THEN kak.f_id_sub_kriteria END) AS id_sub_C7,
            //     MAX(CASE WHEN k.id_kriteria = 'C8' THEN kak.f_id_sub_kriteria END) AS id_sub_C8,
            //     MAX(CASE WHEN k.id_kriteria = 'C9' THEN kak.f_id_sub_kriteria END) AS id_sub_C9,
            //     MAX(CASE WHEN k.id_kriteria = 'C1' THEN sk.nama_sub_kriteria END) AS nama_C1,
            //     MIN(CASE WHEN k.id_kriteria = 'C2' THEN sk.nama_sub_kriteria END) AS nama_C2,
            //     MIN(CASE WHEN k.id_kriteria = 'C3' THEN sk.nama_sub_kriteria END) AS nama_C3,
            //     MAX(CASE WHEN k.id_kriteria = 'C4' THEN sk.nama_sub_kriteria END) AS nama_C4,
            //     MAX(CASE WHEN k.id_kriteria = 'C5' THEN sk.nama_sub_kriteria END) AS nama_C5,
            //     MAX(CASE WHEN k.id_kriteria = 'C6' THEN sk.nama_sub_kriteria END) AS nama_C6,
            //     MAX(CASE WHEN k.id_kriteria = 'C7' THEN sk.nama_sub_kriteria END) AS nama_C7,
            //     MAX(CASE WHEN k.id_kriteria = 'C8' THEN sk.nama_sub_kriteria END) AS nama_C8,
            //     MAX(CASE WHEN k.id_kriteria = 'C9' THEN sk.nama_sub_kriteria END) AS nama_C9
            //     FROM alternatif a
            //     JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            //     JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            //     JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria
            //     GROUP BY a.nama_alternatif ORDER BY a.id_alternatif DESC;
            // ");
            return $this->db->query("SELECT a.nama_alternatif, a.id_alternatif, a.gambar, a.no_kk, kak.id_alt_kriteria,
                MAX(CASE WHEN k.id_kriteria = 'C1' THEN kak.id_alt_kriteria END) AS id_alt_C1,
                MIN(CASE WHEN k.id_kriteria = 'C2' THEN kak.id_alt_kriteria END) AS id_alt_C2,
                MIN(CASE WHEN k.id_kriteria = 'C3' THEN kak.id_alt_kriteria END) AS id_alt_C3,
                MAX(CASE WHEN k.id_kriteria = 'C4' THEN kak.id_alt_kriteria END) AS id_alt_C4,
                MAX(CASE WHEN k.id_kriteria = 'C5' THEN kak.id_alt_kriteria END) AS id_alt_C5,
                MAX(CASE WHEN k.id_kriteria = 'C6' THEN kak.id_alt_kriteria END) AS id_alt_C6,
                MAX(CASE WHEN k.id_kriteria = 'C7' THEN kak.id_alt_kriteria END) AS id_alt_C7,
                MAX(CASE WHEN k.id_kriteria = 'C8' THEN kak.id_alt_kriteria END) AS id_alt_C8,
                MAX(CASE WHEN k.id_kriteria = 'C9' THEN kak.id_alt_kriteria END) AS id_alt_C9,
                MAX(CASE WHEN k.id_kriteria = 'C1' THEN k.id_kriteria END) AS id_kriteria_C1,
                MIN(CASE WHEN k.id_kriteria = 'C2' THEN k.id_kriteria END) AS id_kriteria_C2,
                MIN(CASE WHEN k.id_kriteria = 'C3' THEN k.id_kriteria END) AS id_kriteria_C3,
                MAX(CASE WHEN k.id_kriteria = 'C4' THEN k.id_kriteria END) AS id_kriteria_C4,
                MAX(CASE WHEN k.id_kriteria = 'C5' THEN k.id_kriteria END) AS id_kriteria_C5,
                MAX(CASE WHEN k.id_kriteria = 'C6' THEN k.id_kriteria END) AS id_kriteria_C6,
                MAX(CASE WHEN k.id_kriteria = 'C7' THEN k.id_kriteria END) AS id_kriteria_C7,
                MAX(CASE WHEN k.id_kriteria = 'C8' THEN k.id_kriteria END) AS id_kriteria_C8,
                MAX(CASE WHEN k.id_kriteria = 'C9' THEN k.id_kriteria END) AS id_kriteria_C9,
                MAX(CASE WHEN k.id_kriteria = 'C1' THEN kak.f_id_sub_kriteria END) AS id_sub_C1,
                MIN(CASE WHEN k.id_kriteria = 'C2' THEN kak.f_id_sub_kriteria END) AS id_sub_C2,
                MIN(CASE WHEN k.id_kriteria = 'C3' THEN kak.f_id_sub_kriteria END) AS id_sub_C3,
                MAX(CASE WHEN k.id_kriteria = 'C4' THEN kak.f_id_sub_kriteria END) AS id_sub_C4,
                MAX(CASE WHEN k.id_kriteria = 'C5' THEN kak.f_id_sub_kriteria END) AS id_sub_C5,
                MAX(CASE WHEN k.id_kriteria = 'C6' THEN kak.f_id_sub_kriteria END) AS id_sub_C6,
                MAX(CASE WHEN k.id_kriteria = 'C7' THEN kak.f_id_sub_kriteria END) AS id_sub_C7,
                MAX(CASE WHEN k.id_kriteria = 'C8' THEN kak.f_id_sub_kriteria END) AS id_sub_C8,
                MAX(CASE WHEN k.id_kriteria = 'C9' THEN kak.f_id_sub_kriteria END) AS id_sub_C9,
                MAX(CASE WHEN k.id_kriteria = 'C1' THEN sk.nama_sub_kriteria END) AS nama_C1,
                MIN(CASE WHEN k.id_kriteria = 'C2' THEN sk.nama_sub_kriteria END) AS nama_C2,
                MIN(CASE WHEN k.id_kriteria = 'C3' THEN sk.nama_sub_kriteria END) AS nama_C3,
                MAX(CASE WHEN k.id_kriteria = 'C4' THEN sk.nama_sub_kriteria END) AS nama_C4,
                MAX(CASE WHEN k.id_kriteria = 'C5' THEN sk.nama_sub_kriteria END) AS nama_C5,
                MAX(CASE WHEN k.id_kriteria = 'C6' THEN sk.nama_sub_kriteria END) AS nama_C6,
                MAX(CASE WHEN k.id_kriteria = 'C7' THEN sk.nama_sub_kriteria END) AS nama_C7,
                MAX(CASE WHEN k.id_kriteria = 'C8' THEN sk.nama_sub_kriteria END) AS nama_C8,
                MAX(CASE WHEN k.id_kriteria = 'C9' THEN sk.nama_sub_kriteria END) AS nama_C9
                FROM alternatif a
                JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
                JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
                JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria
                LEFT JOIN hasil_akhir ha ON a.id_alternatif = ha.f_id_alternatif
                WHERE ha.f_id_alternatif IS NULL
                GROUP BY a.nama_alternatif ORDER BY a.id_alternatif DESC;
            ");

        }

        public function getSubC1()
        {
           return $this->db->query(
                "SELECT * FROM sub_kriteria WHERE f_id_kriteria = 'C1'"
           );
        }
        public function getSubC2()
        {
           return $this->db->query(
                "SELECT * FROM sub_kriteria WHERE f_id_kriteria = 'C2'"
           );
        }
        public function getSubC3()
        {
           return $this->db->query(
                "SELECT * FROM sub_kriteria WHERE f_id_kriteria = 'C3'"
           );
        }

        public function getSubC4()
        {
           return $this->db->query(
                "SELECT * FROM sub_kriteria WHERE f_id_kriteria = 'C4'"
           );
        }

        public function getSubC5()
        {
           return $this->db->query(
                "SELECT * FROM sub_kriteria WHERE f_id_kriteria = 'C5'"
           );
        } 
        public function getSubC6()
        {
           return $this->db->query(
                "SELECT * FROM sub_kriteria WHERE f_id_kriteria = 'C6'"
           );
        } 
        public function getSubC7()
        {
           return $this->db->query(
                "SELECT * FROM sub_kriteria WHERE f_id_kriteria = 'C7'"
           );
        } 
        public function getSubC8()
        {
           return $this->db->query(
                "SELECT * FROM sub_kriteria WHERE f_id_kriteria = 'C8'"
           );
        } 
        public function getSubC9()
        {
           return $this->db->query(
                "SELECT * FROM sub_kriteria WHERE f_id_kriteria = 'C9'"
           );
        } 

        public function usulkanData($f_id_alternatif, $f_id_kriteria, $f_id_sub_kriteria, $id_periode)
        {
            $insertKecAltKrit = $this->db->query("INSERT INTO kec_alt_kriteria (id_alt_kriteria, f_id_alternatif, f_id_kriteria, f_id_sub_kriteria, f_id_periode) VALUES (NULL, '$f_id_alternatif', '$f_id_kriteria', '$f_id_sub_kriteria', '$id_periode')");    
            return $insertKecAltKrit;
        }

        // CRUD
        public function addDataAlternatif($dataAlternatif = [], $dataKecAltKrit = [])
        {
            if (empty($dataAlternatif) && empty($dataKecAltKrit)) {
                return $_SESSION['error'] = 'Tidak ada data yang dikirim!';
            }

            $nama_alternatif = $dataAlternatif['nama_alternatif'];
            $gambar = $dataAlternatif['gambar'];
            $no_kk = $dataAlternatif['no_kk'];

            $cekData = $this->db->query("SELECT * FROM `alternatif` WHERE LOWER(nama_alternatif) = '" . strtolower($dataAlternatif['nama_alternatif']) . "' OR LOWER(no_kk) = '" . strtolower($no_kk) . "'");
            if ($cekData->num_rows > 0) {
                return $_SESSION['error'] = 'Data sudah ada!';
            }

            $insertAlternatif = $this->db->query(
                "INSERT INTO alternatif (id_alternatif, nama_alternatif, gambar, no_kk) VALUES (NULL, '$nama_alternatif', '$gambar', '$no_kk')"
            );

            if ($insertAlternatif) {
                $id_alternatif = $this->db->insert_id;
    
                $getPeriode = $this->db->query("SELECT * FROM periode WHERE status='aktif' LIMIT 1");
                $fetchPeriode = mysqli_fetch_assoc($getPeriode);
              
                foreach ($dataKecAltKrit as $key => $id_sub_kriteria) {
                    $insertKecAltKrit = $this->db->query("INSERT INTO kec_alt_kriteria (id_alt_kriteria, f_id_alternatif, f_id_kriteria, f_id_sub_kriteria, f_id_periode) VALUES (NULL, '$id_alternatif', '$key', '$id_sub_kriteria',-1)");
                }
                if ($insertKecAltKrit && $this->db->affected_rows > 0) {
                    return $_SESSION['success'] = 'Data berhasil disimpan!';
                } else {
                    $this->db->query("DELETE FROM alternatif WHERE id_alternatif='$id_alternatif'");
                    return $_SESSION['error'] = 'Data gagal disimpan!';
                }
            } else {
                return $_SESSION['error'] = 'Data gagal disimpan!';
            }
        }

        public function editDataAlternatif($dataAlternatif = [], $dataKecAltKrit = [])
        {
            if (empty($dataAlternatif) && empty($dataKecAltKrit)) {
                return $_SESSION['error'] = 'Tidak ada data yang dikirim!';
            }
            $id_alternatif = $dataAlternatif['id_alternatif'];
            $nama_alternatif = $dataAlternatif['nama_alternatif'];
            $gambar = $dataAlternatif['gambar'];
            $no_kk = $dataAlternatif['no_kk'];
            
            $updateAlternatif = $this->db->query(
                "UPDATE alternatif SET nama_alternatif = '$nama_alternatif',gambar='$gambar',no_kk='$no_kk' WHERE id_alternatif = $id_alternatif"
            );

            if ($updateAlternatif) {
                // Update data kec_alt_kriteria
                foreach ($dataKecAltKrit as $key => $id_sub_kriteria) {
                    $updateKecAltKrit = $this->db->query("UPDATE kec_alt_kriteria SET f_id_sub_kriteria = '$id_sub_kriteria' WHERE f_id_alternatif = '$id_alternatif' AND f_id_kriteria = '$key'");
                }
                if ($updateKecAltKrit || $this->db->affected_rows > 0) {
                    return $_SESSION['success'] = 'Data berhasil diupdate!';
                } 
                else {
                    return $_SESSION['error'] = 'Data gagal diupdate!';
                }
            } else {
                return $_SESSION['error'] = 'Data gagal diupdate!';
            }
        }

        public function hapusDataAlternatif($id_alternatif)
        {
            $stmtDelete = $this->db->prepare("DELETE FROM alternatif WHERE id_alternatif=?");
            $stmtDelete->bind_param("i", $id_alternatif);
            $stmtDelete->execute();

            if ($stmtDelete->affected_rows > 0) {
                $_SESSION['success'] = 'Data berhasil dihapus!';
            } else {
                $_SESSION['error'] = 'Terjadi kesalahan dalam menghapus data.';
            }
            $stmtDelete->close();
        }

        public function getRiwayat()
        {
            return $this->db->query("SELECT * FROM riwayat ORDER BY id_riwayat DESC");
        }
        
        public function hapusRiwayat($id=0)
        {
            $stmtDelete = $this->db->prepare("DELETE FROM riwayat WHERE id_riwayat=?");
            $stmtDelete->bind_param("i", $id);
            $stmtDelete->execute();
            if ($stmtDelete->affected_rows > 0) {
                $_SESSION['success'] = 'Data berhasil dihapus!';
            } else {
                $_SESSION['error'] = 'Terjadi kesalahan dalam menghapus data.';
            }
            $stmtDelete->close();
        }

        // End CRUD 
        public function getDataRiwayat($id_alternatif,$c1=0,$c2=0,$c3=0,$c4=0,$c5=0,$c6=0,$c7=0,$c8=0,$c9=0)
        {
            return $this->db->query("SELECT a.nama_alternatif, a.id_alternatif, a.gambar, a.no_kk,
            MAX(CASE WHEN k.id_kriteria = 'C1' THEN sk.nama_sub_kriteria END) AS nama_C1,
            MAX(CASE WHEN k.id_kriteria = 'C2' THEN sk.nama_sub_kriteria END) AS nama_C2,
            MAX(CASE WHEN k.id_kriteria = 'C3' THEN sk.nama_sub_kriteria END) AS nama_C3,
            MAX(CASE WHEN k.id_kriteria = 'C4' THEN sk.nama_sub_kriteria END) AS nama_C4,        
            MAX(CASE WHEN k.id_kriteria = 'C5' THEN sk.nama_sub_kriteria END) AS nama_C5,        
            MAX(CASE WHEN k.id_kriteria = 'C6' THEN sk.nama_sub_kriteria END) AS nama_C6,        
            MAX(CASE WHEN k.id_kriteria = 'C7' THEN sk.nama_sub_kriteria END) AS nama_C7,        
            MAX(CASE WHEN k.id_kriteria = 'C8' THEN sk.nama_sub_kriteria END) AS nama_C8,        
            MAX(CASE WHEN k.id_kriteria = 'C9' THEN sk.nama_sub_kriteria END) AS nama_C9,        
            
            (MAX(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria)) AS utilitas_C1,
            
            (MAX(CASE WHEN k.id_kriteria = 'C2' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C2' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C2' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C2' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria)) AS utilitas_C2,
            
            (MAX(CASE WHEN k.id_kriteria = 'C3' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C3' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C3' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C3' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria)) AS utilitas_C3,
            
            (MAX(CASE WHEN k.id_kriteria = 'C4' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C4' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C4' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C4' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria)) AS utilitas_C4, 

            (MAX(CASE WHEN k.id_kriteria = 'C5' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C5' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C5' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C5' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria)) AS utilitas_C5,
            
            (MAX(CASE WHEN k.id_kriteria = 'C6' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C6' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C6' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C6' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria)) AS utilitas_C6,
            
            (MAX(CASE WHEN k.id_kriteria = 'C7' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C7' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C7' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C7' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria)) AS utilitas_C7,

            (MAX(CASE WHEN k.id_kriteria = 'C8' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C8' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C8' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C8' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria)) AS utilitas_C8,   
            
            (MAX(CASE WHEN k.id_kriteria = 'C9' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C9' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C9' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C9' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria)) AS utilitas_C9,   

            (($c1/($c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9)) * (MAX(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))) + 
            (($c2/($c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9)) * (MAX(CASE WHEN k.id_kriteria = 'C2' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C2' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C2' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C2' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))) +
            (($c3/($c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9)) * (MAX(CASE WHEN k.id_kriteria = 'C3' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C3' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C3' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C3' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))) +
            (($c4/($c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9)) * (MAX(CASE WHEN k.id_kriteria = 'C4' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C4' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C4' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C4' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))) +
            (($c5/($c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9)) * (MAX(CASE WHEN k.id_kriteria = 'C5' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C5' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C5' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C5' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))) 
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))) +
            (($c6/($c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9)) * (MAX(CASE WHEN k.id_kriteria = 'C6' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C6' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C6' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C6' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))) 
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))) +
            (($c7/($c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9)) * (MAX(CASE WHEN k.id_kriteria = 'C7' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C7' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C7' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C7' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))) 
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))) +
            (($c8/($c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9)) * (MAX(CASE WHEN k.id_kriteria = 'C8' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C8' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C8' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C8' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))) 
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))) +
            (($c9/($c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9)) * (MAX(CASE WHEN k.id_kriteria = 'C9' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C9' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))/((SELECT MAX(CASE WHEN k.id_kriteria = 'C9' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C9' THEN sk.bobot_sub_kriteria END)
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria))) AS preferensi
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria WHERE a.id_alternatif = $id_alternatif
            GROUP BY a.nama_alternatif ORDER BY preferensi DESC LIMIT 1;");
        } 

        public function getUsulNumRows($id)
        {
            return $this->db->query("SELECT * FROM `kec_alt_kriteria` WHERE kec_alt_kriteria.f_id_periode='$id';");
        }
    }

    $Alternatif = new Alternatif();

?>