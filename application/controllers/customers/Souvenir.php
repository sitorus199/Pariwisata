<?php
class Souvenir extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_souvenir'); 
		$this->load->library('upload');
	}
	function index(){
			$x['brt']=$this->m_souvenir->tampil_souvenir();
			$this->load->view('customers/v_souvenir',$x);
			//redirect('administrator');
	
	}
	
}