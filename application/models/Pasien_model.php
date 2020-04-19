<?php
    class Pasien_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_riwayat(){
            $this->db->from('pasien');
            $this->db->join('riwayat','pasien.id_pasien = riwayat.id_pasien');
            $this->db->order_by('tanggal','DESC');

            $query = $this->db->get();

            return $query->result_array();
        }

        public function get_search($cari){
            $where = "nama LIKE '%".$cari."%' OR tanggal LIKE '%".$cari."%' OR kategori='%".$cari."%'";
            $this->db->from('pasien');
            $this->db->join('riwayat','pasien.id_pasien = riwayat.id_pasien');
            $this->db->where($where);
        
            $query = $this->db->get();
            
            return $query->result_array();
        }

        public function get_lapKesehatan($id_riwayat){
            $where = "id_riwayat ='".$id_riwayat."'";

            $this->db->select('pasien.nama AS nm_pasien, dokter.nama AS nm_dokter, pasien.tanggal, pasien.kategori,
            riwayat.hasil_Pemeriksaan,pasien.jam_praktek');
            $this->db->from('pasien');
            $this->db->join('riwayat','pasien.id_pasien = riwayat.id_pasien');
            $this->db->join('dokter','riwayat.id_dokter = dokter.id_dokter');
            $this->db->where($where);
            
            $query = $this->db->get();

            return $query->row_array();
        }

    }
?>