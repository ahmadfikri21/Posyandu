<?php
    class Homepage extends CI_Controller {
        public function index(){
            $this->load->view("templates/headerHome");
            $this->load->view("Homepage");
            $this->load->view("templates/footerHome");
        }
    }
?>