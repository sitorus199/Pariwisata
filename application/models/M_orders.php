<?php
class M_orders extends CI_Model{

	function get_all_orders_paket(){
		$hsl=$this->db->query("SELECT id,id_paket,nama,alamat,no_telp,email,berangkat,kembali,metode_id,adult,paket_id_order,tanggal,keterangan,status,(harga*adult) AS total FROM tbl_order JOIN tbl_paket_wisata ON paket_id_order=id_paket_wisata ORDER BY tanggal DESC");
		return $hsl;
	}

    function get_all_orders_destinasi(){
        $hsl=$this->db->query("SELECT id,id_paket,nama,alamat,no_telp,email,berangkat,kembali,metode_id,adult,paket_id_order,tanggal,keterangan,status,(harga*adult) AS total FROM tbl_order JOIN tbl_destinasi ON paket_id_order=id_destinasi ORDER BY tanggal DESC");
        return $hsl;
    }
    function get_all_orders_akomodasi(){
        $hsl=$this->db->query("SELECT id,id_paket,nama,tbl_order.alamat,no_telp,email,berangkat,kembali,metode_id,adult,paket_id_order,tanggal,keterangan,status,(harga*adult) AS total FROM tbl_order JOIN tbl_akomodasi ON paket_id_order=id_akomodasi ORDER BY tanggal DESC");
        return $hsl;
    }
    function get_all_orders_transportasi(){
        $hsl=$this->db->query("SELECT tbl_order.id,id_paket,nama,tbl_order.alamat,no_telp,email,berangkat,kembali,metode_id,adult,paket_id_order,tanggal,keterangan,status,(harga*adult) AS total FROM tbl_order JOIN tbl_transportasi ON paket_id_order=tbl_transportasi.id ORDER BY tanggal DESC");
        return $hsl;
    }

	function bayar_selesai($id){
        $hasil=$this->db->query("UPDATE tbl_order SET status='LUNAS' WHERE id='$id'");
        return $hasil;
    }
    function konfirmasi_selesai($id){
        $hasil=$this->db->query("UPDATE tbl_order SET status='KONFIRMASI' WHERE id='$id'");
        return $hasil;
    }

    function edit_orders($kode,$adult){
        $hasil=$this->db->query("UPDATE tbl_order SET adult='$adult' WHERE id='$kode'");
        return $hasil;
    }
    function hapus_orders($kode){
        $hasil=$this->db->query("DELETE from tbl_order WHERE id='$kode'");
        return $hasil;
    }

    function simpan_bukti($noinvoice,$nama,$tgl_bayar,$jumlah,$gambar){
        $hsl=$this->db->query("INSERT INTO tbl_pembayaran(tgl_bayar,order_id,jumlah,pengirim,bukti_bayar)VALUES('$tgl_bayar','$noinvoice','$jumlah','$nama','$gambar') ");
        return $hsl;
    }

    function cek_invoice($kode){
        $hasil=$this->db->query("SELECT * FROM tbl_order WHERE id_paket='$kode'");
        return $hasil;
    }




	function get_orderss(){
        $hasil=$this->db->query("SELECT id_order,tanggal,nama_paket,hrg_dewasa,hrg_anak,adult,kids,SUM(adult+kids)AS jml_berangkat,(hrg_dewasa*adult) AS sub_dewasa,(hrg_anak*kids)AS sub_anak,SUM((hrg_dewasa*adult)+(hrg_anak*kids))AS total,berangkat,kembali,metode,bank,norek,atasnama,nama,IF(jenkel='L','Laki-Laki','Perempuan')AS jenkel,alamat,notelp,email,keterangan,status FROM orders JOIN metode_bayar ON metode_id=id_metode JOIN paket ON paket_id_order=idpaket GROUP BY id_order order by tanggal desc");
        return $hasil;
    }

    function get_all_destinasis(){
		$hsl=$this->db->query("SELECT id,nama_destinasi,deskripsi,alamat_destinasi,harga,stock,gambar,fasilitas FROM tbl_destinasi ORDER BY id DESC");
		return $hsl;
	}

}