<?php
    function GuruLogin(){
        $db = \Config\Database::connect();
        return $db->table('tbl_guru')->where('id_guru', session('id_guru'))->get()->getRow();
    }

    function SiswaLogin(){
        $db = \Config\Database::connect();
        return $db->table('tbl_siswa')->where('id_siswa', session('id_siswa'))->get()->getRow();
    }

?>