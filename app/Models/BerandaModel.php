<?php

namespace App\Models;

use CodeIgniter\Model;

class BerandaModel extends Model
{


    public function reportTransaksi($tahun, $bulan)
    {
        return $this->db->table('sale_detail as sd')
            ->select('DAY(s.created_at) day, SUM(sd.total_price) total')
            ->join('sale s', 'sale_id')
            ->where('MONTH(s.created_at)', $bulan)
            ->where('YEAR(s.created_at)', $tahun)
            ->groupBy('DAY(s.created_at)')
            ->get()->getResultArray();
        //     return $this->db->table('sale_detail as sd') 
        //     ->select('MONTH(s.created_at) month,SUM(sd.total_price) total')
        //     ->join('sale s','sale_id')
        //     ->where('YEAR(s.created_at)',$tahun)

        //    ->groupBy('MONTH(s.created_at)')
        //    ->get()->getResultArray();

        //    return $this->db->table('sale_detail as sd') 
        //    ->select('MONTH(s.created_at) month,DAY(s.created_at) date,SUM(sd.total_price) total')
        //    ->join('sale s','sale_id')
        //    ->where('YEAR(s.created_at)',$tahun)

        //   ->groupBy('Month(s.created_at)')
        //   ->get()->getResultArray();

    }
    public function reportp($tahun, $bulan)
    {
        return $this->db->table('transaksi_sewa as s')
            ->select('(p.nama_penyewa) nama,(p.foto_penyewa) foto, COUNT(s.id_transaksi_sewa) total')
            ->join('penyewa p', 'p.id_penyewa = s.id_penyewa', 'left')
            ->where('MONTH(s.dibuat_pada)', $bulan)
            ->where('YEAR(s.dibuat_pada)', $tahun)
            // ->groupBy('s.id_penyewa)')
            ->get()->getResultArray();
    }
    public function reportjumlah($tahun, $bulan)
    {
        return $this->db->table('transaksi_sewa as s')
            // return $this->db->table('sale_detail as sd')
            ->select('DAY(s.dibuat_pada) day, COUNT(s.id_transaksi_sewa) total')
            // ->join('sale s', 'sale_id')
            ->where('MONTH(s.dibuat_pada)', $bulan)
            ->where('YEAR(s.dibuat_pada)', $tahun)
            ->where('s.dihapus_pada is null')
            ->groupBy('DAY(s.dibuat_pada)')
            ->get()->getResultArray();
    }
    public function reportservis($bulan)
    {
        return $this->db->table('servis as s')
            // return $this->db->table('sale_detail as sd')
            ->select('COUNT(s.id_servis) total')
            // ->join('sale s', 'sale_id')
            ->where('MONTH(s.tanggal_servis)', $bulan)
            // ->where('YEAR(s.dibuat_pada)', $tahun)
            ->where('s.dihapus_pada is null')
            ->groupBy('DAY(s.dibuat_pada)')
            ->get()->getResultArray();
    }
    public function reportserviss($tahun, $bulan)
    {
        return $this->db->table('servis as s')
            // return $this->db->table('sale_detail as sd')
            ->select('DAY(s.tanggal_servis) day,COUNT(s.id_servis) total')
            // ->join('sale s', 'sale_id')
            ->where('MONTH(s.tanggal_servis)', $bulan)
            ->where('YEAR(s.tanggal_servis)', $tahun)
            ->where('s.dihapus_pada is null')
            ->groupBy('DAY(s.dibuat_pada)')
            ->get()->getResultArray();
    }
    public function reportservisbayar($bulan)
    {
        return $this->db->table('servis as s')
            // return $this->db->table('sale_detail as sd')
            ->join('detail_servis', 'detail_servis.id_servis = s.id_servis', 'right')
            ->select('SUM(detail_servis.harga) total')
            // ->join('sale s', 'sale_id')
            ->where('MONTH(s.tanggal_servis)', $bulan)
            // ->where('YEAR(s.dibuat_pada)', $tahun)
            ->where('s.dihapus_pada is null')
            // ->groupBy('DAY(s.dibuat_pada)')
            ->get()->getResultArray();
    }
    public function reportservisbayars($bulan)
    {
        return $this->db->table('servis as s')
            // return $this->db->table('sale_detail as sd')
            ->join('detail_servis', 'detail_servis.id_servis = s.id_servis', 'right')
            ->select('MONTH(s.tanggal_servis) month,SUM(detail_servis.harga) total')
            // ->join('sale s', 'sale_id')
            ->where('YEAR(s.tanggal_servis)', $bulan)
            // ->where('YEAR(s.dibuat_pada)', $tahun)
            ->where('s.dihapus_pada is null')
            // ->groupBy('DAY(s.dibuat_pada)')
            ->get()->getResultArray();
    }
    public function reportTransaksis($tahun)
    {
        //     return $this->db->table('sale_detail as sd') 
        //     ->select('MONTH(s.created_at) month,SUM(sd.total_price) total')
        //     ->join('sale s','sale_id')
        //     ->where('YEAR(s.created_at)',$tahun)

        //    ->groupBy('MONTH(s.created_at)')
        //    ->get()->getResultArray();
        //    return $this->db->table('sale_detail as sd') 
        //    ->select('MONTH(s.created_at) month,DAY(s.created_at) date,SUM(sd.total_price) total')
        //    ->join('sale s','sale_id')

        //    ->where('MONTH(s.created_at)',$bulan)
        //   ->groupBy('DAY(s.created_at $query = $this->table('transaksi_sewa')
        return $this->db->table('transaksi_sewa')
            ->select("datediff(transaksi_sewa.tanggal_akhir_sewa, transaksi_sewa.tanggal_mulai_sewa) as lama_sewa")
            ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'left')
            ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
            ->join('users', 'users.id = transaksi_sewa.id_user', 'left')
            ->join('identitas_user', 'identitas_user.id_user = transaksi_sewa.id_user', 'left')
            ->join('pengembalian', 'pengembalian.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
            ->join('detail_pengembalian dt', 'dt.id_pengembalian = pengembalian.id_pengembalian', 'left')
            ->select('MONTH(transaksi_sewa.dibuat_pada) month,SUM(datediff(transaksi_sewa.tanggal_akhir_sewa, transaksi_sewa.tanggal_mulai_sewa)*daftar_motor.harga_sewa) total')
            ->where('YEAR(transaksi_sewa.dibuat_pada)', $tahun)
            ->where('transaksi_sewa.dihapus_pada is null')
            ->groupBy('MONTH(transaksi_sewa.dibuat_pada)')
            // ->selectSum('dt.denda')


            //   ->get()->getResultArray();
            // return $this->db->table('transaksi_sewa as ts') 
            //     ->select('MONTH(s.created_at) month,SUM(ts.total_price) total')
            //     ->join('sale s','sale_id')
            //     ->where('YEAR(s.created_at)',$tahun)

            //    ->groupBy('MONTH(transaksi_sewa.dibuat_pada)')
            ->get()->getResultArray();
    }
    public function reportpen($tahun)
    {
        //     return $this->db->table('sale_detail as sd') 
        //     ->select('MONTH(s.created_at) month,SUM(sd.total_price) total')
        //     ->join('sale s','sale_id')
        //     ->where('YEAR(s.created_at)',$tahun)

        //    ->groupBy('MONTH(s.created_at)')
        //    ->get()->getResultArray();
        //    return $this->db->table('sale_detail as sd') 
        //    ->select('MONTH(s.created_at) month,DAY(s.created_at) date,SUM(sd.total_price) total')
        //    ->join('sale s','sale_id')

        //    ->where('MONTH(s.created_at)',$bulan)
        //   ->groupBy('DAY(s.created_at $query = $this->table('transaksi_sewa')
        return $this->db->table('transaksi_sewa')
            ->select("datediff(transaksi_sewa.tanggal_akhir_sewa, transaksi_sewa.tanggal_mulai_sewa) as lama_sewa")
            ->join('daftar_motor', 'daftar_motor.id_motor = transaksi_sewa.id_motor', 'left')
            ->join('penyewa', 'penyewa.id_penyewa = transaksi_sewa.id_penyewa', 'left')
            ->join('users', 'users.id = transaksi_sewa.id_user', 'left')
            ->join('identitas_user', 'identitas_user.id_user = transaksi_sewa.id_user', 'left')
            ->join('pengembalian', 'pengembalian.id_transaksi_sewa = transaksi_sewa.id_transaksi_sewa', 'inner')
            ->join('detail_pengembalian dt', 'dt.id_pengembalian = pengembalian.id_pengembalian', 'left')
            ->select('SUM(datediff(transaksi_sewa.tanggal_akhir_sewa, transaksi_sewa.tanggal_mulai_sewa)*daftar_motor.harga_sewa) total')
            ->where('MONTH(transaksi_sewa.dibuat_pada)', $tahun)
            ->where('transaksi_sewa.dihapus_pada is null')
            //    ->groupBy('MONTH(transaksi_sewa.dibuat_pada)')
            // ->selectSum('dt.denda')


            //   ->get()->getResultArray();
            // return $this->db->table('transaksi_sewa as ts') 
            //     ->select('MONTH(s.created_at) month,SUM(ts.total_price) total')
            //     ->join('sale s','sale_id')
            //     ->where('YEAR(s.created_at)',$tahun)

            //    ->groupBy('MONTH(transaksi_sewa.dibuat_pada)')
            ->get()->getResultArray();
    }
    public function reportpenyewa($tahun)
    {
        //     return $this->db->table('sale_detail as sd') 
        //     ->select('MONTH(s.created_at) month,SUM(sd.total_price) total')
        //     ->join('sale s','sale_id')
        //     ->where('YEAR(s.created_at)',$tahun)

        //    ->groupBy('MONTH(s.created_at)')
        //    ->get()->getResultArray();
        //    return $this->db->table('sale_detail as sd') 
        //    ->select('MONTH(s.created_at) month,DAY(s.created_at) date,SUM(sd.total_price) total')
        //    ->join('sale s','sale_id')

        //    ->where('MONTH(s.created_at)',$bulan)
        //   ->groupBy('DAY(s.created_at $query = $this->table('transaksi_sewa')
        return $this->db->table('penyewa')
            ->select('COUNT(penyewa.id_penyewa) total')
            ->where('MONTH(penyewa.dibuat_pada)', $tahun)
            ->where('penyewa.dihapus_pada is null')
            //    ->groupBy('MONTH(transaksi_sewa.dibuat_pada)')
            // ->selectSum('dt.denda')


            //   ->get()->getResultArray();
            // return $this->db->table('transaksi_sewa as ts') 
            //     ->select('MONTH(s.created_at) month,SUM(ts.total_price) total')
            //     ->join('sale s','sale_id')
            //     ->where('YEAR(s.created_at)',$tahun)

            //    ->groupBy('MONTH(transaksi_sewa.dibuat_pada)')
            ->get()->getResultArray();
    }
}
