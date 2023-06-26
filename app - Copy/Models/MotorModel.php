<?php

namespace App\Models;

use CodeIgniter\Model;

class MotorModel extends Model
{

    protected $table = 'daftar_motor';
    protected $primaryKey = 'id_motor';
    protected $useTimestamps = true;
    protected $createdField  = 'dibuat_pada';
    protected $updatedField  = 'diubah_pada';
    protected $deletedField  = 'dihapus_pada';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'nama_motor', 'merk', 'warna', 'no_polisi', 'plat', 'status_motor', 'gambar', 'harga_sewa'
    ];

    public function getmotor($plat = false)
    {
        $query = $this->table('daftar_motor')->where('dihapus_pada is null');
        if ($plat == false)
            return $query;
        return $query->where(['plat' => $plat])->first();
    }public function searchMotor($key)
    {
        $query = $this->table('daftar_motor')
            ->havingLike('id_motor', $key)
            ->orHavingLike('nama_motor', $key)
            ->orHavingLike('merk', $key)
            ->orHavingLike('warna', $key)
            ->orHavingLike('no_polisi', $key)
            ->orHavingLike('status_motor', $key)
            ->orHavingLike('harga_sewa', $key)
            ->where('dihapus_pada', null);
        return $query;
    }
    public function getmotorobject($plat = false)
    {
        $query = $this->table('daftar_motor')->where('dihapus_pada is null');
        if ($plat == false)
            return $query;
        return $query->where(['plat' => $plat])->first();
    }
    public function getAllMotor()
    {
        $query = $this->table('daftar_motor')
            ->where('dihapus_pada', null);
        return $query;
    }

    public function pencarian($kunci)
    {
        return $this->table('daftar_motor')->like('nama_motor', $kunci);
    }

    public function pencarianAktif($kunci)
    {
        return $this->table('daftar_motor')
            ->where('dihapus_pada', null)
            ->where('status_motor', 'Tersedia')
            ->like('nama_motor', $kunci);
    }

    public function motorAktif()
    {
        $query = $this->table('daftar_motor')
            ->where('dihapus_pada', null)
            ->where('status_motor', 'Tersedia');
        return $query;
    }
}
