<?php
class Konfirmasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_konfirmasi');
        $this->load->model('m_orders');
		$this->load->library('upload');
	}

	function index(){
		$x['data']=$this->m_konfirmasi->get_all_konfirmasi();
		$this->load->view('admin/v_konfirmasi',$x);
	}
	function pembayaran_selesai(){
        $id=$this->input->post('kode');
        $this->m_konfirmasi->bayar_selesai($id);
        echo $this->session->set_flashdata('msg','success');
        redirect('admin/orders');
    }
    function hapus_konfirmasi(){
        $kode=$this->input->post('kode');
        $this->m_konfirmasi->hapus_bayar($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('admin/konfirmasi');
    }
}