<?php
    class Pasien extends CI_Controller{
        public function index(){
            $this->load->view('templates/Pasien/headerPasien');
            $this->load->view('Pasien/homepage');
            $this->load->view('templates/Pasien/footerPasien');
        }

        public function riwayat(){
            $data['riwayat'] = $this->Pasien_model->get_riwayat();

            $this->load->view('templates/Pasien/headerPasien');
            $this->load->view('Pasien/riwayat',$data);
            $this->load->view('templates/Pasien/footerPasien');
        }

        public function cari(){
            $cari = $this->input->post('cari');

            $data['riwayat'] = $this->Pasien_model->get_search($cari);

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
?>