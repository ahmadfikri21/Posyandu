<?php 
class dokter_model extends CI_Model{
	
	public function check_username($username){
		//check if username (from param) already exist in db or not, return true / false
		$this->db->where('username',$username);
		$query = $this->db->get('dokter');
		if($query->num_rows() > 0){
			return false;	
		}else{
			return true;
		}
	}
	
	public function login_dokter($data) {
		//check if data (consist of username and password) exist/found in db, return true / false
		$this->db->where('username',$data['username']);
		$this->db->where('password',$data['password']);
        $query = $this->db->get('dokter');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	
	public function get_riwayat($data){
		$this->db->select('*');
		$this->db->join('pasien', 'pasien.id_pasien = riwayat.id_pasien');
		$this->db->where('id_dokter',$data['id_dokter']);
		$this->db->where('status',0);
		$query = $this->db->get('riwayat');	
		return $query->result_array();

	}

	public function get_riwayat_byid($data)
	{
		$this->db->select('*');
		$this->db->join('pasien', 'pasien.id_pasien = riwayat.id_pasien');
		$this->db->join('dokter', 'dokter.id_dokter = riwayat.id_dokter');
		$this->db->where('id_riwayat',$data);
		$query = $this->db->get('riwayat');	
		return $query->result_array();
	}

	public function input_hasil_pemerikasaan($data){
		$this->db->set('hasil_pemeriksaan', $data['value']);
		$this->db->set('status', 1);
		$this->db->where('id_riwayat', $data['id_riwayat']);
		$this->db->update('riwayat');
	}
	
	public function insert_new_profile($data){
		//insert data (consist of username, password, and profile pic filename) to table, return true if insert works and vice versa
		return $this->db->insert('profile',$data);
		 //delete if not necessary, it's just there to prevent error
	}
	
	public function get_profile($username){
		//select 1 row profile based on username (from param) and return it, if the data is not found then return false
		$this->db->where('username',$username);
		$query = $this->db->get('dokter');
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
		//delete if not necessary, it's just there to prevent error
	}
	public function updatedk($data){
		$this->db->set('nama', $data['nama']);
		$this->db->set('username', $data['username']);
		$this->db->set('no_telp', $data['no_telp']);
		$this->db->where('id_dokter', $data['id_dokter']);
		$this->db->update('dokter');
		

	}
}
?>