<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view("templates/headerHome");
        $this->load->view("homepage");
        $this->load->view("templates/footerHome");
    }

    public function tentangKami(){
        $this->load->view("templates/headerHome");
        $this->load->view("tentangKami");
        $this->load->view("templates/footerHome");
    }

    public function login()
    {
        $this->load->view("templates/headerHome");
        $this->load->view("pasien/login");
        $this->load->view("templates/footerHome");
    }
    public function registrasi()
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
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp')
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda telah terdaftar. Silahkan Login!</div>');
            redirect('Homepage/login');
        }
    }
    public function review()
    {
        $this->load->view("templates/headerHome");
        $this->load->view("pasien/review");
        $this->load->view("templates/footerHome");
    }
}
