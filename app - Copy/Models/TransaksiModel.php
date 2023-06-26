<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{

    protected $table = 'transaksi_sewa';
    protected $primaryKey = 'id_transaksi_sewa';
    protected $useTimestamps = true;
    protected $createdField  = 'dibuat_pada';
    protected $updatedField  = '';
    protected $deletedField  = 'dihapus_pada';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_motor', 'id_penyewa', 'id_user', 'tanggal_transaksi_sewa', 'tanggal_mulai_sewa', 'tanggal_akhir_sewa', 'jaminan', 'keterangan'
    ];
    public function getSingleTrans($id = false)
    {
        $query = $this->table('transaksi_sewa')->where('dihapus_pada is null');
        if ($id == false)
            return $query->get()->getResultArray();
        return $query->where(['id_transaksi_sewa' => $id])->first();
    }

    public function getSingleJoinTrans($id = false)
    {
        $query = $this->table('transaksi_sewa')
        ->join('daftar_motor dm', 'dm.id_motor = transaksi_sewa.id_motor', 'left')
        ->join('penyewa p', 'p.id_penyewa = transaksi_sewa.id_penyewa', 'left')
        ->join('users u', 'u.id = transaksi_sewa.id_user', 'left')
        ->join('identitas_user iu', 'iu.id_user = transaksi_sewa.id_user', 'left')
        ->join('pengembalian pe', 'pe.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
        ->where('transaksi_sewa.dihapus_pada is null');
        if ($id == false)
            return $query->get()->getResultArray();
        return $query->where(['transaksi_sewa.id_transaksi_sewa' => $id])->first();
    }
    public function getreportwaktu($bulan,$tahun){
        // $query = $this->table('transaksi_sewa')
        //     ->select("transaksi_sewa.*")
        //     ->select("dm.*")
        //     ->select("p.*")
        //     ->select("u.*")
        //     ->select("iu.*")
        //     ->select("pe.*")
        //     ->select('DAY(transaksi_sewa.dibuat_pada) as day')
        //     ->select("datediff(transaksi_sewa.tanggal_akhir_sewa, transaksi_sewa.tanggal_mulai_sewa) as lama_sewa")
        //     ->join('daftar_motor dm', 'dm.id_motor = transaksi_sewa.id_motor', 'left')
        //     ->join('penyewa p', 'p.id_penyewa = transaksi_sewa.id_penyewa', 'left')
        //     ->join('users u', 'u.id = transaksi_sewa.id_user', 'left')
        //     ->join('identitas_user iu', 'iu.id_user = transaksi_sewa.id_user', 'left')
        //     ->join('pengembalian pe', 'pe.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
        //     ->where('transaksi_sewa.dihapus_pada is null')
        //     ->where('MONTH(transaksi_sewa.dibuat_pada)', $bulan)
        //     ->where('YEAR(transaksi_sewa.dibuat_pada)', $tahun)
        //     ->groupBy('DAY(transaksi_sewa.dibuat_pada)');
        $query = $this->table('transaksi_sewa as ts')
            ->select("transaksi_sewa.*")
            ->select("dm.*")
            ->select("p.*")
            ->select("u.*")
            ->select("iu.*")
            ->select("pe.*")
            ->select("dt.*")
            ->select('DAY(transaksi_sewa.dibuat_pada) as day')
            ->select('datediff(transaksi_sewa.tanggal_akhir_sewa, transaksi_sewa.tanggal_mulai_sewa) as lama_sewa')
            ->join('daftar_motor dm', 'dm.id_motor = transaksi_sewa.id_motor', 'left')
            ->join('penyewa p', 'p.id_penyewa = transaksi_sewa.id_penyewa', 'left')
            ->join('users u', 'u.id = transaksi_sewa.id_user', 'left')
            ->join('identitas_user iu', 'iu.id_user = transaksi_sewa.id_user', 'left')
            ->join('pengembalian pe', 'pe.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
            ->join('detail_pengembalian dt', 'dt.id_pengembalian = pe.id_pengembalian', 'left')
            ->groupBy('pe.id_pengembalian')
            ->where('pe.dihapus_pada', null)
            ->where('transaksi_sewa.dihapus_pada is null')
            ->where('MONTH(transaksi_sewa.dibuat_pada)', $bulan)
            ->where('YEAR(transaksi_sewa.dibuat_pada)', $tahun);
            // ->groupBy('DAY(transaksi_sewa.dibuat_pada)');
            // return $this->db->table('sale_detail as sd')
            // ->select('DAY(s.created_at) day, SUM(sd.total_price) total')
            // ->join('sale s', 'sale_id')
            // ->where('MONTH(s.created_at)', $bulan)
            // ->where('YEAR(s.created_at)', $tahun)
            // ->groupBy('DAY(s.created_at)')
            //duplicate column because groupby day
            // ->get()->getResultArray();
            return $query->get()->getResultArray();
            
        return $query->get()->getResultArray();
       
        // return $query->get()->getResultArray();
    // return $query->where(['transaksi_sewa.id_transaksi_sewa' => $id])->first();
    }
    public function getreporttgl($mulai,$akhir){
        // $query = $this->table('transaksi_sewa')
        //     ->select("transaksi_sewa.*")
        //     ->select("dm.*")
        //     ->select("p.*")
        //     ->select("u.*")
        //     ->select("iu.*")
        //     ->select("pe.*")
        //     ->select('DAY(transaksi_sewa.dibuat_pada) as day')
        //     ->select("datediff(transaksi_sewa.tanggal_akhir_sewa, transaksi_sewa.tanggal_mulai_sewa) as lama_sewa")
        //     ->join('daftar_motor dm', 'dm.id_motor = transaksi_sewa.id_motor', 'left')
        //     ->join('penyewa p', 'p.id_penyewa = transaksi_sewa.id_penyewa', 'left')
        //     ->join('users u', 'u.id = transaksi_sewa.id_user', 'left')
        //     ->join('identitas_user iu', 'iu.id_user = transaksi_sewa.id_user', 'left')
        //     ->join('pengembalian pe', 'pe.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
        //     ->where('transaksi_sewa.dihapus_pada is null')
        //     ->where('MONTH(transaksi_sewa.dibuat_pada)', $bulan)
        //     ->where('YEAR(transaksi_sewa.dibuat_pada)', $tahun)
        //     ->groupBy('DAY(transaksi_sewa.dibuat_pada)');
        $query = $this->table('transaksi_sewa as ts')
            ->select("transaksi_sewa.*")
            ->select("dm.*")
            ->select("p.*")
            ->select("u.*")
            ->select("iu.*")
            ->select("pe.*")
            ->select("dt.*")
            ->select('DAY(transaksi_sewa.dibuat_pada) as day')
            ->select('datediff(transaksi_sewa.tanggal_akhir_sewa, transaksi_sewa.tanggal_mulai_sewa) as lama_sewa')
            ->join('daftar_motor dm', 'dm.id_motor = transaksi_sewa.id_motor', 'left')
            ->join('penyewa p', 'p.id_penyewa = transaksi_sewa.id_penyewa', 'left')
            ->join('users u', 'u.id = transaksi_sewa.id_user', 'left')
            ->join('identitas_user iu', 'iu.id_user = transaksi_sewa.id_user', 'left')
            ->join('pengembalian pe', 'pe.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
            ->join('detail_pengembalian dt', 'dt.id_pengembalian = pe.id_pengembalian', 'left')
            ->groupBy('pe.id_pengembalian')
            ->where('pe.dihapus_pada', null)
            ->where('transaksi_sewa.dihapus_pada is null')
            ->where('transaksi_sewa.tanggal_transaksi_sewa >=', $mulai)
            ->where('transaksi_sewa.tanggal_transaksi_sewa <=', $akhir);
            // ->groupBy('DAY(transaksi_sewa.dibuat_pada)');
            // return $this->db->table('sale_detail as sd')
            // ->select('DAY(s.created_at) day, SUM(sd.total_price) total')
            // ->join('sale s', 'sale_id')
            // ->where('MONTH(s.created_at)', $bulan)
            // ->where('YEAR(s.created_at)', $tahun)
            // ->groupBy('DAY(s.created_at)')
            //duplicate column because groupby day
            // ->get()->getResultArray();
            return $query->get()->getResultArray();
            
        return $query->get()->getResultArray();
       
        // return $query->get()->getResultArray();
    // return $query->where(['transaksi_sewa.id_transaksi_sewa' => $id])->first();
    }
     public function getreportjumlah($bulan,$tahun){
        // $query = $this->table('transaksi_sewa')
      
        $query = $this->table('transaksi_sewa')
          
        ->select('count(transaksi_sewa.id_transaksi_sewa) as jumlah')
                  ->where('transaksi_sewa.dihapus_pada is null')
            ->where('MONTH(transaksi_sewa.dibuat_pada)', $bulan)
            ->where('YEAR(transaksi_sewa.dibuat_pada)', $tahun)
            // ->orderBy('transaksi_sewa.id_transaksi_sewa', 'DESC')
            ;
            // ->groupBy('DAY(transaksi_sewa.dibuat_pada)');
            // return $this->db->table('sale_detail as sd')
            // ->select('DAY(s.created_at) day, SUM(sd.total_price) total')
            // ->join('sale s', 'sale_id')
            // ->where('MONTH(s.created_at)', $bulan)
            // ->where('YEAR(s.created_at)', $tahun)
            // ->groupBy('DAY(s.created_at)')
            //duplicate column because groupby day
            // ->get()->getResultArray();
            // return $query;
            
        return $query->get()->getResultArray();
       
        // return $query->get()->getResultArray();
    // return $query->where(['transaksi_sewa.id_transaksi_sewa' => $id])->first();
    }
    public function getreportmotor($id){
        // $query = $this->table('transaksi_sewa')
        //     ->select("transaksi_sewa.*")
        //     ->select("dm.*")
        //     ->select("p.*")
        //     ->select("u.*")
        //     ->select("iu.*")
        //     ->select("pe.*")
        //     ->select('DAY(transaksi_sewa.dibuat_pada) as day')
        //     ->select("datediff(transaksi_sewa.tanggal_akhir_sewa, transaksi_sewa.tanggal_mulai_sewa) as lama_sewa")
        //     ->join('daftar_motor dm', 'dm.id_motor = transaksi_sewa.id_motor', 'left')
        //     ->join('penyewa p', 'p.id_penyewa = transaksi_sewa.id_penyewa', 'left')
        //     ->join('users u', 'u.id = transaksi_sewa.id_user', 'left')
        //     ->join('identitas_user iu', 'iu.id_user = transaksi_sewa.id_user', 'left')
        //     ->join('pengembalian pe', 'pe.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
        //     ->where('transaksi_sewa.dihapus_pada is null')
        //     ->where('MONTH(transaksi_sewa.dibuat_pada)', $bulan)
        //     ->where('YEAR(transaksi_sewa.dibuat_pada)', $tahun)
        //     ->groupBy('DAY(transaksi_sewa.dibuat_pada)');
        $query = $this->table('transaksi_sewa as ts')
            ->select("transaksi_sewa.*")
            ->select("dm.*")
            ->select("p.*")
            ->select("u.*")
            ->select("iu.*")
            ->select("pe.*")
            ->select("dt.*")
            // ->select('DAY(transaksi_sewa.dibuat_pada) as day')
            ->select('datediff(transaksi_sewa.tanggal_akhir_sewa, transaksi_sewa.tanggal_mulai_sewa) as lama_sewa')
            ->join('daftar_motor dm', 'dm.id_motor = transaksi_sewa.id_motor', 'left')
            ->join('penyewa p', 'p.id_penyewa = transaksi_sewa.id_penyewa', 'left')
            ->join('users u', 'u.id = transaksi_sewa.id_user', 'left')
            ->join('identitas_user iu', 'iu.id_user = transaksi_sewa.id_user', 'left')
            ->join('pengembalian pe', 'pe.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
            ->join('detail_pengembalian dt', 'dt.id_pengembalian = pe.id_pengembalian', 'left')
            // ->selectSum('dt.denda')
            ->where('transaksi_sewa.dihapus_pada is null')
            // ->where('MONTH(transaksi_sewa.dibuat_pada)', $bulan)
            ->where(('dm.id_motor'), $id);
            // ->groupBy('DAY(transaksi_sewa.dibuat_pada)');
            // return $this->db->table('sale_detail as sd')
            // ->select('DAY(s.created_at) day, SUM(sd.total_price) total')
            // ->join('sale s', 'sale_id')
            // ->where('MONTH(s.created_at)', $bulan)
            // ->where('YEAR(s.created_at)', $tahun)
            // ->groupBy('DAY(s.created_at)')
            //duplicate column because groupby day
            // ->get()->getResultArray();
            // return $query->get()->getResultArray();
            
        return $query->get()->getResultArray();
       
        // return $query->get()->getResultArray();
    // return $query->where(['transaksi_sewa.id_transaksi_sewa' => $id])->first();
    }

    public function getJoinTrans()
    {
        $query = $this->table('transaksi_sewa')
            ->select("transaksi_sewa.*")
            ->select("daftar_motor.*")
            ->select("penyewa.*")
            ->select("users.*")
            ->select("identitas_user.*")
            ->select("pengembalian.*")  
            ->select("dt.*")
            ->select("datediff(transaksi_sewa.tanggal_akhir_sewa, transaksi_sewa.tanggal_mulai_sewa) as lama_sewa")
            ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'left')
            ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
            ->join('users', 'users.id = transaksi_sewa.id_user', 'left')
            ->join('identitas_user', 'identitas_user.id_user = transaksi_sewa.id_user', 'left')
            ->join('pengembalian', 'pengembalian.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
            ->join('detail_pengembalian dt', 'dt.id_pengembalian = pengembalian.id_pengembalian', 'left')
            ->groupBy('pengembalian.id_pengembalian')
            ->where('pengembalian.dihapus_pada', null)
            // ->selectSum('dt.denda')
            ->where('transaksi_sewa.dihapus_pada is null');
        return $query->get()->getResultArray();
        return $query;
    }
    

    public function pencarian($kunci)
    {
        $query = $this->table('transaksi_sewa')
            ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'left')
            ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
            ->join('users', 'users.id = transaksi_sewa.id_user', 'left')
            ->join('identitas_user', 'identitas_user.id_user = transaksi_sewa.id_user', 'left')
            ->join('pengembalian', 'pengembalian.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
            ->where('transaksi_sewa.dihapus_pada', null)
            ->like('penyewa.nama_penyewa', $kunci);
        return $query;
    }

    public function getIdTrans()
    {
        $query = $this->table('transaksi_sewa')
            ->select('id_transaksi_sewa')
            ->orderBy('id_transaksi_sewa', 'DESC')
            ->limit(1);
        return $query->get()->getResultArray();
    }
    // public function getSingleTrans($id = false)
    // {
    //     $query = $this->table('transaksi_sewa')->where('dihapus_pada is null');
    //     if ($id == false)
    //         return $query->get()->getResultArray();
    //     return $query->where(['id_transaksi_sewa' => $id])->first();
    // }

    // public function getSingleJoinTrans($id = false)
    // {
    //     $query = $this->table('transaksi_sewa')
    //         ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'left')
    //         ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
    //         ->join('users', 'users.id = transaksi_sewa.id_user', 'left')
    //         ->join('identitas_user', 'identitas_user.id_user = transaksi_sewa.id_user', 'left')
    //         ->join('pengembalian', 'pengembalian.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
    //         ->where('transaksi_sewa.dihapus_pada is null');
    //     if ($id == false)
    //         return $query->get()->getResultArray();
    //     return $query->where(['transaksi_sewa.id_transaksi_sewa' => $id])->first();
    // }

    // public function getJoinTrans()
    // {
    //     $query = $this->table('transaksi_sewa')
    //         ->select("transaksi_sewa.*")
    //         ->select("daftar_motor.*")
    //         ->select("penyewa.*")
    //         ->select("users.*")
    //         ->select("identitas_user.*")
    //         ->select("pengembalian.*")
    //         ->select("datediff(transaksi_sewa.tanggal_akhir_sewa, transaksi_sewa.tanggal_mulai_sewa) as lama_sewa")
    //         ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'left')
    //         ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
    //         ->join('users', 'users.id = transaksi_sewa.id_user', 'left')
    //         ->join('identitas_user', 'identitas_user.id_user = transaksi_sewa.id_user', 'left')
    //         ->join('pengembalian', 'pengembalian.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
    //         ->orderBy('transaksi_sewa.tanggal_mulai_sewa', 'DESC')
    //         ->where('transaksi_sewa.dihapus_pada is null');
    //     // return $query->get()->getResultArray();
    //     return $query;
    // }

    // public function pencarian($kunci)
    // {
    //     $query = $this->table('transaksi_sewa')
    //         ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'left')
    //         ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
    //         ->join('users', 'users.id = transaksi_sewa.id_user', 'left')
    //         ->join('identitas_user', 'identitas_user.id_user = transaksi_sewa.id_user', 'left')
    //         ->join('pengembalian', 'pengembalian.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
    //         ->where('transaksi_sewa.dihapus_pada', null)
    //         ->like('penyewa.nama_penyewa', $kunci);
    //     return $query;
    // }

    // public function getIdTrans()
    // {
    //     $query = $this->table('transaksi_sewa')
    //         ->select('id_transaksi_sewa')
    //         ->orderBy('id_transaksi_sewa', 'DESC')
    //         ->limit(1);
    //     return $query->get()->getResultArray();
    // }

    public function getTransCount()
    {
        $query = $this->table('transaksi_sewa')
            ->selectCount('id_transaksi_sewa')
            ->where('dihapus_pada', null);
        return $query;
    }

    public function laporan($bulan, $tahun)
    {
        $query = $this->table('transaksi_sewa')
            ->where('MONTH(tanggal_transaksi_sewa)', $bulan)
            ->where('YEAR(tanggal_transaksi_sewa)', $tahun)
            ->where('dihapus_pada', null);
        return $query;
    }

    public function laporanFilter($from, $to)
    {
        $query = $this->table('transaksi_sewa')
            ->where('tanggal_transaksi_sewa >=', $from)
            ->where('tanggal_transaksi_sewa <=', $to)
            ->where('dihapus_pada', null);
        return $query;
    }
}
