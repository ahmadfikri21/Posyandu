<?php
    class Pengelola extends CI_Controller{

        function __construct(){
            parent::__construct();
           // $this->load->model();
            $this->load->library('session');
          
            }

        public function index(){
            $this->load->view('Pengelola/login');
        }

        public function login(){

        }

        public function dokter(){
            $data['isiDokter'] = $this->Pengelola_model->get_Dokter();

            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view("pengelola/kelolaDokter",$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }

        public function editDokter($id_dokter){
            $data['dokter'] = $this->Pengelola_model->get_Dokter($id_dokter);

            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/editDokter',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }
        
        public function updateDK(){
            $this->Pengelola_model->updateDK();
            redirect('pengelola/dokter');
        }

        public function tambahDokter(){
            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/tambahDokter');
            $this->load->view("templates/pengelola/footerPengelola");
        }

        public function tambahDK(){
            $this->form_validation->set_rules('id_dokter','Id Dokter','required');
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('password2','Confirm Password','matches[password]','required');
            $this->form_validation->set_rules('no_telp','Nomor Telepon','required');
            
            if($this->form_validation->run()){
                $this->Pengelola_model->tambahDK();
                redirect('Pengelola/dokter');
            }else{
                $this->load->view("templates/pengelola/headerPengelola");
                $this->load->view('Pengelola/tambahDokter');
                $this->load->view("templates/pengelola/footerPengelola");
            }
        }

        public function hapusDokter($id_dokter){
            $this->Pengelola_model->hapusDK($id_dokter);
            redirect('Pengelola/dokter');
        }

        public function searchDK(){
            $key = $this->input->post('cari');
            
            if($this->Pengelola_model->searchDK($key)){
                $data['isiDokter'] = $this->Pengelola_model->searchDK($key);
            }else{
                redirect('Pengelola/dokter');
            }

            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/kelolaDokter',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }

    }


?>