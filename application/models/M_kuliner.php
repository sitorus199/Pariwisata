<?php
class M_kuliner extends CI_Model{

	function get_all_kuliner(){
		$hsl=$this->db->query("SELECT id,nama_kuliner,keterangan,harga,gambar FROM tbl_kuliner ORDER BY id DESC");
		return $hsl;
	}

	function simpan_kuliner($judul,$keterangan,$harga,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_kuliner (nama_kuliner,keterangan,harga,gambar) VALUES ('$judul','$keterangan','$harga','$photo')");
		return $hsl;
	}
	function simpan_kuliner_tanpa_img($judul,$keterangan,$harga){
		$hsl=$this->db->query("INSERT INTO tbl_kuliner (nama_kuliner,keterangan,harga) VALUES ('$judul','$keterangan','$harga')");
		return $hsl;
	}

	function update_kuliner($kode,$judul,$keterangan,$harga,$photo){
		$hsl=$this->db->query("UPDATE tbl_kuliner SET nama_kuliner='$judul',keterangan='$keterangan',harga='$harga',gambar='$photo' WHERE id='$kode'");
		return $hsl;
	}
	function update_kuliner_tanpa_img($kode,$judul,$keterangan,$harga){
		$hsl=$this->db->query("UPDATE tbl_kuliner SET nama_kuliner='$judul',keterangan='$keterangan',harga='$harga' WHERE id='$kode'");
		return $hsl;
	}

	function hapus_kuliner($kode){
		$hsl=$this->db->query("DELETE FROM tbl_kuliner WHERE id='$kode'");
		return $hsl;
	}

	//Depan

	function tampil_kuliner(){
		$hasil=$this->db->query("select * from tbl_kuliner");
		return $hasil;
	}
}