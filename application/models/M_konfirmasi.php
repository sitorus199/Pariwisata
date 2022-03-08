<?php
class M_konfirmasi extends CI_Model{

	function get_all_konfirmasi(){
		$hsl=$this->db->query("SELECT * FROM tbl_pembayaran JOIN tbl_order ON order_id = id WHERE status<>'LUNAS'");
		return $hsl;
	}
	function bayar_selesai($id){
        $hasil=$this->db->query("UPDATE tbl_order SET status='LUNAS' WHERE id='$id'");
        return $hasil;
    }


	function hapus_bayar($kode){
        $hasil=$this->db->query("DELETE from tbl_pembayaran WHERE id_bayar='$kode'");
        return $hasil;
    }
}