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

        public function tambahDK(){
            $data = array(
                'id_dokter' => $this->input->post('id_dokter'),
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT),
                'no_telp' => $this->input->post('no_telp')
            );

            return $this->db->insert('dokter',$data);
        }

        public function hapusDK($id_dokter){
            return $this->db->delete('dokter',array('id_dokter' => $id_dokter));
        }

        public function searchDK($key){
            if($key == ""){
                return FALSE;
            }else{
                $where = "id_dokter LIKE '%".$key."%' OR nama LIKE '%".$key."%' OR username LIKE '%".$key."%' OR no_telp 
                LIKE '%".$key."%'";
                $this->db->from('dokter');
                $this->db->where($where);
                $query = $this->db->get();

                return $query->result_array();
            }
        }

    }
?>