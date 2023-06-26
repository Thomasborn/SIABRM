<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyewaModel extends Model
{

    protected $table = 'penyewa';
    protected $primaryKey = 'id_penyewa';
    protected $useTimestamps = true;
    protected $createdField  = 'dibuat_pada';
    protected $updatedField  = 'diubah_pada';
    protected $deletedField  = 'dihapus_pada';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'nama_penyewa', 'alamat_asal', 'alamat_domisili', 'hp_penyewa', 'hp_ortu', 'universitas', 'foto_penyewa', 'status',
    ];

    public function getPenyewa($id = false)
    {
        $query = $this->table('penyewa')->where('dihapus_pada is null');
        if ($id == false)
            return $query->get()->getResultArray();
        return $query->where(['id_penyewa' => $id])->first();
    }

    public function getAllPenyewa()
    {
        $query = $this->table('penyewa')->where('dihapus_pada is null');
        return $query;
    }

    public function pencarian($kunci)
    {
        return $this->table('penyewa')->like('nama_penyewa', $kunci);
    }

    public function getPenyewaAktif()
    {
        $query = $this->table('penyewa')
            ->join('transaksi_sewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'right')
            ->join('pengembalian', 'pengembalian.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
            ->where('penyewa.dihapus_pada', null)
            ->where('pengembalian.tanggal_kembali !=', '')
            ->get()->getResultArray();

        $query2 = $this->table('penyewa')
            ->join('transaksi_sewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
            ->where('transaksi_sewa.id_penyewa', null)
            ->get()->getResultArray();

        $query3 = array_merge($query, $query2);

        return $query3;
    }

    public function penyewaAktif()
    {
        $query = $this->table('penyewa')
            // ->join('transaksi_sewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
            // ->join('pengembalian', 'pengembalian.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'left')
            ->where('dihapus_pada', null)->where('status', 'Y');
        // ->where('pengembalian.tanggal_kembali !=', '');
        return $query;
    }
}
