<?php
class Destinasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };

        $this->load->model('m_destinasi'); 
		$this->load->library('upload');
	}
	function index(){
		$kode=$this->session->userdata('idadmin');

		$x['brt']=$this->m_destinasi->tampil_destinasi();
		$this->load->view('customers/v_destinasi',$x);
		//redirect('administrator');
	
	}
	public function detail_destinasi(){
		$id=$this->input->post('xid');
		$kode=$this->uri->segment(4);
		$x['brt']=$this->m_destinasi->tampil_destinasi_id($kode);
		$this->load->view('customers/v_detail_destinasi',$x);
		
	}

	public function simpan_pemesanan(){
		$id=strip_tags($this->input->post('xid'));
		$customerorder=$this->session->userdata('idadmin');
		$nama=strip_tags($this->input->post('xnama'));
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

		$stock=strip_tags($this->input->post('xstock'));
		$jlhstock = $stock - $jumlah;
		$this->m_destinasi->update_stock($jlhstock,$id);
		$this->m_destinasi->simpan_pemesanan($id,$nama,$alamat,$email,$notelp,$mulai,$akhir,$metode,$jumlah,$tanggal,$keterangan,$status,$customerorder);
		echo $this->session->set_flashdata('msg','success');
		redirect('customers/destinasi');
	}
}