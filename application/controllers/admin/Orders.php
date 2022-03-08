<?php
class Orders extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_orders');
		$this->load->library('upload');
	}

	function index(){
		$x['data']=$this->m_orders->get_all_orders_paket();
        $x['datadestinasi']=$this->m_orders->get_all_orders_destinasi();
        $x['dataakomodasi']=$this->m_orders->get_all_orders_akomodasi();
        $x['datatransportasi']=$this->m_orders->get_all_orders_transportasi();
		$this->load->view('admin/v_orders',$x);
	}

	function pembayaran_selesai(){
        $id=$this->uri->segment(4);
        $this->m_orders->bayar_selesai($id);
        echo $this->session->set_flashdata('msg','success');
        redirect('admin/orders');
    }

    function edit_orders(){
        $kode=$this->input->post('kode');
        $adult=$this->input->post('adult');
        $this->m_orders->edit_orders($kode,$adult);
        echo $this->session->set_flashdata('msg','info');
        redirect('admin/orders');
    }
    function hapus_orders(){
        $kode=$this->input->post('kode');
        $this->m_orders->hapus_orders($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('admin/orders');
    }
}