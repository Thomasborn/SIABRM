<?php

namespace App\Models;

use CodeIgniter\Model;

class ServisModel extends Model
{

    protected $table = 'servis';
    protected $primaryKey = 'id_servis';
    // protected $useTimestamps = true;
    protected $createdField  = 'dibuat_pada';
    protected $updatedField  = 'diubah_pada';
    protected $deletedField  = 'dihapus_pada';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_servis', 'id_motor', 'nama_bengkel', 'alamat', 'telp', 'tanggal_servis', 'tanggal_selesai'
    ];

    public function getJoinServis()
    {
        $query = $this->table('servis')
            ->select('servis.id_servis,
                        daftar_motor.nama_motor,
                        daftar_motor.no_polisi,
                        servis.nama_bengkel,
                        servis.alamat,
                        servis.telp,
                        servis.tanggal_servis,
                        servis.tanggal_selesai')
            ->join('detail_servis ds', 'ds.id_servis = servis.id_servis', 'left')
            ->join('daftar_motor', 'daftar_motor.id_motor = servis.id_motor')
            ->selectCount('ds.nama_servis')
            ->groupBy('servis.id_servis')
            ->selectSum('ds.harga')
            ->groupBy('servis.id_servis')
            ->orderBy('servis.tanggal_servis', 'DESC')
            ->where('servis.dihapus_pada is null');
        return $query;
    }

    public function getSingleJoinServis($id = false) //ini untuk detail
    {
        $query = $this->table('servis')
            ->join('detail_servis', 'detail_servis.id_servis = servis.id_servis', 'right')
            ->where('servis.dihapus_pada is null');
        if ($id == false)
            return $query->get()->getResultArray();
        return $query->where(['servis.id_servis' => $id])->first();
    }
    public function getser($id = false) //ini untuk detail
    {
        $query = $this->table('servis')
            ->join('detail_servis', 'detail_servis.id_servis = servis.id_servis', 'right')
            ->join('daftar_motor', 'daftar_motor.id_motor = servis.id_motor', 'left')
            ->where('servis.dihapus_pada is null');
        if ($id == false)
            return $query->get()->getResultArray();
        return $query->where(['servis.id_servis' => $id])->first();
    }
    public function getid() //ini untuk ambil data id servis terbaru
    {
        $query = $this->table('servis')
            
            ->select('max(id_servis)');
        // if ($id == false)
            return $query->get()->getResultArray();
        // return $query->where(['servis.id_servis' => $id])->first();
    }

    public function pencarian($kunci) //untuk search di index
    {
        $query = $this->table('servis')
            ->select('servis.*')
            ->select('detail_servis.*')
            ->join('detail_servis', 'detail_servis.id_servis = servis.id_servis', 'left')
            ->selectSum('detail_servis.harga')
            ->groupBy('servis.id_servis')
            ->orderBy('servis.tanggal_servis', 'DESC')
            ->where('servis.dihapus_pada is null')
            ->where('servis.id_servis', $kunci);
        return $query;
    }
}
