<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{	
    function __construct(){
    parent::__construct();
    $this->load->model('dokter_model');
    $this->load->library('session');
    $this->load->library('table');
    
  
    }
    public function index()
    {
        $this->load->view("templates/dokter/headerHome");
        $this->load->view("Dokter/login");
        $this->load->view("templates/dokter/footerHome");
    }
    
    public function Login()
    {
        $data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
       $user =$this->dokter_model->login_dokter($data); 
 
		if($user){
            if (password_verify($data['password'], $user['password'])){
                $this->session->set_userdata('username', $this->input->post('username'));
                $this->session->set_userdata('password', $this->input->post('password'));
                redirect('Dokter/homepage');
            }else{
                $this->session->set_flashdata('message','Salah Password'); 
                $this->session->flashdata('message');
                redirect('Dokter/index');
            }
           
		}else{
         
            $this->session->set_flashdata('message','Salah Username Atau Password'); 
            $this->session->flashdata('message');
            redirect('Dokter/index');
       
		}
    }
    public function homepage()
    {
        $username = $this->session->userdata('username');
        $data['datadokter'] = $this->dokter_model->get_profile($username);
        $data = $data['datadokter'][0];
 
      
        $this->load->view("templates/dokter/headerProfile",$data);
        $this->load->view("Dokter/homepage",$data);
        $this->load->view("templates/dokter/footerHome");
    }

    public function daftarpasien(){
        $username = $this->session->userdata('username');
        $data['datadokter'] = $this->dokter_model->get_profile($username);
        $data2['dataprofile']=$this->dokter_model->get_profile($username);
        $data2 = $data2['dataprofile'][0];
        $data1['value']= $this->dokter_model->get_riwayat($data['datadokter'][0]);
        
        $this->load->view("templates/dokter/headerProfile",$data2);
        $this->load->view("Dokter/daftarpasien",$data1);
        $this->load->view("templates/dokter/footerHome");
    }
    public function viewJadwalPraktek(){
        // headernya
        $username = $this->session->userdata('username');
        $data1['dataprofile']=$this->dokter_model->get_profile($username);
        $data1=$data1['dataprofile'][0]; 
        // headernya
        $data['jadwal']=$this->dokter_model->view_jadwal($data1['id_dokter']);
        
        $this->load->view("templates/dokter/headerProfile",$data1);
        $this->load->view("Dokter/Jadwal_praktek",$data);    
        $this->load->view("templates/Dokter/footerHome");
    }

    public function inputlaporan($data){ 
        // headernya
        $username = $this->session->userdata('username');
        $data1['dataprofile']=$this->dokter_model->get_profile($username);
        $data1=$data1['dataprofile'][0]; 
        // headernya
        $data = $this->dokter_model->get_riwayat_byid($data);
        $data = $data[0];
        $this->load->view("templates/dokter/headerProfile",$data1);
        $this->load->view("Dokter/inputlaporan",$data);
        $this->load->view("templates/dokter/footerHome");
    }

    public function input_hasil_laporan(){
        $data = substr(current_url(), strrpos(current_url(), '/') + 1);
        $data = $this->dokter_model->get_riwayat_byid($data);
        $data = $data[0];
        $data['value'] = $this->input->post('hasilpemeriksaan');
      
        $this->dokter_model->input_hasil_pemerikasaan($data);
       redirect('Dokter/daftarpasien');
    }

    public function editdokter(){
        $username = $this->session->userdata('username');
        $data = $this->dokter_model->get_profile($username);
        $datahead = $data[0];
        $data['dokter'] = $data[0];
        $this->load->view("templates/dokter/headerProfile",$datahead);
        $this->load->view("Dokter/editdokter",$data);
        $this->load->view("templates/dokter/footerHome");
    }

    public function updateDK(){
        $data['id_dokter'] =  $this->input->post('id_dokter');
        $data['nama'] = $this->input->post('nama');
        $data['username'] = $this->input->post('username');
        $data['no_telp'] = $this->input->post('no_telp');
        $this->dokter_model->updatedk($data);
        var_dump($data);
        redirect('Dokter/homepage');
    }

    public function logout(){
        session_destroy();
        redirect('Dokter/index');
    }
    

    public function searchDK(){
        $username = $this->session->userdata('username');
        $data = $this->dokter_model->get_profile($username);
        $datahead = $data[0];
        $key = $this->input->post('search');
        $data['value'] = $this->dokter_model->searchDK($key);
        if($this->dokter_model->searchDK($key)){
            $data['value'] = $this->dokter_model->searchDK($key);
            $dat['value'][0] = $data['value'][0];
        
       
        }else{
            redirect('Dokter/daftarpasien');
        }

        $this->load->view("templates/dokter/headerProfile",$datahead);
        $this->load->view("Dokter/daftarpasien",$dat);
        $this->load->view("templates/dokter/footerHome");
    }

    public function bantuan()
    {
        $username = $this->session->userdata('username');
        $datahead=$this->dokter_model->get_profile($username);
        $this->load->view("templates/dokter/headerProfile",$datahead[0]);
        $this->load->view("Dokter/bantuan");
        $this->load->view("templates/dokter/footerHome");
    }

    public function tentangkami()   
    {
        $username = $this->session->userdata('username');
        $datahead=$this->dokter_model->get_profile($username);
        $this->load->view("templates/dokter/headerProfile",$datahead[0]);
        $this->load->view("Dokter/tentangkami");
        $this->load->view("templates/dokter/footerHome");
    }



    // public function uploadFoto(){
    //     if($this->session->)
    // }


}
