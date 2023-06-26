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
    public function cariPengembalian($kunci = false)
    {
        $query = $this->table('pengembalian')
            ->join('users', 'users.id = pengembalian.id_user', 'left')
            ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa = pengembalian.id_transaksi_sewa', 'left')
            ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa = id_motor', 'right')
            ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'right')
            ->where('pengembalian.dihapus_pada', null);

        if ($kunci == false) {
            return $query->get()->getResultArray();
        } else {
            $query->like('penyewa.nama_penyewa', $kunci)
                ->orLike('daftar_motor.no_polisi', $kunci)
                ->orLike('daftar_motor.nama_motor', $kunci);
            return $query;
        }
    }

    public function getJoinPengembalian()
    {
        $query = $this->table('pengembalian')
            ->join('users', 'users.id = pengembalian.id_user', 'left')
            ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa = pengembalian.id_transaksi_sewa', 'left')
            ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'right')
            ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'right')
            ->where('pengembalian.dihapus_pada', null);
        return $query;
    }

    public function getSingleJoinPengembalian($id = false)
    {
        $query = $this->table('pengembalian')
            ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa = pengembalian.id_transaksi_sewa', 'left')
            ->join('users', 'users.id = pengembalian.id_user', 'left')
            ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
            ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'left')
            ->where('pengembalian.dihapus_pada', null);
        if ($id == false)
            return $query->get()->getResultArray();
        return $query->where('pengembalian.id_pengembalian', $id)->first();
    }

    public function getDenda()
    {
        $query = $this->table('pengembalian')
            ->select('pengembalian.id_pengembalian,
                        pengembalian.id_transaksi_sewa,
                        penyewa.id_penyewa,
                        penyewa.nama_penyewa,
                        daftar_motor.id_motor,
                        daftar_motor.nama_motor,
                        daftar_motor.no_polisi,
                        transaksi_sewa.tanggal_transaksi_sewa,
                        transaksi_sewa.tanggal_mulai_sewa,
                        transaksi_sewa.tanggal_akhir_sewa,
                        pengembalian.tanggal_kembali')
            ->join('users', 'users.id = pengembalian.id_user', 'left')
            ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa = pengembalian.id_transaksi_sewa', 'left')
            ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'right')
            ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'right')
            ->join('detail_pengembalian dt', 'dt.id_pengembalian = pengembalian.id_pengembalian', 'left')
            ->selectSum('dt.denda')
            ->groupBy('pengembalian.id_pengembalian')
            ->where('pengembalian.dihapus_pada', null)
            ->where('penyewa.dihapus_pada', null);
        return $query;
    }
    public function denda(){
        $query = $this->table('pengembalian')
        ->join('detail_pengembalian dt', 'dt.id_pengembalian = pengembalian.id_pengembalian', 'left')
        ->join('users', 'users.id = pengembalian.id_user', 'left')
            ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa = pengembalian.id_transaksi_sewa', 'left')
            ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'right')
            ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'right')
            ->selectSum('dt.denda')
            ->groupBy('pengembalian.id_pengembalian')
            ->where('pengembalian.dihapus_pada', null)
            ->where('penyewa.dihapus_pada', null);
            return $query->get()->getResultArray();
    }

    public function getPengem($id)
    {
        $query = $this->table('pengembalian')
            ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa = pengembalian.id_transaksi_sewa', 'left')
            ->join('users', 'users.id = pengembalian.id_user', 'left')
            ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
            ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'left')
            ->where('pengembalian.id_pengembalian', $id)
            ->where('pengembalian.dihapus_pada', null);
        return $query;
    }
    public function getpem($id)
    {
        $query = $this->table('pengembalian')
            ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa = pengembalian.id_transaksi_sewa', 'left')
            ->join('users', 'users.id = pengembalian.id_user', 'left')
            ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
            ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'left')
            ->where('pengembalian.id_pengembalian', $id)
            ->where('pengembalian.dihapus_pada', null);
        return $query->first();
    }
    // public function cariPengembalian($kunci = false)
    // {
    //     $query = $this->table('pengembalian')
    //         ->join('users', 'users.id = pengembalian.id_user', 'left')
    //         ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa = pengembalian.id_transaksi_sewa', 'left')
    //         ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa = id_motor', 'right')
    //         ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'right')
    //         ->where('pengembalian.dihapus_pada', null);

    //     if ($kunci == false) {
    //         return $query->get()->getResultArray();
    //     } else {
    //         $query->like('penyewa.nama_penyewa', $kunci)
    //             ->orLike('daftar_motor.no_polisi', $kunci)
    //             ->orLike('daftar_motor.nama_motor', $kunci);
    //         return $query;
    //     }
    // }

    // public function getJoinPengembalian()
    // {
    //     $query = $this->table('pengembalian')
    //         ->join('users', 'users.id = pengembalian.id_user', 'left')
    //         ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa = pengembalian.id_transaksi_sewa', 'left')
    //         ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'right')
    //         ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'right')
    //         ->where('pengembalian.dihapus_pada', null);
    //     return $query;
    // }

    // public function getSingleJoinPengembalian($id = false)
    // {
    //     $query = $this->table('pengembalian')
    //         ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa = pengembalian.id_transaksi_sewa', 'left')
    //         ->join('users', 'users.id = pengembalian.id_user', 'left')
    //         ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
    //         ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'left')
    //         ->where('pengembalian.dihapus_pada', null);
    //     if ($id == false)
    //         return $query->get()->getResultArray();
    //     return $query->where('pengembalian.id_pengembalian', $id)->first();
    // }

    // public function getDenda($id = false)
    // {
    //     $query = $this->table('pengembalian')
    //         ->select('pengembalian.id_pengembalian,
    //                     pengembalian.id_transaksi_sewa,
    //                     penyewa.id_penyewa,
    //                     penyewa.nama_penyewa,
    //                     daftar_motor.id_motor,
    //                     daftar_motor.nama_motor,
    //                     daftar_motor.no_polisi,
    //                     transaksi_sewa.tanggal_transaksi_sewa,
    //                     transaksi_sewa.tanggal_mulai_sewa,
    //                     transaksi_sewa.tanggal_akhir_sewa,
    //                     pengembalian.tanggal_kembali')
    //         ->join('users', 'users.id = pengembalian.id_user', 'left')
    //         ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa = pengembalian.id_transaksi_sewa', 'left')
    //         ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'right')
    //         ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'right')
    //         ->join('detail_pengembalian dt', 'dt.id_pengembalian = pengembalian.id_pengembalian', 'left')
    //         ->selectSum('dt.denda')
    //         ->groupBy('pengembalian.id_pengembalian')
    //         ->orderBy('transaksi_sewa.tanggal_transaksi_sewa', 'DESC')
    //         ->where('pengembalian.dihapus_pada', null)
    //         ->where('penyewa.dihapus_pada', null);

    //     if ($id == false) {
    //         return $query;
    //     } else if ($id != false) {
    //         return $query->where('pengembalian.id_pengembalian', $id)->first();
    //     }
    //     // return $query;
    // }

    // public function getPengem($id)
    // {
    //     $query = $this->table('pengembalian')
    //         ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa = pengembalian.id_transaksi_sewa', 'left')
    //         ->join('users', 'users.id = pengembalian.id_user', 'left')
    //         ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
    //         ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'left')
    //         ->where('pengembalian.id_pengembalian', $id)
    //         ->where('pengembalian.dihapus_pada', null);
    //     return $query;
    // }

    // public function getPengem($id)
    // {
    //     $query = $this->table('pengembalian')
    //         ->select('pengembalian.id_pengembalian,
    //                     pengembalian.id_transaksi_sewa,
    //                     penyewa.id_penyewa,
    //                     penyewa.nama_penyewa,
    //                     daftar_motor.id_motor,
    //                     daftar_motor.nama_motor,
    //                     daftar_motor.no_polisi,
    //                     transaksi_sewa.tanggal_transaksi_sewa,
    //                     transaksi_sewa.tanggal_mulai_sewa,
    //                     transaksi_sewa.tanggal_akhir_sewa,
    //                     pengembalian.tanggal_kembali')
    //         ->join('users', 'users.id = pengembalian.id_user', 'left')
    //         ->join('transaksi_sewa', 'transaksi_sewa.id_transaksi_sewa = pengembalian.id_transaksi_sewa', 'left')
    //         ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'right')
    //         ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'right')
    //         ->where('id_pengembalian', $id)
    //         ->where('pengembalian.dihapus_pada', null)
    //         ->where('penyewa.dihapus_pada', null);
    //     return $query;
    // }
    // public function getDenda()
    // {
    //     $sql = $this->table('pengembalian')
    //         ->join('detail_pengembalian dt', 'dt.id_pengembalian = pengembalian.id_pengembalian', 'inner')
    //         ->selectSum('dt.denda')
    //         ->groupBy('pengembalian.id_pengembalian');
    //     return $sql;
    // }
}
