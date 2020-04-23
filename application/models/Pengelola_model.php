<?php
    class Pengelola_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_Dokter($id_dokter = NULL){
            if($id_dokter != NULL){
                $query = $this->db->get_where('dokter',array('id_dokter' => $id_dokter));

                return $query->row_array();
            }

            $query = $this->db->get('dokter');

            return $query->result_array();
        }

        public function updateDK(){
            $data = array(
                'id_dokter' => $this->input->post('id_dokter'),
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'no_telp' => $this->input->post('no_telp')
            );

            $this->db->where('id_dokter',$this->input->post('id_dokter'));
            return $this->db->update('dokter',$data);
        }
    }
?>