<?php
class M_paketwisata extends CI_Model{

	function get_all_paketwisata(){
		$hsl=$this->db->query("SELECT id_paket_wisata,nama_paket,transportasi,akomodasi,destinasi,durasi,deskripsi,lokasi,harga,fasilitas,gambar,date FROM tbl_paket_wisata ORDER BY id_paket_wisata DESC");
		return $hsl;
	}
	function simpan_paketwisata($judul,$transportasi,$akomodasi,$destinasi,$durasi,$deskripsi,$lokasi,$harga,$fasilitas,$photo,$date){
		$hsl=$this->db->query("INSERT INTO tbl_paket_wisata (nama_paket,transportasi,akomodasi,destinasi,durasi,deskripsi,lokasi,harga,fasilitas,gambar,date) VALUES ('$judul','$transportasi','$akomodasi','$destinasi','$durasi','$deskripsi','$lokasi','$harga','$fasilitas','$photo','$date')");
		return $hsl;
	}
	function simpan_paketwisata_tanpa_img($judul,$transportasi,$akomodasi,$destinasi,$durasi,$deskripsi,$lokasi,$harga,$fasilitas,$date){
		$hsl=$this->db->query("INSERT INTO tbl_paket_wisata (nama_paket,transportasi,akomodasi,destinasi,durasi,deskripsi,lokasi,harga,fasilitas,date) VALUES ('$judul','$transportasi','$akomodasi','$destinasi','$durasi','$deskripsi','$lokasi','$harga','$fasilitas','$date')");
		return $hsl;
	}

	function update_paketwisata($kode,$judul,$transportasi,$akomodasi,$destinasi,$durasi,$deskripsi,$lokasi,$harga,$fasilitas,$photo,$date){
		$hsl=$this->db->query("UPDATE tbl_paket_wisata SET nama_paket='$judul',transportasi='$transportasi',akomodasi='$akomodasi',destinasi='$destinasi',durasi='$durasi',deskripsi='$deskripsi',lokasi='$lokasi',harga='$harga',fasilitas='$fasilitas',gambar='$photo',date='$date' WHERE id_paket_wisata='$kode'");
		return $hsl;
	}
	function update_paketwisata_tanpa_img($kode,$judul,$transportasi,$akomodasi,$destinasi,$durasi,$deskripsi,$lokasi,$harga,$fasilitas,$date){
		$hsl=$this->db->query("UPDATE tbl_paket_wisata SET nama_paket='$judul',transportasi='$transportasi',akomodasi='$akomodasi',destinasi='$destinasi',durasi='$durasi',deskripsi='$deskripsi',lokasi='$lokasi',harga='$harga',fasilitas='$fasilitas',date='$date' WHERE id_paket_wisata='$kode'");
		return $hsl;
	}
	function tampil_paketwisata(){
		$hasil=$this->db->query("select * from tbl_paket_wisata");
		return $hasil;
	}


	function hapus_paketwisata($kode){
		$hsl=$this->db->query("DELETE FROM tbl_paket_wisata WHERE id_paket_wisata='$kode'");
		return $hsl;
	}
}