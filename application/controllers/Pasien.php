<?php
defined('BASEPATH') or exit('No direct script access allowed');

    class Pasien extends CI_Controller{
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

    }
