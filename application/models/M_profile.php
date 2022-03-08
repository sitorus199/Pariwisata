<?php
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
	function get_all_orders_paket(){
		$hsl=$this->db->query("SELECT id,id_paket,nama,alamat,no_telp,email,berangkat,kembali,metode_id,adult,paket_id_order,tanggal,keterangan,status,(harga*adult) AS total,nama_paket FROM tbl_order JOIN tbl_paket_wisata ON id_paket=id_paket_wisata  ORDER BY tanggal DESC");
		return $hsl; 
	}

	function get_all_orders_destinasi(){
		$hsl=$this->db->query("SELECT id,id_paket,nama,alamat,no_telp,email,berangkat,kembali,metode_id,adult,paket_id_order,tanggal,keterangan,status,(harga*adult) AS total,nama_destinasi FROM tbl_order JOIN tbl_destinasi ON id_paket=id_destinasi  ORDER BY tanggal DESC");
		return $hsl; 
	}
	function get_all_orders_akomodasi(){
		$hsl=$this->db->query("SELECT id,id_paket,nama,tbl_order.alamat,no_telp,email,berangkat,kembali,metode_id,adult,paket_id_order,tanggal,keterangan,status,(harga*adult) AS total,nama_akomodasi FROM tbl_order JOIN tbl_akomodasi ON id_paket=id_akomodasi  ORDER BY tanggal DESC");
		return $hsl; 
	}
	function get_all_orders_transportasi(){
		$hsl=$this->db->query("SELECT tbl_order.id,id_paket,nama,tbl_order.alamat,no_telp,email,berangkat,kembali,metode_id,adult,paket_id_order,tanggal,keterangan,status,(harga*adult) AS total,nama_transportasi FROM tbl_order JOIN tbl_transportasi ON id_paket=tbl_transportasi.id  ORDER BY tanggal DESC");
		return $hsl; 
	}

}