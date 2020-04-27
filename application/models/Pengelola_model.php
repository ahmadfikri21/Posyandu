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

        public function get_idDokter($nama){
            $this->db->select('id_dokter');
            $this->db->from('dokter');
            $this->db->where('nama = "'.$nama.'"');
            $this->db->limit(1);
            
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
                return $query->row()->id_dokter;
            }
    
            return false;
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

        public function generateidDk($data){
 
            foreach ($data as $key ) {
                $last = substr($key['id_dokter'],2);
            }
            $change = (int)$last;
            $change++;
            if ($change < 10){
                $last = "DK00$change";
            }else if($change < 100) {
                $last = "DK0$change";
            }else{
                $last = "DK$change";
            }
            
            return $last;
        }

        public function get_all_Dokter($id_dokter = NULL){
           

            $query = $this->db->get('dokter');

            return $query->result_array();
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
        public function login_pengelola($data) {
            //check if data (consist of username and password) exist/found in db, return true / false
            $this->db->where('username',$data['username']);
            $this->db->where('password',$data['password']);
            $query = $this->db->get('pengelola');
            if($query->num_rows() > 0){
                return true;
            }else{
                return false;
            }
        }
        
        public function get_Pasien($id_pasien = NULL){
            if($id_pasien != NULL){
                $query = $this->db->get_where('pasien',array('id_pasien' => $id_pasien));

                return $query->row_array();
            }

            $query = $this->db->get('pasien');

            return $query->result_array();
        }

        public function updatePS(){
            $data = array(
                'id_pasien' => $this->input->post('id_pasien'),
                'nama' => $this->input->post('nama'),
                'tanggal' => $this->input->post('tanggal'),
                'jam_praktek' => $this->input->post('jam_praktek'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'kategori' => $this->input->post('kategori')
            );
           
            $this->db->where('id_pasien',$this->input->post('id_pasien'));
            return $this->db->update('pasien',$data);
        }

        public function tambahPS(){
            $data = array(
                'nama' => $this->input->post('nama'),
                'tanggal' => $this->input->post('tanggal'),
                'jam_praktek' => $this->input->post('jam_praktek'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'kategori' => $this->input->post('kategori'),
                'pendaftar' => $this->input->post('pendaftar')
            );

            return $this->db->insert('pasien',$data);
        }

        public function tambahPsRiwayat($dokter,$id){
            $riwayat = array(
                "id_dokter" => $dokter,
                "id_pasien" => $id
            );
    
            return $this->db->insert('riwayat',$riwayat);
        }

        public function hapusPS($id_pasien){
            return $this->db->delete('pasien',array('id_pasien' => $id_pasien));
        }

        public function get_idPasien(){
            $query =$this->db->select('id_pasien')->order_by('id_pasien',"desc")->limit(1)->get('pasien')->row();
    
            $this->db->select('id_pasien');
            $this->db->from('pasien');
            $this->db->order_by('id_pasien','DESC');
            $this->db->limit(1);
    
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
                return $query->row()->id_pasien + 1;
            }
    
            return false;
        }

        public function searchPS($key){
            if($key == ""){
                return FALSE;
            }else{
                $where = "id_pasien LIKE '%".$key."%' OR nama LIKE '%".$key."%' OR tanggal LIKE '%".$key."%' OR jam_praktek 
                LIKE '%".$key."%' OR tgl_lahir LIKE '%".$key."%' OR kategori LIKE '%".$key."%'";
                $this->db->from('pasien');
                $this->db->where($where);
                $query = $this->db->get();  

                return $query->result_array();
            }
        }

        public function get_User(){
            $query = $this->db->get('user');

            return $query->result_array();
        }

        public function get_praktek(){
            $query = $this->db->get('jadwal_praktek');
            return $query->result_array();
        }
     
        public function getProfile($username){
            $this->db->where('username',$username);
            $query = $this->db->get('pengelola');
            if($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return false;
            }
        
        }   
        public function getInfo(){
        return $this->db->get('informasi')->result_array();
        }
   

        public function generateidJP($data){
 
            foreach ($data as $key ) {
                $last = $key['id_jadwal'];
            }
            $change = (int)$last;
            $change++;
            
            return $change;
        }

        
        public function tambahJP(){
            $data = array(
                'id_jadwal' => $this->input->post('id_praktek'),
                'jam_praktek' => $this->input->post('jam_praktek'),
            );

            return $this->db->insert('jadwal_praktek',$data);
        }

        public function hapusJP($id_pasien){
            return $this->db->delete('jadwal_praktek',array('id_jadwal' => $id_pasien));
        }

    
        public function updateJP(){
            $data = array(
                'id_jadwal' => $this->input->post('id_praktek'),
                'jam_praktek' => $this->input->post('jam_praktek'),
            );
           
            $this->db->where('id_jadwal',$this->input->post('id_praktek'));
            return $this->db->update('jadwal_praktek',$data);
        }

        public function search_jadwal_byid($id)
        {
            $this->db->where('id_jadwal',$id);
            $this->db->from('jadwal_praktek');
            $query = $this->db->get();
            return $query->result_array();
        }
        public function searchJP($key)
        {
            if($key == ""){
                return FALSE;
            }else{
                $where = "id_jadwal LIKE '%".(int)$key."%' OR jam_praktek LIKE '%".$key."%'";
                $this->db->from('jadwal_praktek');
                $this->db->where($where);
                $query = $this->db->get();  
                

                return $query->result_array();
            }
        }

 
     
        public function get_Pemeriksaan($id_riwayat = FALSE){
            
            if($id_riwayat != FALSE){
                $where = "id_riwayat = '".$id_riwayat."' ";
                $this->db->from('pasien');
                $this->db->join('riwayat', 'pasien.id_pasien = riwayat.id_pasien');
                $this->db->where($where);
                $this->db->order_by('tanggal', 'DESC');
                $query = $this->db->get();

                return $query->row_array();
            }
        
            $this->db->from('pasien');
            $this->db->join('riwayat', 'pasien.id_pasien = riwayat.id_pasien');
            $this->db->order_by('tanggal', 'DESC');

            $query = $this->db->get();

            return $query->result_array();
        }

        public function editPM($id){
            $hasil = $this->input->post('hasilP');
            
            if($hasil != ""){
                $data = array(
                    "hasil_pemeriksaan" => $this->input->post('hasilP'),
                    "status" => 1
                );
            }else{
                $data = array(
                    "hasil_pemeriksaan" => $this->input->post('hasilP'),
                    "status" => 0
                );
            }

            $this->db->where('id_riwayat',$id);
            return $this->db->update('riwayat',$data);
        }

        public function hapusPemeriksaan($id){
            return $this->db->delete('riwayat',array('id_riwayat' => $id));
        }

        public function searchPM($cari){
            if($cari == ""){
                return FALSE;
            }else{
                $where = "nama LIKE '%" . $cari . "%' OR tanggal LIKE '%" . $cari . "%' OR kategori='%" . $cari . "%' OR
                hasil_pemeriksaan LIKE '%".$cari."%' OR status LIKE '%".$cari."%' ";
                $this->db->from('pasien');
                $this->db->join('riwayat', 'pasien.id_pasien = riwayat.id_pasien');
                $this->db->where($where);

                $query = $this->db->get();

                return $query->result_array();   
            }
        }

        public function generateidinfo($data){
 
            foreach ($data as $key ) {
                $last = $key['id_informasi'];
            }
            $change = (int)$last;
            $change++;
            
            return $change;
        }

        public function tambahINFO(){
            $data = array(
                'id_informasi' => $this->input->post('id_informasi'),
                'isi' => $this->input->post('isi'),
                'tgl_dibuat' => $this->input->post('tgl_dibuat')
            );

            return $this->db->insert('informasi',$data);
        }

        public function hapusInfo($id){
            return $this->db->delete('informasi',array('id_informasi' => $id));
        }

        public function search_info_id($id)
        {
            $this->db->where('id_informasi',$id);
            $this->db->from('informasi');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function updateINFO(){
            $data = array(
                'id_informasi' => $this->input->post('id_informasi'),
                'isi' => $this->input->post('isi'),
                'tgl_dibuat' => $this->input->post('tgl_dibuat'),
    
            );
            $this->db->where('id_informasi',$this->input->post('id_informasi'));
            return $this->db->update('informasi',$data);
        

    }
}
?>