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
                $this->session->set_userdata($data);
                redirect('Pasien/homepage');
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
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp')
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda telah terdaftar. Silahkan Login!</div>');
            redirect('Homepage/login');
        }
    }

    public function get_review()
    {
        $this->form_validation->set_rules('kualitas', 'Kualitas', 'required|trim', ['required' => 'Kualitas Pelayanan harus diisi!']);
        $this->form_validation->set_rules('kritik', 'Kritik', 'required|trim', ['required' => 'Kritik harus diisi!']);
        $this->form_validation->set_rules('saran', 'Saran', 'required|trim', ['required' => 'Saran harus diisi!']);

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/headerHome");
            $this->load->view("pasien/review");
            $this->load->view("templates/footerHome");
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'kualitas' => ($this->input->post('kualitas')),
                'kritik' => ($this->input->post('kritik')),
                'saran' => ($this->input->post('saran')),
            ];
            $this->db->insert('review', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Review anda telah berhasil kami terima.</div>');
            redirect('Homepage/review');
        }
    }

    public function get_riwayat()
    {
        $this->db->from('pasien');
        $this->db->join('riwayat', 'pasien.id_pasien = riwayat.id_pasien');
        $this->db->order_by('tanggal', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_search($cari)
    {
        $where = "nama LIKE '%" . $cari . "%' OR tanggal LIKE '%" . $cari . "%' OR kategori='%" . $cari . "%'";
        $this->db->from('pasien');
        $this->db->join('riwayat', 'pasien.id_pasien = riwayat.id_pasien');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
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
}
