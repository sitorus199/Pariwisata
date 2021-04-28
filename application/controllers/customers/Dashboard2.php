<?php
class Dashboard2 extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengunjung');
	}
	function index(){

			$this->load->view('customers/v_dashboardd');
			//redirect('administrator');
	
	}
	
}