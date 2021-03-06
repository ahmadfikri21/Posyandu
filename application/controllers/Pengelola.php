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
                redirect('Pengelola/informasi');
               
            }else{
             
                $this->session->set_flashdata('message','Salah Username Atau Password'); 
                $this->session->flashdata('message');
                redirect('Pengelola/index');

            }
        }

        public function logout(){
            session_destroy();
            redirect('Pengelola/index');
        }

        ////////////////////////////////////////// DOKTER ////////////////////////////////////////////////////////////

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
            $data = $this->Pengelola_model->searchJP($id_dokter);
            $this->pengelola_model->deleteDK_JP($data[0]['id_jadwal']);
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

        //----------------------------------------------------User---------------------------------------------------

        public function user(){
            $data['isiUser'] = $this->Pengelola_model->get_User();

            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view("pengelola/kelolaUser",$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }

        public function editUser($id_user){
            $data['user'] = $this->Pengelola_model->get_User($id_user);
            
            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/editUser',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }
        
        public function updateUS(){
            $this->Pengelola_model->updateUS();
            redirect('pengelola/user');
        }

        public function tambahUser(){            
            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/tambahUser');
            $this->load->view("templates/pengelola/footerPengelola");
        }

        public function tambahUS(){
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('password2','Confirm Password','matches[password]','required');
            $this->form_validation->set_rules('email','Email','required');
            
            if($this->form_validation->run()){
                $this->Pengelola_model->tambahUS();
                redirect('Pengelola/user');
            }else{
                $this->load->view("templates/pengelola/headerPengelola");
                $this->load->view('Pengelola/tambahUser');
                $this->load->view("templates/pengelola/footerPengelola");
            }
        }

        public function hapusUser($id_user){
            $this->Pengelola_model->hapusUS($id_user);
            redirect('Pengelola/user');            
        }

        public function searchUS(){
            $key = $this->input->post('cari');
            
            if($this->Pengelola_model->searchUS($key)){
                $data['isiUser'] = $this->Pengelola_model->searchUS($key);
            }else{
                redirect('Pengelola/user');
            }

            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/kelolaUser',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }

        //----------------------------------------------------PASIEN-------------------------------------------------
        public function kelolapasien($offset = 0)
        {
            $data['isiPasien'] = $this->Pengelola_model->get_Pasien();
           
            //pagination
            $config['base_url'] = base_url() . 'Pengelola/kelolaPasien'; 
            $config['total_rows'] = count($data['isiPasien']); 
            $config['per_page'] = 10; 
            $config['uri_segment'] = 3; 
            $config['attributes'] = array('class' => 'link-pagination'); 
                
            $this->pagination->initialize($config);

            $data['isiPasien'] = array_splice($data['isiPasien'],$offset,$config['per_page']);


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
            $data['pendaftar'] = $this->Pengelola_model->get_User();
            $data['dokter'] = $this->Pengelola_model->get_Dokter();
            $data['jam'] = $this->Pengelola_model->get_Praktek();

            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/tambahPasien',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }

        public function tambahPS(){
            $this->form_validation->set_rules('pendaftar','Pendaftar','required');
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('dokter','Dokter','required');
            $this->form_validation->set_rules('tanggal','Tanggal','required');
            $this->form_validation->set_rules('jam_praktek','Jam Praktek','required');
            $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
            $this->form_validation->set_rules('kategori','Kategori','required');
            
            if($this->form_validation->run()){
                $dokter = $this->Pengelola_model->get_IdDokter($this->input->post('dokter'));
                $id_pasien = $this->Pengelola_model->get_IdPasien();

                $this->Pengelola_model->tambahPS();
                $this->Pengelola_model->tambahPsRiwayat($dokter,$id_pasien);
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
    
//----------------------------------------------------homepage Pengelola-------------------------------------------------
        
        public function tambahJP()
        {
            $semua = $this->pengelola_model->get_praktek();
            
            $data['id'] = $this->Pengelola_model->generateidJP($semua);
            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/tambahJP',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }

        public function tambahlagiJP()
        {
            $this->Pengelola_model->tambahJP();
            redirect('Pengelola/kelolapraktek');
        }

        public function deleteJP($id)
        {
            $this->Pengelola_model->hapusJP($id);
            redirect('Pengelola/kelolapraktek');
        }

        public function updateJP($data)
        {
            
            $dat = $this->Pengelola_model->search_jadwal_byid($data);
            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/editJP',$dat[0]);
            $this->load->view("templates/pengelola/footerPengelola");
        }
        public function updatelagiJP() 
        {
            $this->Pengelola_model->updateJP();
            redirect('Pengelola/kelolapraktek');
        }
        public function searchJP(){
            $key = $this->input->post('cari');
            
            if($this->Pengelola_model->searchJP($key)){
                $data['isiPraktek'] = $this->Pengelola_model->searchJP($key);
               
            }else{
                redirect('Pengelola/kelolapraktek');
            }
            
            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/kelolaJP',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }

        public function deleteDK_JP($id)
        {
            $data = $this->Pengelola_model->searchJP($id);
            $this->pengelola_model->deleteDK_JP($id);
            redirect('Pengelola/dokterJP/'.$data[0]['id_dokter']);
        }

        public function tambahDK_JP($id)
        {
            $data['Praktek'] = $this->pengelola_model->get_praktek_DKNull();
            $data['dokter'] = $this->Pengelola_model->searchDK($id);
            $data['dokter'] = $data['dokter'][0];
            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/tambahDK_JP',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }
        public function dokterJP($id_dokter)
        {
            $data['jadwal'] = $this->Pengelola_model-> getdokter_jadwal($id_dokter);
            $data['dokter'] = $this->Pengelola_model->searchDK($id_dokter);
            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view("Pengelola/dokterJP",$data);
            $this->load->view("templates/Pengelola/footerPengelola");
        }
        public function tambahlagiDKJP()
        {
            $id = $this->input->post('id_praktek');
            $this->Pengelola_model->updateDK_JP();
            redirect('Pengelola/dokterJP/'.$id);
        }

    
//----------------------------------------------------Pemeriksaan-------------------------------------------------

        public function pemeriksaan($offset = 0){
            $data['pemeriksa'] = $this->Pengelola_model->get_Pemeriksaan();

            //pagination
            $config['base_url'] = base_url() . 'Pengelola/pemeriksaan'; 
            $config['total_rows'] = count($data['pemeriksa']); 
            $config['per_page'] = 10; 
            $config['uri_segment'] = 3; 
            $config['attributes'] = array('class' => 'link-pagination'); 
                
            $this->pagination->initialize($config);

            $data['pemeriksa'] = array_splice($data['pemeriksa'],$offset,$config['per_page']);

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

        public function searchPM(){
            $key = $this->input->post('cari');
            
            if($this->Pengelola_model->searchPM($key)){
                $data['pemeriksa'] = $this->Pengelola_model->searchPM($key);
            }else{
                redirect('Pengelola/pemeriksaan');
            }

            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/kelolaPemeriksaan',$data);
            $this->load->view("templates/pengelola/footerPengelola");
        }

    
//----------------------------------------------------homepage Pengelola-------------------------------------------------
     public function informasi($offset = 0){
        $data['informasi']=$this->pengelola_model->getInfo();

        //pagination
        $config['base_url'] = base_url() . 'Pengelola/informasi'; 
        $config['total_rows'] = count($data['informasi']); 
        $config['per_page'] = 10; 
        $config['uri_segment'] = 3; 
        $config['attributes'] = array('class' => 'link-pagination'); 
            
        $this->pagination->initialize($config);

        $data['informasi'] = array_splice($data['informasi'],$offset,$config['per_page']);

        $this->load->view("templates/pengelola/headerPengelola");
        $this->load->view('Pengelola/informasi',$data);
        $this->load->view("templates/pengelola/footerPengelola");
     }

     
    public function tambahINFO()
    {
        $semua = $this->pengelola_model->getInfo();
        
        $data['id'] = $this->Pengelola_model->generateidinfo($semua);
        $this->load->view("templates/pengelola/headerPengelola");
        $this->load->view('Pengelola/tambahinformasi',$data);
        $this->load->view("templates/pengelola/footerPengelola");
    }

    public function tambahlagiINFO()
    {
        $this->Pengelola_model->tambahINFO();
        redirect('Pengelola/informasi');
    }

    public function deleteINFO($id)
        {
            $this->Pengelola_model->hapusInfo($id);
            redirect('Pengelola/informasi');
        }
    public function editINFO($data)
    {
        $data = $this->Pengelola_model->search_info_id($data);
        $this->load->view("templates/pengelola/headerPengelola");
        $this->load->view('Pengelola/editinformasi',$data[0]);
        $this->load->view("templates/pengelola/footerPengelola");
    }
    public function editlagiINFO()
    {
        $this->pengelola_model-> updateINFO();
        redirect('Pengelola/informasi');
    }

    public function searchInfo(){
        $key = $this->input->post('cari');
            
            if($this->Pengelola_model->searchInfo($key)){
                $data['informasi'] = $this->Pengelola_model->searchInfo($key);
            }else{
                redirect('Pengelola/informasi');
            }

            $this->load->view("templates/pengelola/headerPengelola");
            $this->load->view('Pengelola/informasi',$data);
            $this->load->view("templates/pengelola/footerPengelola");
    }

//----------------------------------------------------Review--------------------------------------------------------------

    public function review($offset = 0){
        $data['review'] = $this->Pengelola_model->getReview();

        //pagination
        $config['base_url'] = base_url() . 'Pengelola/review'; 
        $config['total_rows'] = count($data['review']); 
        $config['per_page'] = 10; 
        $config['uri_segment'] = 3; 
        $config['attributes'] = array('class' => 'link-pagination'); 
            
        $this->pagination->initialize($config);

        $data['review'] = array_splice($data['review'],$offset,$config['per_page']);

        $this->load->view("templates/pengelola/headerPengelola");
        $this->load->view('Pengelola/kelolaReview',$data);
        $this->load->view("templates/pengelola/footerPengelola");
    }

    public function searchReview(){
        $key = $this->input->post('cari');
            
        if($this->Pengelola_model->searchReview($key)){
            $data['review'] = $this->Pengelola_model->searchReview($key);
        }else{
            redirect('Pengelola/review');
       }

        $this->load->view("templates/pengelola/headerPengelola");
        $this->load->view('Pengelola/kelolaReview',$data);
        $this->load->view("templates/pengelola/footerPengelola");
    }
    
}
?>