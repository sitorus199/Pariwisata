<?php
class Paketwisata extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_destinasi');
        $this->load->model('m_profile'); 
        $this->load->model('m_paketwisata'); 
		$this->load->library('upload');
	}
	function index(){
		

		
		//echo $kodee;
		$x['brt']=$this->m_paketwisata->tampil_paketwisata();
		$this->load->view('customers/v_paketwisata',$x);
		//redirect('administrator');
	
	}

	public function simpan_pemesanan(){

		$kodee=$this->m_profile->get_nama();
		var_dump($kodee);
		$id=strip_tags($this->input->post('xid'));
		$nama=$this->session->userdata('nama');
		$alamat=$this->session->userdata('moto');
		$email=$this->session->userdata('email');
		$notelp=$this->session->userdata('hp'); 	

		
		$tanggal=strip_tags($this->input->post('xtanggal'));
		$metode=1;
		$status='BELUM LUNAS';
		
		$mulai=strip_tags($this->input->post('xmulai'));
		$akhir=strip_tags($this->input->post('xakhir'));
		$jumlah=strip_tags($this->input->post('xjumlah'));
		$keterangan=$this->input->post('xketerangan');

	
		$this->m_destinasi->simpan_pemesanan($id,$nama,$alamat,$email,$notelp,$mulai,$akhir,$metode,$jumlah,$tanggal,$keterangan,$status);
		echo $this->session->set_flashdata('msg','success');
		redirect('customers/paketwisata');
	}
}