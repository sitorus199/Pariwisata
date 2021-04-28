<?php 
class Login extends CI_Controller{
    function __construct(){
    	parent::__construct();
    	if($this->session->userdata('masuk') !=TRUE){
              $url=base_url('administrator');
              redirect($url);
          };
    	$this->load->model('m_kategori');
    }
    function index(){
        $this->load->view('customers/v_login');
    }
}