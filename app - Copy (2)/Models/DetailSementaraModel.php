<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailSementaraModel extends Model
{

    protected $table = 'detail';
    protected $primaryKey = 'rowid';
    // protected $useTimestamps = true;
    // protected $createdField  = 'dibuat_pada';
    // protected $updatedField  = 'diubah_pada';
    // protected $deletedField  = 'dihapus_pada';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'nama_kerusakan', 'id_pengembalian', 'denda', 'keterangan'
    ];

    public function getPengembalian()
    {

        $query = $this->table('detail');

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
    public function getdenda()
    {

        $query = $this->table('detail_pengembalian')
            ->join('pengembalian', 'pengembalian.id_pengembalian=detail_pengembalian.id_pengembalian', 'inner')
            ->selectsum('detail_pengembalian.denda')
            ->select('pengembalian.id_pengembalian')
            ->groupby('pengembalian.id_pengembalian');
        return $query->get()->getResultArray();
        // return $query->where(['id_pengembalian' => $id])->first();
    }
    public function getuPengembalian()
    {
        $query = $this->table('pengembalian')->join('users', 'pengembalian.id_user=users.id', 'left');
        // if ($id == false)
        return $query;
        // return $query->where(['plat' => $plat])->first();
    }

    public function pencarian($kunci)
    {
        return $this->table('pengembalian')->join('users', 'pengembalian.id_user=users.id', 'left')->like('id_pengembalian', $kunci);
    }

    public function truncateDetail()
    {
        $this->table('detail')->truncate('detail');
    }
}
