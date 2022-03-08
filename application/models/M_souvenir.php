<?php
class M_souvenir extends CI_Model{

	function get_all_souvenir(){
		$hsl=$this->db->query("SELECT id,nama_souvenir,ket_buka,ket_tutup,keterangan,gambar FROM tbl_souvenir ORDER BY id DESC");
		return $hsl;
	}

	function simpan_souvenir($judul,$buka,$tutup,$keterangan,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_souvenir (nama_souvenir,ket_buka,ket_tutup,keterangan,gambar) VALUES ('$judul','$buka','$tutup','$keterangan','$photo')");
		return $hsl;
	}
	function simpan_souvenir_tanpa_img($judul,$buka,$tutup,$keterangan){
		$hsl=$this->db->query("INSERT INTO tbl_souvenir (nama_souvenir,ket_buka,ket_tutup,keterangan) VALUES ('$judul','$buka','$tutup','$keterangan')");
		return $hsl;
	}

	function update_souvenir($kode,$judul,$buka,$tutup,$keterangan,$photo){
		$hsl=$this->db->query("UPDATE tbl_souvenir SET nama_souvenir='$judul',ket_buka='$buka',ket_tutup='$tutup',keterangan='$keterangan',gambar='$photo' WHERE id='$kode'");
		return $hsl;
	}
	function update_souvenir_tanpa_img($kode,$judul,$buka,$tutup,$keterangan){
		$hsl=$this->db->query("UPDATE tbl_souvenir SET nama_souvenir='$judul',ket_buka='$buka',ket_tutup='$tutup',keterangan='$keterangan' WHERE id='$kode'");
		return $hsl;
	}

	function hapus_souvenir($kode){
		$hsl=$this->db->query("DELETE FROM tbl_souvenir WHERE id='$kode'");
		return $hsl;
	}

	//Depan

	function tampil_souvenir(){
		$hasil=$this->db->query("select * from tbl_souvenir");
		return $hasil;
	}
}