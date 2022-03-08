<?php
class Accomodation extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_destinasi');
        $this->load->model('m_akomodasi'); 
		$this->load->library('upload');
	}
	function index(){
			$x['brt']=$this->m_akomodasi->tampil_akomodasi();
			$this->load->view('customers/v_accomodation',$x);
			//redirect('administrator');
	
	}
	public function simpan_pemesanan(){
		$id=strip_tags($this->input->post('xid'));
		$nama=strip_tags($this->input->post('xnama'));
		$customerorder=$this->session->userdata('idadmin');
		$tanggal=strip_tags($this->input->post('xtanggal'));
		$metode=1;
		$status='BELUM LUNAS';
		$alamat=strip_tags($this->input->post('xalamat'));
		$email=strip_tags($this->input->post('xemail'));
		$notelp=strip_tags($this->input->post('xnotelp'));
		$mulai=strip_tags($this->input->post('xmulai'));
		$akhir=strip_tags($this->input->post('xakhir'));
		$jumlah=strip_tags($this->input->post('xjumlah'));
		$keterangan=$this->input->post('xketerangan');
		$this->m_destinasi->simpan_pemesanan($id,$nama,$alamat,$email,$notelp,$mulai,$akhir,$metode,$jumlah,$tanggal,$keterangan,$status,$customerorder);
		echo $this->session->set_flashdata('msg','success');
		redirect('customers/accomodation');
	}
	
}