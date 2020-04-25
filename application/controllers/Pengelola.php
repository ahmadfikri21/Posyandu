<?php
    class Pengelola extends CI_Controller{

        function __construct(){
            parent::__construct();
            $this->load->model('pengelola_model');
            $this->load->library('session');
          
            }

        public function index(){
            $this->load->view('Pengelola/login');
        }

        public function login(){
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            
            if($this->Pengelola_model->login_pengelola($data)){
                $this->session->set_userdata('username', $this->input->post('username'));
                $this->session->set_userdata('password', $this->input->post('password'));
                redirect('Pengelola/homepage');
               
            }else{
             
                $this->session->set_flashdata('message','Salah Username Atau Password'); 
                $this->session->flashdata('message');
                redirect('Pengelola/index');

            }
        }

        public function logout(){
            session_destroy();
            redirect('Dokter/index');
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
            $data = $this->Pengelola_model->get_all_Dokter();
            $data['id_dokter'] = $this->Pengelola_model->generateidDk($data);
            
            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/tambahDokter',$data);
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

        //----------------------------------------------------PASIEN-------------------------------------------------
        public function kelolapasien()
        {
            $data['isiPasien'] = $this->Pengelola_model->get_Pasien();
           
            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/kelolaPasien',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }

        
        public function editPasien($id_Pasien){
            $data['pasien'] = $this->Pengelola_model->get_Pasien($id_Pasien);   
            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/editPasien',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }
        
        public function updatePS(){
            $this->Pengelola_model->updatePS();
            redirect('pengelola/kelolapasien');
        }

        public function tambahPasien(){
            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/tambahPasien');
            $this->load->view("templates/pengelola/footerPengelola");
        }

        public function tambahPS(){
            $this->form_validation->set_rules('id_pasien','Id Pasien','required');
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('tanggal','Tanggal','required');
            $this->form_validation->set_rules('jam_praktek','Jam Praktek','required');
            $this->form_validation->set_rules('tgl_lahir','Tgl Lahir','required');
            $this->form_validation->set_rules('kategori','Kategori','required');
            
            if($this->form_validation->run()){
                $this->Pengelola_model->tambahPS();
                redirect('Pengelola/kelolapasien');
            }else{
                $this->load->view("templates/pengelola/headerPengelola");
                $this->load->view('Pengelola/tambahPasien');
                $this->load->view("templates/pengelola/footerPengelola");
            }
        }

        public function hapusPasien($id_pasien){
            $this->Pengelola_model->hapusPS($id_pasien);
            redirect('Pengelola/kelolapasien');
            
        }
        public function searchPS(){
            $key = $this->input->post('cari');
            
            if($this->Pengelola_model->searchPS($key)){
                $data['isiPasien'] = $this->Pengelola_model->searchPS($key);
            }else{
                redirect('Pengelola/pasien');
            }

            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/kelolaPasien',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }
//----------------------------------------------------PRAKTEK-------------------------------------------------

        public function kelolapraktek()
        {
            $data['isiPraktek'] = $this->pengelola_model->get_praktek();
            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/kelolaJP',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }
//----------------------------------------------------Pemeriksaan-------------------------------------------------

        public function pemeriksaan(){
            $data['pemeriksa'] = $this->Pengelola_model->get_Pemeriksaan();

            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/kelolaPemeriksaan',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        } 

        public function editPemeriksaan($id_riwayat){
            $data['pemeriksa'] = $this->Pengelola_model->get_pemeriksaan($id_riwayat);

            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/editPemeriksaan',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }

        public function editPM(){
            $this->Pengelola_model->editPM($this->input->post('id_riwayat'));
            redirect('pengelola/pemeriksaan');
        }

        public function hapusPemeriksaan($id_riwayat){
            $this->Pengelola_model->hapusPemeriksaan($id_riwayat);
            redirect('pengelola/pemeriksaan');
        }

    }

?>