<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function LoginUser($username, $password)
    {
        return $this->db->table('tbl_user')
            ->where('username', $username)
            ->where('password', $password)
            ->get()->getRowArray();
    }

    public function LoginGuru($username, $password)
    {
        return $this->db->table('tbl_guru')
            ->where('nama_guru', $username)
            ->where('password', $password)
            ->get()->getRowArray();
    }

    public function LoginSiswa($username, $password)
    {
        return $this->db->table('tbl_siswa')
            ->where('nama_siswa', $username)
            ->where('password', $password)
            ->get()->getRowArray();
    }
}
