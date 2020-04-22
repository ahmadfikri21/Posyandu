<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pasien_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view("templates/headerHome");
        $this->load->view("homepage");
        $this->load->view("templates/footerHome");
    }

    public function tentangKami()
    {
        $this->load->view("templates/headerHome");
        $this->load->view("tentangKami");
        $this->load->view("templates/footerHome");
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'Username harus diisi!']);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Password harus diisi!']);

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/headerHome");
            $this->load->view("pasien/login");
            $this->load->view("templates/footerHome");
        } else {
            $this->Pasien_model->_login();
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('homepage');
    }

    public function registrasi()
    {
        $data['user'] = $this->Pasien_model->get_registrasi();
    }

    public function review()
    {
        $data['review'] = $this->Pasien_model->get_review();
    }
}
