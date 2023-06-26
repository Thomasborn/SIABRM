<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailServisModelTemproray extends Model
{

    protected $table = 'detail_servis_temporary';
    protected $primaryKey = 'rowid';
    // protected $useTimestamps = true;
    // protected $createdField  = 'dibuat_pada';
    // protected $updatedField  = 'diubah_pada';
    // protected $deletedField  = 'dihapus_pada';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
       'id_servis', 'nama_servis', 'harga', 'keterangan'
    ];

    // public function getSingleJoinServis($id = false) //ini untuk detail
    // {
    //     $query = $this->table('servis')
    //         ->join('detail_servis', 'detail_servis.id_servis = servis.id_servis', 'right')
    //         ->where('servis.dihapus_pada is null');
    //     if ($id == false)
    //         return $query->get()->getResultArray();
    //     return $query->where(['servis.id_servis' => $id])->first();
    // }

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
    public function getdetail()
    {

        $query = $this->table('detail_servis_temporary');

        // if ($id == false)
        return $query->get()->getResultArray();
        // if ($id != false)
        // return $query->where(['id_pengembalian' => $id])->first();
    }
    public function getdelete($id)
    {

        $query = $this->table('detail')->where(['rowid', $id]);

        // if ($id == false)
        // return $query->get()->getResultArray();
        // if ($id != false)
        $query->delete();
    }
}
