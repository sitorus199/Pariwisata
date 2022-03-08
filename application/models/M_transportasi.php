<?php
class M_transportasi extends CI_Model{

	function get_all_transportasi(){
		$hsl=$this->db->query("SELECT id,nama_transportasi,alamat,deskripsi,harga,stock,gambar FROM tbl_transportasi ORDER BY id DESC");
		return $hsl;
	}

	function simpan_transportasi($judul,$alamat,$deskripsi,$harga,$stock,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_transportasi (nama_transportasi,alamat,deskripsi,harga,stock,gambar) VALUES ('$judul','$alamat','$deskripsi','$harga','$stock','$photo')");
		return $hsl;
	}
	function simpan_transportasi_tanpa_img($judul,$alamat,$deskripsi,$harga,$stock){
		$hsl=$this->db->query("INSERT INTO tbl_transportasi (nama_transportasi,alamat,deskripsi,harga,stock) VALUES ('$judul','$alamat','$deskripsi','$harga','$stock')");
		return $hsl;
	}

	function update_transportasi($kode,$judul,$alamat,$deskripsi,$harga,$stock,$photo){
		$hsl=$this->db->query("UPDATE tbl_transportasi SET nama_transportasi='$judul',alamat='$alamat',deskripsi='$deskripsi',harga='$harga',stock='$stock',gambar='$photo' WHERE id='$kode'");
		return $hsl;
	}
	function update_transportasi_tanpa_img($kode,$judul,$alamat,$deskripsi,$harga,$stock){
		$hsl=$this->db->query("UPDATE tbl_transportasi SET nama_transportasi='$judul',alamat='$alamat',deskripsi='$deskripsi',harga='$harga',stock='$stock' WHERE id='$kode'");
		return $hsl;
	}

	function hapus_transportasi($kode){
		$hsl=$this->db->query("DELETE FROM tbl_transportasi WHERE id='$kode'");
		return $hsl;
	}

	function tampil_transportasi(){
		$hasil=$this->db->query("select * from tbl_transportasi");
		return $hasil;
	}


}