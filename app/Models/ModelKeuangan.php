<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKeuangan extends Model
{
    protected $table      = 'tbl_keuangan';
    protected $primaryKey ="id_keuangan";
    protected $useTimestamps = false;
    protected $allowedFields = [ 
        'spp', 
        'ukk', 
        'anbk', 
        'uas', 
        'us', 
        'raport',
        'card',
        'batik',
        'training',
        'pj',
    ];

    public function AllData()
    {
        return $this->db->table('tbl_keuangan')->get()->getResultArray();
    }


    public function UpdateData($data)
    {
        $this->db->table('tbl_keuangan')
        ->where('id_keuangan', $data['id_keuangan'])
        ->update($data);
    }

}
