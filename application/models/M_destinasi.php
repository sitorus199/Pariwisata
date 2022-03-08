	<?php
class M_destinasi extends CI_Model{

	//Belakang 

	function get_all_destinasi(){
		$hsl=$this->db->query("SELECT id_destinasi,nama_destinasi,deskripsi,alamat_destinasi,harga,stock,gambar,fasilitas FROM tbl_destinasi ORDER BY id_destinasi DESC");
		return $hsl;
	}
	function simpan_destinasi($judul,$deskripsi,$alamat,$harga,$stock,$photo,$fasilitas){
		$hsl=$this->db->query("INSERT INTO tbl_destinasi (nama_destinasi,deskripsi,alamat_destinasi,harga,stock,gambar,fasilitas) VALUES ('$judul','$deskripsi','$alamat','$harga','$stock','$photo','$fasilitas')");
		return $hsl;
	}
	function simpan_destinasi_tanpa_img($judul,$deskripsi,$alamat,$harga,$stock,$fasilitas){
		$hsl=$this->db->query("INSERT INTO tbl_destinasi (nama_destinasi,deskripsi,alamat_destinasi,harga,stock,fasilitas) VALUES ('$judul','$deskripsi','$alamat','$harga','$stock','$fasilitas')");
		return $hsl;
	}
	function update_destinasi($kode,$judul,$deskripsi,$alamat,$harga,$stock,$photo,$fasilitas){
		$hsl=$this->db->query("UPDATE tbl_destinasi SET nama_destinasi='$judul',deskripsi='$deskripsi',alamat_destinasi='$alamat',harga='$harga',stock='$stock',gambar='$photo',fasilitas='$fasilitas' WHERE id_destinasi='$kode'");
		return $hsl;
	}
	function update_destinasi_tanpa_img($kode,$judul,$deskripsi,$alamat,$harga,$stock,$fasilitas){
		$hsl=$this->db->query("UPDATE tbl_destinasi SET nama_destinasi='$judul',deskripsi='$deskripsi',alamat_destinasi='$alamat',harga='$harga',stock='$stock',fasilitas='$fasilitas' WHERE id_destinasi='$kode'");
		return $hsl;
	}
	function hapus_destinasi($kode){
		$hsl=$this->db->query("DELETE FROM tbl_destinasi WHERE id_destinasi='$kode'");
		return $hsl;
	}

	//Tengah

	function update_stock($jlhstock,$id){
		$hsl=$this->db->query("UPDATE tbl_destinasi SET stock='$jlhstock' WHERE id_destinasi='$id'");
		return $hsl;
	}

	function simpan_pemesanan($id,$nama,$alamat,$email,$notelp,$mulai,$akhir,$metode,$jumlah,$tanggal,$keterangan,$status,$customerorder){
		$hsl=$this->db->query("INSERT INTO tbl_order(id_paket,nama,alamat,no_telp,email,berangkat,kembali,metode_id,adult,paket_id_order,tanggal,keterangan,status,customer_order) VALUES ('$id','$nama','$alamat','$notelp','$email','$mulai','$akhir','$metode','$jumlah','$id','$tanggal','$keterangan','$status','$customerorder')");
		return $hsl;
	}

	//Depan

	function tampil_destinasi(){
		$hasil=$this->db->query("select * from tbl_destinasi");
		return $hasil;
	}

	function tampil_destinasi_id($id){
		$hasil=$this->db->query("select * from tbl_destinasi where id_destinasi='$id'");
		return $hasil;
	}

}