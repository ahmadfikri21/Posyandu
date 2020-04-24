<?php
defined('BASEPATH') or exit('No direct script access allowed');

    class Pasien extends CI_Controller{
        function __construct(){ 
            parent::__construct(); 
            $this->load->helper('url');
            $this->load->model('Pasien_model');
            $this->load->database(); 
        } 
        public function index(){
            $data['informasi'] = $this->Pasien_model->get_informasi();
            $data['user'] = $this->session->userdata('userdata');
            
            $this->load->view('templates/Pasien/headerPasien');
            $this->load->view('Pasien/homepage',$data);
            $this->load->view('templates/Pasien/footerPasien');  
        }

        public function riwayat(){
            $user = $this->session->userdata('userdata');
            $data['riwayat'] = $this->Pasien_model->get_riwayat($user['username']);
            $data['user'] = $user['username'];

            $this->load->view('templates/Pasien/headerPasien');
            $this->load->view('Pasien/riwayat',$data);
            $this->load->view('templates/Pasien/footerPasien');
        }

        public function cari(){
            $cari = $this->input->post('cari');
            $user = $this->session->userdata('userdata');

            if($this->Pasien_model->get_search($cari,$user['username'])){
                $data['riwayat'] = $this->Pasien_model->get_search($cari,$user['username']);
            }else{
                redirect("Pasien/riwayat");
            }
            $data['user'] = $user['username'];

            $this->load->view('templates/Pasien/headerPasien');
            $this->load->view('Pasien/riwayat',$data);
            $this->load->view('templates/Pasien/footerPasien');
        }

        public function lapKesehatan($id_riwayat = NULL){
            $data['laporan'] = $this->Pasien_model->get_lapKesehatan($id_riwayat);

            $this->load->view('templates/Pasien/headerPasien');
            $this->load->view('Pasien/laporanKesehatan',$data);
            $this->load->view('templates/Pasien/footerPasien');            
        }

        public function daftar_praktek(){
            $this->load->helper('form');
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('tanggal','Tanggal','required');
            $this->form_validation->set_rules('jamP','JamP','required');
            $this->form_validation->set_rules('lahir','Lahir','required');
            $this->form_validation->set_rules('katP','KatP','required');  
            $data['jamP']=$this->Pasien_model->get_jam_praktek();
            $user = $this->session->userdata('userdata');
        
            if($this->form_validation->run() == false){
                $this->load->view('templates/Pasien/headerPasien');
                $this->load->view('Pasien/daftar_praktek',$data);
                $this->load->view('templates/Pasien/footerPasien');
            }else{
                $this->Pasien_model->daftarPraktek($user['username']);
                $this->session->set_flashdata('flash','ditambah');
                $this->session->flashdata('flash');
                redirect('Pasien/daftar_praktek');
            }
        }

        public function review()
        {
            $username = $this->session->userdata('userdata');
            $data['review'] = $this->Pasien_model->get_review($username['username']);
        }

        public function update_akun(){
            $this->load->helper('form');
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('alamat','Alamat','required');
            $this->form_validation->set_rules('telp','Telp','required'); 
            $user = $this->session->userdata('userdata');
            $data= $this->Pasien_model->get_profile($user['username']);
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/Pasien/headerPasien');
                $this->load->view('Pasien/update_akun',$data);
                $this->load->view('templates/Pasien/footerPasien');
            } else {
                $user= $this->Pasien_model->update_profile($user['username']);
                $this->session->set_userdata('username',$user);
                $this->session->set_flashdata('flash','update');
                $this->session->flashdata('flash');
                $this->load->view('templates/Pasien/headerPasien');
                $this->load->view('Pasien/update_akun',$data);
                $this->load->view('templates/Pasien/footerPasien');
            }
        }
    }
