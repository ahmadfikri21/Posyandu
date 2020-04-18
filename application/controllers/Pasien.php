<?php
    class Pasien extends CI_Controller{
        public function index(){
            $this->load->view('templates/Pasien/headerPasien');
            $this->load->view('Pasien/homepage');
            $this->load->view('templates/Pasien/footerPasien');
        }

        public function riwayat(){
            $this->load->view('templates/Pasien/headerPasien');
            $this->load->view('Pasien/riwayat');
            $this->load->view('templates/Pasien/footerPasien');
        }
    }
?>