<?php
class Pasien_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        //jika user terdaftar
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username']
                ];
                $this->session->set_userdata('userdata',$data);
                redirect('Pasien/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah.</div>');
                redirect('Homepage/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar.</div>');
            redirect('Homepage/login');
        }
    }

    public function get_registrasi()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', ['required' => 'Nama harus diisi!']);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', ['required' => 'Username harus diisi!', 'is_unique' => 'Username sudah terdaftar.']);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', ['required' => 'Password harus diisi!', 'matches' => 'Password tidak sama!', 'min_length' => 'Password dengan minimal 8 karakter menggunakan huruf dan angka']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['required' => 'E-mail harus diisi!', 'is_unique' => 'Email sudah terdaftar, silahkan gunakan email yang lain.']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', ['required' => 'Alamat harus diisi!']);
        $this->form_validation->set_rules('no_telp', 'Nomoe Telepon', 'required|trim', ['required' => 'Nomor Telepon harus diisi!']);

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/headerHome");
            $this->load->view("pasien/registrasi");
            $this->load->view("templates/footerHome");
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_BCRYPT),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp')
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda telah terdaftar. Silahkan Login!</div>');
            redirect('Homepage/login');
        }
    }

    public function get_review($username)
    {
        $this->form_validation->set_rules('kualitas', 'Kualitas', 'required|trim', ['required' => 'Kualitas Pelayanan harus diisi!']);
        $this->form_validation->set_rules('kritik', 'Kritik', 'required|trim', ['required' => 'Kritik harus diisi!']);
        $this->form_validation->set_rules('saran', 'Saran', 'required|trim', ['required' => 'Saran harus diisi!']);

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/pasien/headerPasien");
            $this->load->view("pasien/review");
            $this->load->view("templates/pasien/footerPasien");
        } else {
            $data = [
                'nama' => $username,
                'kualitas' => ($this->input->post('kualitas')),
                'kritik' => ($this->input->post('kritik')),
                'saran' => ($this->input->post('saran')),
            ];
            $this->db->insert('review', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Review anda telah berhasil kami terima.</div>');
            redirect('pasien/review');
        }
    }

    public function get_riwayat($user)
    {
        $where = "pendaftar = '".$user."' and status='1'";
        $this->db->from('pasien');
        $this->db->join('riwayat', 'pasien.id_pasien = riwayat.id_pasien');
        $this->db->where($where);
        $this->db->order_by('tanggal', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_search($cari,$user)
    {
        if($cari == ""){
            return false;
        }else{
            $where = "pendaftar='".$user."' AND  nama LIKE '%" . $cari . "%' OR tanggal LIKE '%" . $cari . "%' OR kategori='%" . $cari . "%'";
            $this->db->from('pasien');
            $this->db->join('riwayat', 'pasien.id_pasien = riwayat.id_pasien');
            $this->db->where($where);

            $query = $this->db->get();

            return $query->result_array();   
        }
    }

    public function get_lapKesehatan($id_riwayat)
    {
        $where = "id_riwayat ='" . $id_riwayat . "'";

        $this->db->select('pasien.nama AS nm_pasien, dokter.nama AS nm_dokter, pasien.tanggal, pasien.kategori,
            riwayat.hasil_Pemeriksaan,pasien.jam_praktek');
        $this->db->from('pasien');
        $this->db->join('riwayat', 'pasien.id_pasien = riwayat.id_pasien');
        $this->db->join('dokter', 'riwayat.id_dokter = dokter.id_dokter');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_informasi(){
        $this->db->from('informasi');
        $this->db->order_by('tgl_dibuat','DESC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function daftarPraktek($username)
    {
        $data = array(
            "nama" => $this->input->post('nama', true),
            "tanggal" => $this->input->post('tanggal', true),
            "jam_praktek" => $this->input->post('jamP', true),
            "tgl_lahir" => $this->input->post('lahir', true),
            "kategori" => $this->input->post('katP', true),
            "pendaftar" => $username
        );
        
        return $this->db->insert('pasien',$data);
    }

    public function daftarPraktekRiwayat($dokter,$id){
        $riwayat = array(
            "id_dokter" => $dokter,
            "id_pasien" => $id
        );

        return $this->db->insert('riwayat',$riwayat);
    }

    public function get_Dokter(){
        $query = $this->db->query('SELECT id_dokter,nama FROM dokter');
        return $query->result();
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

    public function get_idPasien(){
        $sql= "SELECT AUTO_INCREMENT as AI
            FROM  INFORMATION_SCHEMA.TABLES
            WHERE TABLE_SCHEMA = 'db_posyandu'
            AND   TABLE_NAME   = 'pasien'";

        $query = $this->db->query($sql);
        // $this->db->select('id_pasien');
        // $this->db->from('pasien');
        // $this->db->order_by('id_pasien','DESC');
        // $this->db->limit(1);

        // $query = $this->db->get();

        // if ($query->num_rows() > 0) {
        //     return $query->row()->id_pasien + 1;
        // }

        return $query->row()->AI;
    }

    public function get_jam_praktek($jam_praktek = FALSE){
        if($jam_praktek != FALSE){
            $this->db->select('id_dokter');
            $this->db->from('jadwal_praktek');
            $this->db->where('jam_praktek = "'.$jam_praktek.'"');
            $query = $this->db->get();
            return $query->row_array();
        }
        $query = $this->db->query('SELECT jam_praktek FROM jadwal_praktek');
        return $query->result();
    }

    public function get_profile($username){
        $this->db->select();
        $this->db->where('username',$username);
        $this->db->from('user');
        $query = $this->db->get();
        $data = array();
        foreach ($query ->result() as $user) {
            $data = array(
                "nama" => $user->nama,
                "username" => $user->username,
                "password" => $user->password,
                "email" => $user->email,
                "alamat" => $user->alamat,
                "telp" => $user->no_telp
            );
        }
        return $data;
    }

    public function update_profile($username){
        $user = $this->input->post('username',true);
        
        $data = array(
            "nama" => $this->input->post('nama',true),
            "username" => $user,
            "email" => $this->input->post('email',true),
            "alamat" => $this->input->post('alamat',true),
            "no_telp" => $this->input->post('telp',true)
        );
        
        $pendaftar = array('pendaftar' => $user);

        $this->db->from('pasien');
        $this->db->where('pendaftar',$username);
        $this->db->update('pasien',$pendaftar);

        $this->db->from('user');
        $this->db->where('username',$username);
        $this->db->update('user',$data);

        $this->session->set_userdata('userdata',array('username' => $user));

        return $user;
    }

    public function get_PassUser($username){
        $this->db->select('password');
        $this->db->from('user');
        $this->db->where('username = "'.$username.'" ');
        $query = $this->db->get();
        return $query->row()->password;
    }

    public function updatePwd($username){
        $data = array(
            'password' => password_hash($this->input->post('passBaru'), PASSWORD_BCRYPT)
        );

        $this->db->from('user');
        $this->db->where('username',$username);
        $this->db->update('user',$data);
        return $username;
    }

    public function getPasienRiwayat($username){
        $this->db->from('pasien');
        $this->db->join('riwayat','pasien.id_pasien = riwayat.id_pasien');
        $this->db->where('pendaftar = "'.$username.'" and status = 0 ');
        $this->db->order_by('pasien.tanggal','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

}
