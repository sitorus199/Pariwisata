<?php
class Destinasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_paketwisata');
		$this->load->model('m_destinasi'); 
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
		$this->load->model('m_tulisan');
	}
	function index(){
		$x['brt']=$this->m_destinasi->tampil_destinasi();
		//$x['berita']=$this->m_tulisan->get_berita_home();
		$x['berita']=$this->m_paketwisata->tampil_paketwisata();
		$x['tot_guru']=$this->db->get('tbl_guru')->num_rows();
		$x['tot_siswa']=$this->db->get('tbl_siswa')->num_rows();
		$x['tot_files']=$this->db->get('tbl_files')->num_rows();
		$x['tot_agenda']=$this->db->get('tbl_agenda')->num_rows();
		$this->load->view('depan/v_destinasi',$x);
	}
}
