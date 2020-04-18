<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function index()
    {
        $this->load->view("templates/headerHome");
        $this->load->view("login");
        $this->load->view("templates/footerHome");
    }
    public function login()
    {
        $this->load->view("templates/headerHome");
        $this->load->view("login");
        $this->load->view("templates/footerHome");
    }
    public function registrasi()
    {
        $this->load->view("templates/headerHome");
        $this->load->view("registrasi");
        $this->load->view("templates/footerHome");
    }
}
