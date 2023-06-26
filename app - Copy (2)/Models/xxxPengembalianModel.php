<?php

namespace App\Models;

use CodeIgniter\Model;

class PengembalianModel extends Model
{

    protected $table = 'pengembalian';
    protected $primaryKey = 'id_pengembalian';
    // protected $useTimestamps = true;
    // protected $createdField  = 'dibuat_pada';
    // protected $updatedField  = 'diubah_pada';
    // protected $deletedField  = 'dihapus_pada';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_transaksi_sewa', 'id_user', 'tanggal_kembali',
    ];

    public function getPengembalian($id = false)
    {

        $query = $this->table('pengembalian');

        if ($id == false)
            return $query->get()->getResultArray();
        // if ($id != false)
        return $query->where(['id_pengembalian' => $id])->first();
    }
    public function getPengembalianhp($id = false)
    {

        $query = $this->table('pengembalian')
        ->join('users', 'pengembalian.id_user=users.id', 'left')
        ->join('detail_pengembalian', 'pengembalian.id_pengembalian=detail_pengembalian.id_pengembalian', 'left')
        ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa=pengembalian.id_transaksi_sewa', 'right');

        if ($id == false)
            return $query->get()->getResultArray();
        return $query->where(['id_pengembalian' => $id])->first();
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
        return $this->table('pengembalian')
            ->join('users', 'pengembalian.id_user=users.id', 'left')
            ->like('id_pengembalian', $kunci);
    }
}
