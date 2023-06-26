<?php

namespace App\Controllers;
use TCPDF;
use App\Models\DetailPengembalianModel;
use App\Models\TransaksiModel;
use App\Models\MotorModel;
use App\Models\PenyewaModel;
use App\Models\PengembalianModel;
use CodeIgniter\I18n\Time;
use DateTime;
use Dompdf\Dompdf;
class Laporan extends BaseController
{
    private $transModel;
    private $motorModel;
    private $penyewaModel;
    private $pengembalianModel;
    public function __construct()
    {
        $this->transModel = new TransaksiModel();
        $this->motorModel = new MotorModel();
        $this->penyewaModel = new PenyewaModel();
        $this->pengembalianModel = new PengembalianModel();
        $this->detailPengembalianModel = new DetailPengembalianModel();
    }
    public function indexlaporan()
    {
        $dataTrans = $this->transModel->getJoinTrans();
        
        // dd($dataTrans);
        $pager = \Config\Services::pager();
        $kunci = $this->request->getVar('cari');
        //   dd( $kunci);
        $tahun = $this->request->getVar('tahun');
        $bulan = $this->request->getVar('bulan');
        $id = $this->request->getVar('id_motor');
        // dd($dataTrans->get()->getResultArray());
        // dd( $id);

        if ($id == null) {
            $query = $dataTrans;
            $querydenda= $this->pengembalianModel->denda();
            // dd($querydenda);
            $querytota = $dataTrans;
            $total=0;
            foreach ($querytota as $value)
    
            {
                // dd($value['lama_sewa']);
                $total +=($value['lama_sewa'] * $value['harga_sewa']+ ($value['denda'])); 
            }
            $denda=0;
            foreach ($querydenda as $value)
    
            {
                // dd($value['lama_sewa']);
                $denda +=($value['denda']); 
                // dd($total);
            }
            // dd($total);
            $data['nama']='';
            $data['dendatotal']     = $denda;
            $data['total']     = $total; 
            $data['tahun']='';
            $data['id_m']=0;
            // dd($query);
        } 
        else if ($id != null ) {
            $query = $this->transModel->getreportmotor($id);
            // dd($query);
            $total=0;
            foreach ($query as $value)
    
            {
                // dd($value['lama_sewa']);
                $total +=($value['lama_sewa'] * $value['harga_sewa']+ ($value['denda'])); 
                // dd($total);
            }
            $denda=0;
            foreach ($query as $value)
    
            {
                // dd($value['lama_sewa']);
                $denda +=($value['denda']); 
                // dd($total);
            }
            // dd($denda);
            $data['nama']=$kunci;
            $data['dendatotal']     = $denda; 
            // $data['tahun']=$tahun;
            $data['total']     = $total; 
            $data['tahun']=$tahun;
            $data['id_m']=$id;
            // dd( $data['motor']);
            // $query1 = $this->transModel->getreportjumlah($bulan,$tahun);
            // // dd($query1);
        }
        // else if ($tahun != null) {
        //     $query = $this->transModel->getreportwaktu($bulan,$tahun);
        // }
        // dd($query->get()->getResultArray());
            
        $array1=json_encode($query);
        // $object1=json_decode($array1);
        $object1 = json_decode(json_encode ($query), FALSE);
        // dd($query);
// dd($query->get()->getResultArray());
        // $data['result']    = $query->paginate(5, 'trans');
        $datamotor = $this->motorModel->getmotorobject();
        // dd($datamotor->get()->getResultArray());
        $data['result']    = $query;
        $data['motor']=$datamotor->paginate(4, 'motor');
        // $data['pager']     = $this->motorModel->pager;
      
        // $data['page']      = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['patchTitle']    = 'Transaksi';
        $data['title']     = 'Data Transaksi';
        // $data['total']     =  $data['result'['harga_sewa']] ;
        // $data['jumlah']     = $query1;
     
         
        


        return view('laporan/index-laporanmotor', $data);
    } public function index()
    {
        $dataTrans = $this->transModel->getJoinTrans();
        
        // dd($dataTrans);
        $pager = \Config\Services::pager();
        $kunci = $this->request->getVar('cari');
        $tahun = $this->request->getVar('tahun');
        $bulan = $this->request->getVar('bulan');
        $mulai = $this->request->getVar('mulai');
        $akhir = $this->request->getVar('akhir');
        // dd($dataTrans->get()->getResultArray());

        if ($tahun == null && $bulan == null &&$mulai == null && $akhir ==null) {
            $query = $dataTrans;
            $querydenda= $this->pengembalianModel->denda();
            $querytota = $dataTrans;
            $total=0;
            foreach ($querytota as $value)
    
            {
                // dd($value['lama_sewa']);
                $total +=($value['lama_sewa'] * $value['harga_sewa']+ ($value['denda'])); 
            }
            $denda=0;
            foreach ($querydenda as $value)
    
            {
                // dd($value['lama_sewa']);
                $denda +=($value['denda']); 
                // dd($total);
            }
            // dd($total);
            $data['results']= $querydenda;
            $data['total']     = $total; 
            $data['tahun']='';
            $data['bulan']='';
            $data['mulai']= '';
            // dd($data['mulai']);
            $data['akhir']= '';
            // dd($query);
        } 
        else if ($mulai != null || $akhir !=null) {
            $query = $this->transModel->getreporttgl($mulai,$akhir);
            // dd($mulai);
            // dd($query);
            $total=0;
            foreach ($query as $value)
    
            {
                // dd($value['lama_sewa']);
                $total +=($value['lama_sewa'] * $value['harga_sewa']+ ($value['denda'])); 
                // dd($total);
            }
            
            $denda=0;
            foreach ($query as $value)
    
            {
                // dd($value['lama_sewa']);
                $denda +=($value['denda']); 
                // dd($total);
            }
            // dd($denda);
            $data['dendatotal']     = $denda; 
            // $data['tahun']=$tahun;
            $data['total']     = $total; 
            $data['tahun']='';
            $data['bulan']='';
            $data['mulai']= $mulai;
            // dd($data['mulai']);
            $data['akhir']= $akhir;
           
            
            
        }
        else if ($bulan != null && $tahun!=null) {
            $query = $this->transModel->getreportwaktu($bulan,$tahun);
            $total=0;
            foreach ($query as $value)
    
            {
                // dd($value['lama_sewa']);
                $total +=($value['lama_sewa'] * $value['harga_sewa']+ ($value['denda'])); 
                // dd($total);
            }
            
            $denda=0;
            foreach ($query as $value)
    
            {
                // dd($value['lama_sewa']);
                $denda +=($value['denda']); 
                // dd($total);
            }
            // dd($denda);
            $data['dendatotal']     = $denda; 
            // $data['tahun']=$tahun;
            $data['total']     = $total; 
            $data['tahun']=$tahun;
            $data['total']     = $total; 
            $data['tahun']=$tahun;
            if($bulan=="01"){
                $bulan="Januari";
            }if($bulan=="02"){
                $bulan="Februari";
            }if($bulan=="03"){
                $bulan="Maret";
            }if($bulan=="04"){
                $bulan="April";
            }if($bulan=="05"){
                $bulan="Mei";
            }if($bulan=="06"){
                $bulan="Juni";
            }if($bulan=="07"){
                $bulan="Juli";
            }if($bulan=="08"){
                $bulan="Agustus";
            }if($bulan=="09"){
                $bulan="September";
            }if($bulan=="10"){
                $bulan="Oktober";
            }if($bulan=="11"){
                $bulan="November";
            }if($bulan=="12"){
                $bulan="Desember";
            }
            $data['bulan']=$bulan;
            $data['mulai']= '';
            // dd($data['mulai']);
            $data['akhir']= '';
            // $query1 = $this->transModel->getreportjumlah($bulan,$tahun);
            // // dd($query1);
        }
        // else if ($tahun != null) {
        //     $query = $this->transModel->getreportwaktu($bulan,$tahun);
        // }
        // dd($query->get()->getResultArray());
            
        $array1=json_encode($query);
        // $object1=json_decode($array1);
        $object1 = json_decode(json_encode ($query), FALSE);
        // dd($query);
// dd($query->get()->getResultArray());
        // $data['result']    = $query->paginate(5, 'trans');
        $datamotor = $this->motorModel->getmotorobject();
        // dd($datamotor->get()->getResultArray());
        $data['result']    = $query;
        $data['motor']=$datamotor->paginate(4, 'motor');
        $data['pager']     = $this->motorModel->pager;
      
        $data['page']      = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['patchTitle']    = 'Transaksi';
        $data['title']     = 'Data Transaksi';
        // $data['total']     =  $data['result'['harga_sewa']] ;
        // $data['jumlah']     = $query1;
     
         
        


        return view('laporan/index-laporan', $data);
    }

    public function cetak(){
        $dataTrans = $this->transModel->getJoinTrans();
        
        // dd($dataTrans);
        $pager = \Config\Services::pager();
        $kunci = $this->request->getVar('cari');
        $tahun = $this->request->getVar('tahun');
        $bulan = $this->request->getVar('bulan');
        // dd($dataTrans->get()->getResultArray());

        if ($tahun == null || $bulan == null) {
            $query = $dataTrans;
            $querytota = $dataTrans;
            $total=0;
            foreach ($querytota as $value)
    
            {
                // dd($value['lama_sewa']);
                $total +=($value['lama_sewa'] * $value['harga_sewa']+ ($value['denda'])); 
            }
            // dd($total);
            $data['total']     = $total; 
            // dd($query);
        } 
        else if ($bulan != null || $tahun!=null) {
            $query = $this->transModel->getreportwaktu($bulan,$tahun);
            $total=0;
            foreach ($query as $value)
    
            {
                // dd($value['lama_sewa']);
                $total +=($value['lama_sewa'] * $value['harga_sewa']+ ($value['denda'])); 
                // dd($total);
            }
            
            $data['total']     = $total; 
            // $query1 = $this->transModel->getreportjumlah($bulan,$tahun);
            // // dd($query1);
        }
        // else if ($tahun != null) {
        //     $query = $this->transModel->getreportwaktu($bulan,$tahun);
        // }
        // dd($query->get()->getResultArray());
            
        // $array1=json_encode($query);
        // // $object1=json_decode($array1);
        // $object1 = json_decode(json_encode ($query), FALSE);
        // dd($query);
// dd($query->get()->getResultArray());
        // $data['result']    = $query->paginate(5, 'trans');
        $data['result']    = $query;
        // $data['pager']     = $query->pager;
       
        // $data['page']      = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        // $data['patchTitle']    = 'Transaksi';
        $data['title']     = 'Data Transaksi';
        // $report = $this->sale->getInvo($sale_id);
    
        // $data=[
        //     'title'=> 'Laporan Pembelian',
        //     'result'=> $dataTrans,
        // ];
        $html = view('laporan/cetak',$data);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $dompdf->render();
        
        // Output the generated PDF to Browser
        $dompdf->stream('laporan-waktu.pdf');
        
        // $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8',false);
        // $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);
        // $pdf->AddPage();
        // $pdf->writeHTML($html);
        // $this->response->setContentType('application/pdf');
        // $pdf->Output('laporan-penyewaan.pdf','I');
    
    }
    public function cetakpdf(){
        $dataTrans = $this->transModel->getJoinTrans();
        
        // dd($dataTrans);
        $pager = \Config\Services::pager();
        $kunci = $this->request->getVar('cari');
        $tahun = $this->request->getVar('tahun1');
        $bulan = $this->request->getVar('bulan1');
        $mulai = $this->request->getVar('mulai');
        $akhir = $this->request->getVar('akhir');
        // dd($this->request->getVar('bulan1'));

        if ($tahun == null && $bulan == null &&$mulai == null && $akhir ==null){
            $query = $dataTrans;
            $querydenda= $this->pengembalianModel->denda();
            $querytota = $dataTrans;
            $total=0;
            foreach ($querytota as $value)
    
            {
                // dd($value['lama_sewa']);
                $total +=($value['lama_sewa'] * $value['harga_sewa']+ ($value['denda'])); 
            }
            $denda=0;
            foreach ($querydenda as $value)
    
            {
                // dd($value['lama_sewa']);
                $denda +=($value['denda']); 
                // dd($total);
            }
            // dd($total);
            $data['results']= $querydenda;
            $data['total']     = $total; 
            $data['tahun']='';
            // dd($query);
        }  else if ($mulai != null || $akhir !=null) {
            $query = $this->transModel->getreporttgl($mulai,$akhir);
            // dd($mulai);
            // dd($query);
            $total=0;
            foreach ($query as $value)
    
            {
                // dd($value['lama_sewa']);
                $total +=($value['lama_sewa'] * $value['harga_sewa']+ ($value['denda'])); 
                // dd($total);
            }
            
            $denda=0;
            foreach ($query as $value)
    
            {
                // dd($value['lama_sewa']);
                $denda +=($value['denda']); 
                // dd($total);
            }
            // dd($denda);
            $data['dendatotal']     = $denda; 
            // $data['tahun']=$tahun;
            $data['total']     = $total; 
            $data['tahun']='';
            $data['bulan']='';
            $data['mulai']= $mulai;
            // dd($data['mulai']);
            $data['akhir']= $akhir;
           
            
        }
        else if ($bulan != null || $tahun!=null) {
            $query = $this->transModel->getreportwaktu($bulan,$tahun);
            $total=0;
            foreach ($query as $value)
    
            {
                // dd($value['lama_sewa']);
                $total +=($value['lama_sewa'] * $value['harga_sewa']+ ($value['denda'])); 
                // dd($total);
            }
            
            $data['total']     = $total; 
            $data['tahun']=$tahun;
            // $query1 = $this->transModel->getreportjumlah($bulan,$tahun);
            // // dd($query1);
        }
        // else if ($tahun != null) {
        //     $query = $this->transModel->getreportwaktu($bulan,$tahun);
        // }
        // dd($query->get()->getResultArray());
            
        $array1=json_encode($query);
        // $object1=json_decode($array1);
        $object1 = json_decode(json_encode ($query), FALSE);
        // dd($query);
// dd($query->get()->getResultArray());
        // $data['result']    = $query->paginate(5, 'trans');
        $datamotor = $this->motorModel->getmotorobject();
        // dd($datamotor->get()->getResultArray());
        $data['result']    = $query;
        $data['motor']=$datamotor->paginate(4, 'motor');
        $data['pager']     = $this->motorModel->pager;
      
        $data['page']      = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['patchTitle']    = 'Transaksi';
        $data['title']     = 'Data Transaksi';
        // $data['total']     =  $data['result'['harga_sewa']] ;
        // $data['jumlah']     = $query1;
     
        // $data['total']     =  $data['result'['harga_sewa']] ;
        // $data['jumlah']     = $query1;
     
         
        
        // $data=[
        //     'title'=> 'Laporan Pembelian',
        //     // 'result'=> $dataTrans,
        // ];
        $html = view('laporan/cetak',$data);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $dompdf->render();
        
        // Output the generated PDF to Browser
        $dompdf->stream('laporan-waktu.pdf');
        // $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8',false);
        // $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);
        // $pdf->AddPage();
        // $pdf->writeHTML($html);
        // $this->response->setContentType('application/pdf');
        // $pdf->Output('laporan-penyewaan.pdf','I');
    
    }
    public function cetakmotor(){
        $dataTrans = $this->transModel->getJoinTrans();
        
        // dd($dataTrans);
        $pager = \Config\Services::pager();
        $kunci = $this->request->getVar('cari');
        $tahun = $this->request->getVar('tahun');
        $bulan = $this->request->getVar('bulan');
        $id = $this->request->getVar('id_motor');
        // dd($dataTrans->get()->getResultArray());

        if ($id == null) {
            $query = $dataTrans;
            $querydenda= $this->pengembalianModel->denda();
            // dd($querydenda);
            $querytota = $dataTrans;
            $total=0;
            foreach ($querytota as $value)
    
            {
                // dd($value['lama_sewa']);
                $total +=($value['lama_sewa'] * $value['harga_sewa']+ ($value['denda'])); 
            }
            $denda=0;
            foreach ($querydenda as $value)
    
            {
                // dd($value['lama_sewa']);
                $denda +=($value['denda']); 
                // dd($total);
            }
            // dd($total);
            $data['nama']='';
            $data['dendatotal']     = $denda;
            $data['total']     = $total; 
            $data['tahun']='';
            // dd($query);
        } 
        else if ($id != null ) {
            $query = $this->transModel->getreportmotor($id);
            // dd($query);
            $total=0;
            foreach ($query as $value)
    
            {
                // dd($value['lama_sewa']);
                $total +=($value['lama_sewa'] * $value['harga_sewa']+ ($value['denda'])); 
                // dd($total);
            }
            $denda=0;
            foreach ($query as $value)
    
            {
                // dd($value['lama_sewa']);
                $denda +=($value['denda']); 
                // dd($total);
            }
            // dd($denda);
            $data['nama']=$kunci;
            $data['dendatotal']     = $denda; 
            // $data['tahun']=$tahun;
            $data['total']     = $total; 
            $data['tahun']=$tahun;
            // $query1 = $this->transModel->getreportjumlah($bulan,$tahun);
            // // dd($query1);
        }
        // else if ($tahun != null) {
        //     $query = $this->transModel->getreportwaktu($bulan,$tahun);
        // }
        // dd($query->get()->getResultArray());
            
        $array1=json_encode($query);
        // $object1=json_decode($array1);
        $object1 = json_decode(json_encode ($query), FALSE);
        // dd($query);
// dd($query->get()->getResultArray());
        // $data['result']    = $query->paginate(5, 'trans');
        $datamotor = $this->motorModel->getmotorobject();
        // dd($datamotor->get()->getResultArray());
        $data['result']    = $query;
        $data['motor']=$datamotor->paginate(4, 'motor');
        $data['pager']     = $this->motorModel->pager;
      
        $data['page']      = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['patchTitle']    = 'Transaksi';
        $data['title']     = 'Data Transaksi';
        
        $html = view('laporan/cetakmotor',$data);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $dompdf->render();
        // $dompdf->Output('laporan-motor.pdf','I');
        // Output the generated PDF to Browser
        
        $dompdf->stream('laporan-motor.pdf');
      
        // $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8',false);
        // $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);
        // $pdf->AddPage();
        // $pdf->writeHTML($html);
        // $this->response->setContentType('application/pdf');
        // $pdf->Output('laporan-motor.pdf','I');
    }
    
}
