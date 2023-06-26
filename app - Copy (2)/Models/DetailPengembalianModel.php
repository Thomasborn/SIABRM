<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\RawSql;

class DetailPengembalianModel extends Model
{

    protected $table = 'detail_pengembalian';
    protected $primaryKey = 'id_pengembalian';
    // protected $useTimestamps = true;
    // protected $createdField  = 'dibuat_pada';
    // protected $updatedField  = 'diubah_pada';
    // protected $deletedField  = 'dihapus_pada';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'nama_kerusakan', 'id_pengembalian', 'denda', 'keterangan'
    ];

    public function getJoinDetailPengembalian()
    {
        $query = $this->table('detail_pengembalian')
            ->join('pengembalian', 'pengembalian.id_pengembalian = detail_pengembalian.id_pengembalian', 'right');
        return $query;
    }

    public function getDetailPengembalian($id)
    {
        $query = $this->table('detail_pengembalian')
            ->where('id_pengembalian', $id);
        return $query;
    }

    public function getPengembalian($id = false)
    {
        $query = $this->table('pengembalian');
        if ($id == false)
            return $query->get()->getResultArray();
        return $query->where(['id_pengembalian' => $id])->get()->getResultArray();
    }

    public function getTotalDenda($id)
    {
        $query = $this->table('detail_pengembalian')
            ->selectSum('denda')
            ->where('id_pengembalian', $id);
        return $query->first();
    }
}
