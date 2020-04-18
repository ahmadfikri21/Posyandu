<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function index()
    {
        $this->load->view("templates/dokter/headerHome");
        $this->load->view("Dokter/login");
        $this->load->view("templates/dokter/footerHome");
    }


}
