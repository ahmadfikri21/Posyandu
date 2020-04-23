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
    }


?>