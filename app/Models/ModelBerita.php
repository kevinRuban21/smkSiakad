<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBerita extends Model
{
    protected $table = 'tbl_berita';

    public function AllData()
    {
        return $this->db->table('tbl_berita')->get()->getResultArray();
    }

    public function AllDataLimit()
    {
        return $this->db->table('tbl_berita')
            ->limit(10)
            ->orderBy('id_berita', 'DESC')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_berita')->insert($data);
    }

    public function DetailData($id_berita)
    {
        return $this->db->table('tbl_berita')->where('id_berita', $id_berita)->get()->getRowArray();
    }

    public function ViewBerita($slug_berita){
        return $this->db->table('tbl_berita')
            ->join('tbl_user', 'tbl_user.id_user=tbl_berita.id_user', 'LEFT')
            ->where('slug_berita', $slug_berita)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_berita')->where('id_berita', $data['id_berita'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_berita')->where('id_berita', $data['id_berita'])->delete($data);
    }
}
