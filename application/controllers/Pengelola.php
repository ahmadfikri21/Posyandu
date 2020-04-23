<?php
    class Pengelola extends CI_Controller{
        public function index(){
            $this->load->view('templates/pengelola/headerPengelola');
            $this->load->view('pengelola/login');
            $this->load->view('templates/pengelola/footerPengelola');
        }
    }


?>