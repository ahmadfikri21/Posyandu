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
        
		if($this->dokter_model->login_dokter($data)){
			$this->session->set_userdata('username', $this->input->post('username'));
            $this->session->set_userdata('password', $this->input->post('password'));
            redirect('Dokter/homepage');
           
		}else{
         
            $data['error_message'] = "Invalid Username or Password";
            echo $data['error_message'];
			//$this->load->view('login',$data); 
		}
    }
    public function homepage()
    {
        $username = $this->session->userdata('username');
        $data['datadokter'] = $this->dokter_model->get_profile($username);
        $data = $data['datadokter'][0];
        $this->load->view("templates/dokter/headerHome");
        $this->load->view("Dokter/homepage",$data);
        $this->load->view("templates/dokter/footerHome");
    }

    public function daftarpasien(){
        $username = $this->session->userdata('username');
        $data['datadokter'] = $this->dokter_model->get_profile($username);
        
        $data1['value']= $this->dokter_model->get_riwayat($data['datadokter'][0]);
        
        $this->load->view("templates/dokter/headerHome");
        $this->load->view("Dokter/daftarpasien",$data1);
        $this->load->view("templates/dokter/footerHome");
    }

    public function inputlaporan(){ 
        $data = substr(current_url(), strrpos(current_url(), '/') + 1);
        $data = $this->dokter_model->get_riwayat_byid($data);
        $data = $data[0];
        $this->load->view("templates/dokter/headerHome");
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

    // public function uploadFoto(){
    //     if($this->session->)
    // }


}
