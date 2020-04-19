<?php 
class dokter_model extends CI_Model{
	
	public function check_username($username){
		//check if username (from param) already exist in db or not, return true / false
		$this->db->where('username',$username);
		$query = $this->db->get('profile');
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
}
?>