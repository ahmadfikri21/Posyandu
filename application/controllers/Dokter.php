<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{	
    function __construct(){
    parent::__construct();
    $this->load->model('dokter_model');
    $this->load->library('session');
  
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


}
