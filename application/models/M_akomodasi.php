<?php
class M_akomodasi extends CI_Model{

	function get_all_akomodasi(){
		$hsl=$this->db->query("SELECT id_akomodasi,nama_akomodasi,deskripsi,alamat,fasilitas,harga,stock,gambar FROM tbl_akomodasi ORDER BY id_akomodasi DESC");
		return $hsl;
	}

	function simpan_akomodasi($judul,$deskripsi,$alamat,$fasilitas,$harga,$stock,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_akomodasi (nama_akomodasi,deskripsi,alamat,fasilitas,harga,stock,gambar) VALUES ('$judul','$deskripsi','$alamat','$fasilitas','$harga','$stock','$photo')");
		return $hsl;
	}
	function simpan_akomodasi_tanpa_img($judul,$deskripsi,$alamat,$fasilitas,$harga,$stock){
		$hsl=$this->db->query("INSERT INTO tbl_akomodasi (nama_akomodasi,deskripsi,alamat,fasilitas,harga,stock) VALUES ('$judul','$deskripsi','$alamat','$fasilitas','$harga','$stock')");
		return $hsl;
	}

	function update_akomodasi($kode,$judul,$deskripsi,$alamat,$fasilitas,$harga,$stock,$photo){
		$hsl=$this->db->query("UPDATE tbl_akomodasi SET nama_akomodasi='$judul',deskripsi='$deskripsi',alamat='$alamat',fasilitas='$fasilitas',harga='$harga',stock='$stock',gambar='$photo' WHERE id_akomodasi='$kode'");
		return $hsl;
	}
	function update_akomodasi_tanpa_img($kode,$judul,$deskripsi,$alamat,$fasilitas,$harga,$stock){
		$hsl=$this->db->query("UPDATE tbl_akomodasi SET nama_akomodasi='$judul',deskripsi='$deskripsi',alamat='$alamat',fasilitas='$fasilitas',harga='$harga',stock='$stock' WHERE id_akomodasi='$kode'");
		return $hsl;
	}

	function hapus_akomodasi($kode){
		$hsl=$this->db->query("DELETE FROM tbl_akomodasi WHERE id_akomodasi='$kode'");
		return $hsl;
	}

	function update_stock($jlhstock,$id){
		$hsl=$this->db->query("UPDATE tbl_akomodasi SET stock='$jlhstock' WHERE id_destinasi='$id'");
		return $hsl;
	}


	function tampil_akomodasi(){
		$hasil=$this->db->query("select * from tbl_akomodasi");
		return $hasil;
	}
}