<?php
class Kuliner extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_kuliner'); 
		$this->load->library('upload');
	}
	function index(){
			$x['brt']=$this->m_kuliner->tampil_kuliner();
			$this->load->view('customers/v_kuliner',$x);
			//redirect('administrator');
	
	}
	
}