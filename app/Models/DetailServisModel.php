<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailServisModel extends Model
{

    protected $table = 'detail_servis';
    protected $primaryKey = 'id_detail_servis';
    protected $useTimestamps = true;
    protected $createdField  = 'dibuat_pada';
    protected $updatedField  = 'diubah_pada';
    protected $deletedField  = 'dihapus_pada';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_detail_servis', 'id_servis', 'nama_servis', 'harga', 'keterangan'
    ];

    public function getSingleJoinServis($id = false) //ini untuk detail
    {
        $query = $this->table('detail_servis')
            ->join('servis', 'detail_servis.id_servis = servis.id_servis', 'left')
            ->where('servis.dihapus_pada is null');
        if ($id == false)
            return $query->get()->getResultArray();
        return $query->where(['servis.id_servis' => $id])->get()->getResultArray();
    }

    // public function getJoinServis() //ini untuk index
    // {
    //     $query = $this->table('servis')
    //         ->select('servis.*')
    //         ->select('detail_servis.*')
    //         ->join('detail_servis', 'detail_servis.id_servis = servis.id_servis', 'left')
    //         ->selectSum('detail_servis.harga')
    //         ->groupBy('servis.id_servis')
    //         ->orderBy('servis.tanggal_servis', 'DESC')
    //         ->where('servis.dihapus_pada is null');
    //     // return $query->get()->getResultArray();
    //     return $query;
    // }

    // public function pencarian($kunci)
    // {
    //     $query = $this->table('servis')
    //         ->select('servis.*')
    //         ->select('detail_servis.*')
    //         ->join('detail_servis', 'detail_servis.id_servis = servis.id_servis', 'left')
    //         ->selectSum('detail_servis.harga')
    //         ->groupBy('servis.id_servis')
    //         ->orderBy('servis.tanggal_servis', 'DESC')
    //         ->where('servis.dihapus_pada is null')
    //         ->where('servis.id_servis', $kunci);
    //     return $query;
    // }
}
