<?php

namespace App\Controllers;
use TCPDF;
use App\Models\DetailPengembalianModel;
use App\Models\TransaksiModel;
use App\Models\MotorModel;
use App\Models\PenyewaModel;
use App\Models\PengembalianModel;
use App\Models\BerandaModel;
class Home extends BaseController
{
    private $transModel;
    private $motorModel;
    private $penyewaModel;
    private $pengembalianModel;
    private $detailPengembalianModel;
    private $beranda;
    public function __construct()
    {
        $this->transModel = new TransaksiModel();
        $this->motorModel = new MotorModel();
        $this->penyewaModel = new PenyewaModel();
        $this->pengembalianModel = new PengembalianModel();
        $this->detailPengembalianModel = new DetailPengembalianModel();
        $this->beranda = new BerandaModel();
    }
    public function index()
    {
        // $tahun= 2022;
        // $bulan= 10;
        // $reportTranss = $this->beranda->reportjumlah($tahun,$bulan);
        // $reportTrans1 = $this->beranda->reportp(2022,11);
        // dd($reportTrans1);
        $data = [
            'title' => 'SIABRM',
            'patchTitle' => 'Dashboard',
        ];
        return view('template/dashboard', $data);
    }
    public function showchartsewa(){
        // $dataTrans = $this->transModel->getJoinTrans();
        $tahun= $this->request->getVar('tahun');
        $reportTranss = $this->beranda->reportTransaksis($tahun);
        $reportTrans = $this->beranda->reportservisbayars($tahun);
        $total=0;
        // foreach ($querytota as $value)

        // {
        //     // dd($value['lama_sewa']);
        //     $total +=($value['lama_sewa'] * $value['harga_sewa']); 
        // }
        $response = [
            'status'=> false,
            'data'=> $reportTranss,
            'data1'=>$reportTrans
        ];
        echo json_encode($response);
        
    }public function showcharttotal(){
        // $dataTrans = $this->transModel->getJoinTrans();
        $tahun= $this->request->getVar('tahun');
        $bulan= $this->request->getVar('bulan');
        $reportTranss = $this->beranda->reportjumlah($tahun,$bulan);
        $reportTrans = $this->beranda->reportserviss($tahun,$bulan);
        $reportTrans1 = $this->beranda->reportp($tahun,$bulan);
        // dd($bulan);
        $total=0;
        // foreach ($querytota as $value)

        // {
        //     // dd($value['lama_sewa']);
        //     $total +=($value['lama_sewa'] * $value['harga_sewa']); 
        // }
        $response = [
            'status'=> false,
            'data'=> $reportTranss,
            'data1'=>$reportTrans1,
            'datas'=>$reportTrans,
            
        ];
        echo json_encode($response);
        
    }public function showpendapatan(){
        // $dataTrans = $this->transModel->getJoinTrans();
        $tahun= $this->request->getVar('today');
        // $bulan= $this->request->getVar('bulan');
        $reportTranss = $this->beranda->reportpen($tahun);
        // dd($bulan);
        $total=0;
        // foreach ($querytota as $value)

        // {
        //     // dd($value['lama_sewa']);
        //     $total +=($value['lama_sewa'] * $value['harga_sewa']); 
        // }
        $response = [
            'status'=> false,
            'data'=> $reportTranss,
            'tahun'=>$tahun
        ];
        echo json_encode($response);
        
    }public function penyewa(){
        // $dataTrans = $this->transModel->getJoinTrans();
        $tahun= $this->request->getVar('today');
        // $bulan= $this->request->getVar('bulan');
        $reportTranss = $this->beranda->reportpenyewa($tahun);
        // dd($bulan);
        $total=0;
        // foreach ($querytota as $value)

        // {
        //     // dd($value['lama_sewa']);
        //     $total +=($value['lama_sewa'] * $value['harga_sewa']); 
        // }
        $response = [
            'status'=> false,
            'data'=> $reportTranss,
            'tahun'=>$tahun
        ];
        echo json_encode($response);
        
    }public function servis(){
        // $dataTrans = $this->transModel->getJoinTrans();
        $tahun= $this->request->getVar('today');
        // $bulan= $this->request->getVar('bulan');
        $reportTranss = $this->beranda->reportservis($tahun);
        // dd($bulan);
        $total=0;
        // foreach ($querytota as $value)

        // {
        //     // dd($value['lama_sewa']);
        //     $total +=($value['lama_sewa'] * $value['harga_sewa']); 
        // }
        $response = [
            'status'=> false,
            'data'=> $reportTranss,
            'tahun'=>$tahun
        ];
        echo json_encode($response);
        
    }public function servisbayar(){
        // $dataTrans = $this->transModel->getJoinTrans();
        $tahun= $this->request->getVar('today');
        // $bulan= $this->request->getVar('bulan');
        $reportTranss = $this->beranda->reportservisbayar($tahun);
        // dd($bulan);
        $total=0;
        // foreach ($querytota as $value)

        // {
        //     // dd($value['lama_sewa']);
        //     $total +=($value['lama_sewa'] * $value['harga_sewa']); 
        // }
        $response = [
            'status'=> false,
            'data'=> $reportTranss,
            'tahun'=>$tahun
        ];
        echo json_encode($response);
        
    }
}
