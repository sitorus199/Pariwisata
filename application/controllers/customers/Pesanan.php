<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
class Pesanan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_pengguna');
        $this->load->model('m_orders');
        $this->load->model('m_profile');
		$this->load->library('upload');
	}

    function index(){
        $kode=$this->session->userdata('idadmin');
        
        $x['data']=$this->m_orders->get_all_orders_paket1();

        // var_dump($x);
        // die();
        $x['datadestinasi']=$this->m_orders->get_all_orders_destinasi1();
        $x['dataakomodasi']=$this->m_orders->get_all_orders_akomodasi1();
        $x['datatransportasi']=$this->m_orders->get_all_orders_transportasi1();
        

        $x['user']=$this->m_pengguna->get_pengguna_login($kode);
        $x['user'] = $this->db->get_where('tbl_pengguna',['pengguna_id' => $this->session->userdata('idadmin')])->row_array();
        // echo 'Pengguna ' . $x['user']['pengguna_email'] . '!!';
        $this->load->view('customers/v_pesanan',$x);
            //redirect('administrator');
    
    }
    function pesan(){
        $id=$this->uri->segment(4);
        $this->m_orders->pesan_selesai($id);
        echo $this->session->set_flashdata('msg','success');
        redirect('customers/profile');
    }
    

    function edit_orders(){
        $kode=$this->input->post('kode');
        $jumlah=strip_tags(str_replace("'", "",$this->input->post('xjumlah')));
        $this->m_orders->edit_orders($kode,$jumlah);
        echo $this->session->set_flashdata('msg','success-update');
        redirect('customers/pesanan');
    }
}