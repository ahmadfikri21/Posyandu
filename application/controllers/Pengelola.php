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

        public function hapusDokter(){
            
        }

    }


?>