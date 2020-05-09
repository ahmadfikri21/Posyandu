<?php
defined('BASEPATH') or exit('No direct script access allowed');

    class Pasien extends CI_Controller{
        function __construct(){ 
            parent::__construct(); 
            $this->load->helper('url');
            $this->load->model('Pasien_model');
            $this->load->database(); 
        } 
        public function index($offset = 0){
            $user = $this->session->userdata('userdata');
            $data['informasi'] = $this->Pasien_model->get_informasi();
            $data['user'] = $user;
            $data['praktek'] = $this->Pasien_model->getPasienRiwayat($user['username']);

            //pagination
            $config['base_url'] = base_url() . 'Pasien/index'; 
            $config['total_rows'] = count($data['informasi']); 
            $config['per_page'] = 3; 
            $config['uri_segment'] = 3; 
            $config['attributes'] = array('class' => 'link-pagination'); 
            
            $this->pagination->initialize($config);
            
            $data['informasi'] = array_splice($data['informasi'],$offset,$config['per_page']);

            $this->load->view('templates/Pasien/headerPasien');
            $this->load->view('Pasien/homepage',$data);
            $this->load->view('templates/Pasien/footerPasien');  
        }

        public function riwayat($offset = 0){
            $user = $this->session->userdata('userdata');
            $data['riwayat'] = $this->Pasien_model->get_riwayat($user['username']);
            $data['user'] = $user['username'];

            // pagination
            $config['base_url'] = base_url() . 'Pasien/riwayat/'; 
            $config['total_rows'] = count($data['riwayat']); 
            $config['per_page'] = 2; 
            $config['uri_segment'] = 3; 
            $config['attributes'] = array('class' => 'link-pagination'); 
            
            $this->pagination->initialize($config);

            $data['riwayat'] = array_splice($data['riwayat'], $offset, $config['per_page']);

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

            $dokter = $this->Pasien_model->get_Dokter();
            $data['jamP']=$this->Pasien_model->get_jam_praktek();
            $data['dokter'] = $dokter;

            $user = $this->session->userdata('userdata');
        
            if($this->form_validation->run() == false){
                $this->load->view('templates/Pasien/headerPasien');
                $this->load->view('Pasien/daftar_praktek',$data);
                $this->load->view('templates/Pasien/footerPasien');
            }else{
                $id_dokter = $this->Pasien_model->get_jam_praktek($this->input->post('jamP'));
                $id_pasien = $this->Pasien_model->get_idPasien();

                $this->Pasien_model->daftarPraktek($user['username']);
                $this->Pasien_model->daftarPraktekRiwayat($id_dokter['id_dokter'],$id_pasien);
                $this->session->set_flashdata('success','<div class="alert alert-success" role="success">Pasien Berhasil di daftarkan!</div>');
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
                $user2= $this->Pasien_model->update_profile($user['username']);
                // $this->session->set_userdata('username',$user2);
                $this->session->set_flashdata('flash','update');
                $this->session->flashdata('flash');
                $this->load->view('templates/Pasien/headerPasien');
                $this->load->view('Pasien/update_akun',$data);
                $this->load->view('templates/Pasien/footerPasien');
            }
        }

        public function updatePass(){
            $this->load->view('templates/Pasien/headerPasien');
             $this->load->view('Pasien/updatePass');
             $this->load->view('templates/Pasien/footerPasien');
         } 

         public function updatePwd(){
            $this->form_validation->set_rules('passLama','Password Lama','required');
            $this->form_validation->set_rules('passBaru','Password Baru','required');
            $this->form_validation->set_rules('passBaru2','Confirm Password','required|matches[passBaru]');

            if($this->form_validation->run()){
                $user = $this->session->userdata('userdata');
                $pass = $this->input->post('passLama');

                $passDB = $this->Pasien_model->get_PassUser($user['username']);
                if(password_verify($pass,$passDB)){
                    $this->Pasien_model->updatePwd($user['username']);
                    redirect('pasien/index');
                }else{
                    redirect('Pasien/updatePass');   
                }
            }else{
                $this->load->view('templates/Pasien/headerPasien');
                $this->load->view('Pasien/updatePass');
                $this->load->view('templates/Pasien/footerPasien');
            }
         }

         public function profil(){
            $this->load->view('templates/Pasien/headerPasien');
            $this->load->view('Pasien/profil');
            $this->load->view('templates/Pasien/footerPasien');
         }

    }
