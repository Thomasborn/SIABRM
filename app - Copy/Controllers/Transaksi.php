<?php

namespace App\Controllers;

use App\Models\DetailPengembalianModel;
use App\Models\TransaksiModel;
use App\Models\MotorModel;
use App\Models\PenyewaModel;
use App\Models\PengembalianModel;
use CodeIgniter\I18n\Time;
use DateTime;
use TCPDF;
use Dompdf\Dompdf;

class Transaksi extends BaseController
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

    public function index()
    {
        $kunci = $this->request->getVar('cari');

        if ($kunci == null) {
            $query = $this->transModel->getJoinTrans();
        } else if ($kunci != null) {
            $query = $this->transModel->pencarian($kunci);
        }

        $data['result']    = $query;
        $data['patchTitle']    = 'Transaksi';
        $data['title']     = 'Data Transaksi';

        return view('transaksi/index-transaksi', $data);
    }

    public function detail($id)
    {
        $dataTrans = $this->transModel->getSingleJoinTrans($id);

        // menghitung hari
        $earlier = new DateTime($dataTrans['tanggal_mulai_sewa']);
        $later = new DateTime($dataTrans['tanggal_akhir_sewa']);
        $diff = $earlier->diff($later)->format("%a");

        // menghitung total harga
        $total_harga = $dataTrans['harga_sewa'] * $diff;

        $data = [
            'title' => 'Detail Data Transaksi',
            'patchTitle' => 'Transaksi / Detail Data Transaksi',
            'jumlah_hari' => $diff,
            'total_harga' => $total_harga,
            'result' => $dataTrans,
        ];
        return view('transaksi/detail', $data);
    }

    public function create()
    {
        $datamotor = $this->motorModel->motorAktif();
        // $datapenyewa = $this->penyewaModel->getPenyewaAktif();
        // $dataPeny = $this->penyewaModel->penyewaAktif();
        // dd($dataPeny->get()->getResultArray());
        // dd($datamotor);
        // dd($datapenyewa);
        $kunci = $this->request->getVar('cari');
        $kunci1 = $this->request->getVar('cari1');

        if ($kunci == null) {
            $query = $this->motorModel->motorAktif();
        } else if ($kunci != null) {
            $query = $this->motorModel->pencarianAktif($kunci);
        }

        if ($kunci1 == null) {
            $query1 = $this->penyewaModel->penyewaAktif();
        } else if ($kunci1 != null) {
            $query1 = $this->penyewaModel->pencarianAktif($kunci);
        }

        $data['validation'] = \Config\Services::validation();
        $data['motor'] = $query->get()->getResultArray();
        $data['penyewa'] = $query1->get()->getResultArray();
        $data['patchTitle'] = 'Tambah Transaksi';
        $data['title'] = 'Tambah Transaksi';

        return view('transaksi/entry', $data);
    }

    public function save()
    {
        if (!$this->validate([
            //fiels transaksi sewa
            'tanggal_mulai_sewa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal mulai sewa harus diisi'
                ]
            ],
            'tanggal_akhir_sewa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal akhir sewa harus diisi'
                ],

            ],
            'jaminan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jaminan hari harus diisi'
                ]
            ],

            //fields motor
            'id_motor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Id motor harus ada'
                ],
            ],
            // 'nama_motor' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nama motor harus ada'
            //     ],
            // ],
            // 'no_polisi' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'No polisi harus ada'
            //     ],
            // ],
            // 'merk' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Merk harus ada'
            //     ],
            // ],
            // 'harga_sewa' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Harga sewa harus ada'
            //     ],
            // ],

            //fields penyewa
            'id_penyewa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Id penyewa harus ada'
                ],
            ],
            // 'nama_penyewa' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nama penyewa harus ada'
            //     ],
            // ],
            // 'alamat_domisili' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Alamat domisili harus ada'
            //     ],
            // ],
            // 'hp_penyewa' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'No HP penyewa harus ada'
            //     ],
            // ],
            // 'universitas' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Universitas harus ada'
            //     ],
            // ],
        ])) {
            return redirect()->to('transaksi/entry')->withInput();
        }

        $this->transModel->insert([
            'id_motor' => $this->request->getVar('id_motor'),
            'id_user' => $this->request->getVar('id_user'),
            'id_penyewa' => $this->request->getVar('id_penyewa'),
            'tanggal_transaksi_sewa' => Time::now(),
            'tanggal_mulai_sewa' => $this->request->getVar('tanggal_mulai_sewa'),
            'tanggal_akhir_sewa' => $this->request->getVar('tanggal_akhir_sewa'),
            'jaminan' => $this->request->getVar('jaminan'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        $id_trans = $this->transModel->insertID();

        $this->pengembalianModel->insert([
            'id_transaksi_sewa' => $id_trans,
            'id_user' => $this->request->getVar('id_user'),
        ]);

        $this->motorModel->save([
            'id_motor' => $this->request->getVar('id_motor'),
            'status_motor' => 'Disewa'
        ]);

        $this->penyewaModel->save([
            'id_penyewa' => $this->request->getVar('id_penyewa'),
            'status' => 'N'
        ]);

        session()->setFlashdata("msg", "Data berhasil ditambahkan!");
        return redirect()->to('/transaksi');
    }

    public function delete($id)
    {
        $idpe=$this->transModel->getSingleJoinTrans($id);
        $this->transModel->delete($id);
        $this->pengembalianModel->delete($idpe['id_pengembalian']);
        $this->detailPengembalianModel->delete($idpe['id_pengembalian']);
        session()->setFlashdata("msg", "Data transaksi berhasil dihapus!");
        return redirect()->to('/transaksi');
    }
    public function exportin($id)
{
    $report = $this->transModel->getSingleJoinTrans($id);
    $data = [
        'title' => 'Laporan Penjualan',
        'result' => $report,
    ];
    $html = view('transaksi/export',$data);
    $dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
    //
    
    // $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8',false);
    // $pdf->setPrintHeader(false);
    // $pdf->setPrintFooter(false);
    // $pdf->AddPage();
    // $pdf->writeHTML($html);
    // $this->response->setContentType('application/pdf');
    // $pdf->Output('laporan-motor.pdf','I');
}

    public function nota($id)
    {
        $result = $this->transModel->getSingleJoinTrans($id);
        // $detail = $this->detailPengembalianModel->getDetailPengembalian($id);
        // $denda = $this->detailPengembalianModel->getTotalDenda($id);
        $data = [
            'title' => 'Cetak Nota',
            'patchTitle' => 'Cetak Nota',
            'result' => $result,
            // 'denda' => $denda,
        ];
        return view('transaksi/nota', $data);
    }
}
