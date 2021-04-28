<?php
class M_login extends CI_Model{
    function cekadmin($u,$p){
        $hasil=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_email='$u' AND pengguna_password=md5('$p')");
        return $hasil;
    }

}
