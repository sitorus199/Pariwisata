<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_profile extends CI_Model{

	function update_pengguna($kode,$nama,$moto,$jenkel,$tentang,$email,$nohp,$gambar){
		$hsl=$this->db->query("UPDATE tbl_pengguna set pengguna_nama='$nama',pengguna_moto='$moto',pengguna_jenkel='$jenkel',pengguna_tentang='$tentang',pengguna_email='$email',pengguna_nohp='$nohp',pengguna_photo='$gambar' where pengguna_id='$kode'");
		return $hsl;
	}
	function update_pengguna_tanpa_gambar($kode,$nama,$moto,$jenkel,$tentang,$email,$nohp){
		$hsl=$this->db->query("UPDATE tbl_pengguna set pengguna_nama='$nama',pengguna_moto='$moto',pengguna_jenkel='$jenkel',pengguna_tentang='$tentang',pengguna_email='$email',pengguna_nohp='$nohp' where pengguna_id='$kode'");
		return $hsl;
	}

	
	//customers
	function get_all_orders_paket2($kode){
		$hsl=$this->db->query("SELECT id,id_paket,nama,alamat,no_telp,email,berangkat,kembali,metode_id,adult,paket_id_order,tanggal,keterangan,status,(adult) AS total FROM tbl_order
			JOIN tbl_pengguna WHERE tbl_order.customer_order= '$kode' ORDER BY tanggal DESC");
			return $hsl;
		//return $hsl = $this->db->get_where('tbl_order',array('customer_order' => $kode))->row();
	}
	function get_all_orders_paket(){
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->join('tbl_paket_wisata','tbl_order.paket_id_order=tbl_paket_wisata.id_paket_wisata');
		$this->db->where('tbl_order.customer_order', $this->session->userdata('idadmin') 	);
		$this->db->where('status','PESAN');
		$this->db->or_where('status','KONFIRMASI');

		return $this->db->get('')->result();
	}
	function get_all_orders_destinasi(){
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->join('tbl_destinasi','tbl_order.paket_id_order=tbl_destinasi.id_destinasi');
		$this->db->where('tbl_order.customer_order', $this->session->userdata('idadmin') 	);
		$this->db->where('status','PESAN');
		$this->db->or_where('status','KONFIRMASI');
		$this->db->or_where('status','LUNAS');

		return $this->db->get('')->result();
	}
	function get_all_orders_akomodasi(){
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->join('tbl_akomodasi','tbl_order.paket_id_order=tbl_akomodasi.id_akomodasi');
		$this->db->where('tbl_order.customer_order', $this->session->userdata('idadmin') 	);

		return $this->db->get('')->result();
	}
	function get_all_orders_transportasi(){
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->join('tbl_transportasi','tbl_order.paket_id_order=tbl_transportasi.id');
		$this->db->where('tbl_order.customer_order', $this->session->userdata('idadmin') 	);

		return $this->db->get('')->result();
	}

	// function get_all_orders_destinasi(){
	// 	$hsl=$this->db->query("SELECT id,id_paket,nama,alamat,no_telp,email,berangkat,kembali,metode_id,adult,paket_id_order,tanggal,keterangan,status,(harga*adult) AS total,nama_destinasi FROM tbl_order 
	// 		JOIN tbl_destinasi ON id_paket=id_destinasi 
	// 		JOIN tbl_pengguna ON tbl_order.customer_order=pengguna_id ORDER BY tanggal DESC");
	// 	return $hsl; 
	// }
	// function get_all_orders_akomodasi(){
	// 	$hsl=$this->db->query("SELECT id,id_paket,nama,tbl_order.alamat,no_telp,email,berangkat,kembali,metode_id,adult,paket_id_order,tanggal,keterangan,status,(harga*adult) AS total,nama_akomodasi FROM tbl_order 
	// 		JOIN tbl_akomodasi ON id_paket=id_akomodasi 
	// 		JOIN tbl_pengguna ON tbl_order.customer_order=pengguna_id  ORDER BY tanggal DESC");
	// 	return $hsl; 
	// }
	// function get_all_orders_transportasi(){
	// 	$hsl=$this->db->query("SELECT tbl_order.id,id_paket,nama,tbl_order.alamat,no_telp,email,berangkat,kembali,metode_id,adult,paket_id_order,tanggal,keterangan,status,(harga*adult) AS total,nama_transportasi FROM tbl_order 
	// 		JOIN tbl_transportasi ON id_paket=tbl_transportasi.id 
	// 		JOIN tbl_pengguna ON tbl_order.customer_order=pengguna_id  ORDER BY tanggal DESC");
	// 	return $hsl; 
	// }

}