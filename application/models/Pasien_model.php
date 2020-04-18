<?php
    class Pasien_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_riwayat(){
            $this->db->from('pasien');
            $this->db->from('riwayat','pasien.id_pasien = riwayat.id_pasien');

            $query = $this->db->get();

            return $query->result_array();
        }
    }
?>