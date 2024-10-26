<?php 
    // session_start();
    require_once '../config.php';
    class Hasil{

        private $db;

        public function __construct()
        {
            $this->db = connectDatabase();
        }

        public function getDataPreferensi($c1=0,$c2=0,$c3=0,$c4=0,$c5=0,$c6=0,$c7=0,$c8=0,$c9=0, $id_periode=0)
        {
            return $this->db->query("SELECT a.nama_alternatif, a.id_alternatif, a.gambar, a.no_kk, per.nama_periode,
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

            ((($c1/($c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9)) * (MAX(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END)
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
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria)))) AS preferensi
            
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria
            JOIN periode per ON per.id_periode = kak.f_id_periode
            LEFT JOIN hasil_akhir ha ON a.id_alternatif = ha.f_id_alternatif
            WHERE kak.f_id_periode = '$id_periode' AND ha.f_id_alternatif IS NULL
            GROUP BY a.nama_alternatif ORDER BY preferensi DESC;");
        } 

        
        public function getPreferensiPerhitungan($c1=0,$c2=0,$c3=0,$c4=0,$c5=0,$c6=0,$c7=0,$c8=0,$c9=0, $id_periode=0)
        {
            return $this->db->query("SELECT a.nama_alternatif, a.id_alternatif, a.gambar, a.no_kk, per.nama_periode,
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

            ((($c1/($c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9)) * (MAX(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END) - (SELECT MIN(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END)
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
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria)))) AS preferensi
            
            FROM alternatif a
            JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
            JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria
            JOIN periode per ON per.id_periode = kak.f_id_periode
            WHERE kak.f_id_periode = '$id_periode'
            GROUP BY a.nama_alternatif ORDER BY preferensi DESC;");
        } 

        public function getDataPreferensiLimOne($c1=0,$c2=0,$c3=0,$c4=0,$c5=0,$c6=0,$c7=0,$c8=0,$c9=0,$id_periode=0)
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
            JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria
            WHERE kak.f_id_periode = '$id_periode'
            GROUP BY a.nama_alternatif ORDER BY preferensi DESC LIMIT 1;")->fetch_assoc();
        } 

        public function simpanRiwayat($id_alternatif_terting,$c1=0,$c2=0,$c3=0,$c4=0,$c5=0,$c6=0,$c7=0,$c8=0,$c9=0){
            $this->db->query("INSERT INTO riwayat (id_riwayat,id_alternatif_terting,c1,c2,c3,c4) VALUES (0,$id_alternatif_terting,$c1,$c2,$c3,$c4)");
        }

        public function simpanHasil($data=[]) {
                
            if (empty($data)) {
                return $_SESSION['error'] = "Tidak ada data yang dikirim!";
            } else {
                foreach ($data as $key => $value) {
                    $f_id_alternatif = $value['f_id_alternatif'];
                    $preferensi_akhir = $value['preferensi_akhir'];
                    $f_id_periode = $value['f_id_periode'];
                   
                    // Periksa keberadaan data sebelum penyimpanan
                    $checkQuery = $this->db->query("SELECT * FROM hasil_akhir WHERE f_id_alternatif = $f_id_alternatif AND f_id_periode = $f_id_periode");
                    if ($checkQuery->num_rows > 0) {
                        return $_SESSION['error'] = "Data sudah disimpan sebelumnya!";
                    } else {
                        // Simpan data jika belum ada
                        $insert = $this->db->query("INSERT INTO hasil_akhir (f_id_alternatif, preferensi_akhir, f_id_periode ) VALUES ($f_id_alternatif, $preferensi_akhir, $f_id_periode)");
                        
                    }
                }
                
                if($this->db->affected_rows > 0 && $insert){
                    return $_SESSION['success'] = "Data berhasil disimpan!";
                }else{
                    return $_SESSION['success'] = "Data gagal disimpan!";
                }
            }
        }    

        public function getHasilAkhir()
        {
            $data = $this->db->query(
                    "SELECT * FROM hasil_akhir ha 
                    JOIN alternatif a ON a.id_alternatif=ha.f_id_alternatif
                    JOIN periode p ON p.id_periode=ha.f_id_periode");

            return $data;
        }

        public function getHasilAkhirById($id_periode)
        {
            $data = $this->db->query(
                    "SELECT * FROM hasil_akhir ha 
                    JOIN alternatif a ON a.id_alternatif=ha.f_id_alternatif
                    JOIN periode p ON p.id_periode=ha.f_id_periode
                    WHERE p.id_periode='$id_periode'");

            return $data;
        }

        public function getHasilAkhirByPeriode($id_periode=null)
        {
            $data = $this->db->query(
                    "SELECT * FROM hasil_akhir ha 
                    JOIN alternatif a ON a.id_alternatif=ha.f_id_alternatif
                    JOIN periode p ON p.id_periode=ha.f_id_periode
                    WHERE ha.f_id_periode='$id_periode'");

            return $data;
        }

        public function getHasilAkhirByNamaPeriode($nama_periode=null)
        {
            $data = $this->db->query(
                    "SELECT * FROM hasil_akhir ha 
                    JOIN alternatif a ON a.id_alternatif=ha.f_id_alternatif
                    JOIN periode p ON p.id_periode=ha.f_id_periode
                    WHERE p.nama_periode='$nama_periode'");

            return $data;
        }

        public function perhitungan($id_periode)
        {
            return $this->db->query(
                "SELECT a.nama_alternatif, a.id_alternatif,
                    MAX(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END) AS C1,
                    MAX(CASE WHEN k.id_kriteria = 'C2' THEN sk.bobot_sub_kriteria END) AS C2,
                    MAX(CASE WHEN k.id_kriteria = 'C3' THEN sk.bobot_sub_kriteria END) AS C3,
                    MAX(CASE WHEN k.id_kriteria = 'C4' THEN sk.bobot_sub_kriteria END) AS C4,
                    MAX(CASE WHEN k.id_kriteria = 'C5' THEN sk.bobot_sub_kriteria END) AS C5,
                    MAX(CASE WHEN k.id_kriteria = 'C6' THEN sk.bobot_sub_kriteria END) AS C6,
                    MAX(CASE WHEN k.id_kriteria = 'C7' THEN sk.bobot_sub_kriteria END) AS C7,
                    MAX(CASE WHEN k.id_kriteria = 'C8' THEN sk.bobot_sub_kriteria END) AS C8,
                    MAX(CASE WHEN k.id_kriteria = 'C9' THEN sk.bobot_sub_kriteria END) AS C9,
                    MAX(CASE WHEN k.id_kriteria = 'C1' THEN sk.nama_sub_kriteria END) AS nama_C1,
                    MAX(CASE WHEN k.id_kriteria = 'C2' THEN sk.nama_sub_kriteria END) AS nama_C2,
                    MAX(CASE WHEN k.id_kriteria = 'C3' THEN sk.bobot_sub_kriteria END) AS nama_C3,
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
                    JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria)) AS utilitas_C9

                    FROM alternatif a
                    JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
                    JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
                    JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria
                    WHERE kak.f_id_periode = '$id_periode'
                    GROUP BY a.nama_alternatif
                    UNION ALL
                    SELECT 'min', NULL,
                    MIN(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END) AS C1,
                    MIN(CASE WHEN k.id_kriteria = 'C2' THEN sk.bobot_sub_kriteria END) AS C2,
                    MIN(CASE WHEN k.id_kriteria = 'C3' THEN sk.bobot_sub_kriteria END) AS C3,
                    MIN(CASE WHEN k.id_kriteria = 'C4' THEN sk.bobot_sub_kriteria END) AS C4,
                    MIN(CASE WHEN k.id_kriteria = 'C5' THEN sk.bobot_sub_kriteria END) AS C5,
                    MIN(CASE WHEN k.id_kriteria = 'C6' THEN sk.bobot_sub_kriteria END) AS C6,
                    MIN(CASE WHEN k.id_kriteria = 'C7' THEN sk.bobot_sub_kriteria END) AS C7,
                    MIN(CASE WHEN k.id_kriteria = 'C8' THEN sk.bobot_sub_kriteria END) AS C8,
                    MIN(CASE WHEN k.id_kriteria = 'C9' THEN sk.bobot_sub_kriteria END) AS C9,
                    NULL AS nama_C1,
                    NULL AS nama_C2,
                    NULL AS nama_C3,
                    NULL AS nama_C4,
                    NULL AS nama_C5,
                    NULL AS nama_C6,
                    NULL AS nama_C7,
                    NULL AS nama_C8,
                    NULL AS nama_C9,
                    NULL AS utilitas1,
                    NULL AS utilitas2,
                    NULL AS utilitas3,
                    NULL AS utilitas4,
                    NULL AS utilitas5,
                    NULL AS utilitas6,
                    NULL AS utilitas7,
                    NULL AS utilitas8,
                    NULL AS utilitas9

                    FROM alternatif a
                    JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
                    JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
                    JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria
                    WHERE kak.f_id_periode = '$id_periode'

                    UNION ALL
                    SELECT 'max', NULL,
                    MAX(CASE WHEN k.id_kriteria = 'C1' THEN sk.bobot_sub_kriteria END) AS C1,
                    MAX(CASE WHEN k.id_kriteria = 'C2' THEN sk.bobot_sub_kriteria END) AS C2,
                    MAX(CASE WHEN k.id_kriteria = 'C3' THEN sk.bobot_sub_kriteria END) AS C3,
                    MAX(CASE WHEN k.id_kriteria = 'C4' THEN sk.bobot_sub_kriteria END) AS C4,
                    MAX(CASE WHEN k.id_kriteria = 'C5' THEN sk.bobot_sub_kriteria END) AS C5,
                    MAX(CASE WHEN k.id_kriteria = 'C6' THEN sk.bobot_sub_kriteria END) AS C6,
                    MAX(CASE WHEN k.id_kriteria = 'C7' THEN sk.bobot_sub_kriteria END) AS C7,
                    MAX(CASE WHEN k.id_kriteria = 'C8' THEN sk.bobot_sub_kriteria END) AS C8,
                    MAX(CASE WHEN k.id_kriteria = 'C9' THEN sk.bobot_sub_kriteria END) AS C9,
                    NULL AS nama_C1,
                    NULL AS nama_C2,
                    NULL AS nama_C3,
                    NULL AS nama_C4,
                    NULL AS nama_C5,
                    NULL AS nama_C6,
                    NULL AS nama_C7,
                    NULL AS nama_C8,
                    NULL AS nama_C9,
                    NULL AS utilitas_1,
                    NULL AS utilitas_2,
                    NULL AS utilitas_3,
                    NULL AS utilitas_4,
                    NULL AS utilitas_5,
                    NULL AS utilitas6,
                    NULL AS utilitas7,
                    NULL AS utilitas8,
                    NULL AS utilitas9

                    FROM alternatif a
                    JOIN kec_alt_kriteria kak ON a.id_alternatif = kak.f_id_alternatif
                    JOIN sub_kriteria sk ON kak.f_id_sub_kriteria = sk.id_sub_kriteria
                    JOIN kriteria k ON kak.f_id_kriteria = k.id_kriteria
                    WHERE kak.f_id_periode = '$id_periode';"
            );
        }
        
    }

    $getDataHasil = new Hasil();
?>