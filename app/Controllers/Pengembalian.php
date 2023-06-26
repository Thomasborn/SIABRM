<?php

namespace App\Controllers;

use App\Models\DetailengembalianModel;
use App\Models\PengembalianModel;
use App\Models\PenyewaModel;
use App\Models\Transaksi;
use App\Models\TransaksiModel;
use Myth\Auth\Models\UserModel;
use App\Models\DetailPengembalianModel;
use App\Models\DetailSementaraModel;
use App\Models\MotorModel;

class Pengembalian extends BaseController
{
    public function __construct()
    {
        $this->pengembalianModel = new PengembalianModel();
        $this->transaksiModel = new TransaksiModel();
        $this->userModel = new UserModel();
        $this->detailPengembalianModel = new DetailPengembalianModel();
        $this->detailsementara = new DetailSementaraModel();
        $this->motorModel = new MotorModel();
        $this->penyewaModel = new PenyewaModel();
    }

    public function index()
    {
        $kunci = $this->request->getVar('cari');

        if ($kunci == null) {
            $query = $this->pengembalianModel->getDenda();
            // dd($query);
        } else if ($kunci != null) {
            $query = $this->pengembalianModel->cariPengembalian($kunci);
        }

        $data['result'] = $query->get()->getResultArray();
        $data['patchTitle'] = 'Pengembalian';
        $data['title'] = 'Data Pengembalian';

        return view('pengembalian/index-pengembalian', $data);
    }

    public function edit($id_Pengembalian)
    {
        date_default_timezone_set("Asia/Jakarta");
        $date = date('m/d/Y a', time());
        $dataPengembalian = $this->pengembalianModel->getpem($id_Pengembalian);
        if (empty($dataPengembalian)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Pengembalian dengan No : $id_Pengembalian tidak ditemukan!");
        }
        // dd($dataPengembalian);
        $data = [
            'title' => 'Kembalikan',
            'patchTitle' => 'Pengembalian / Kembalikan',
            'validation' => \Config\Services::validation(),
            'result' => $dataPengembalian,
            'date' => $date,
        ];
        return view('pengembalian/kembalikan', $data);
    }

    public function showCart()
    {
        $output = '';
        // $no = 1;
        $detail = $this->detailsementara->getPengembalian();
        $data = [
            'detail' => $detail,
        ];
        // dd($detail);
        foreach ($detail as $value) {
            // dd($value);
            $output .= '
            <tr>
                <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                        <h6 class="mb-0 ml-5 text-sm leading-normal dark:text-white">'  . $value['nama_kerusakan'] . '</h6>
                            <div class="flex flex-col justify-center">
                        </div>
                    </div>
                </td>
                <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">' . $value['denda'] . '</p>
                </td>
                <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">' . $value['keterangan'] . '</p>
                </td> <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <button type="submit" id="' . $value['rowid'] . '"value=" ' . $value['rowid'] . '"class="hapus_detail bg-red-600 rounded-lg px-2 py-1 text-white text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            ';
        }


        if (!$this->detailsementara->findAll()) {
            $output = '<tr> <td class="pt-4" colspan="7" align="center">Belum ada detail yang ditambahkan!</td></tr>';
        }
        return $output;
    }
    public function loadCart()
    {
        echo $this->showCart();
    }
    public function addCart()
    {
        $this->detailsementara->insert(
            [
                'rowid'        => $this->request->getVar('rowid'),
                'id_pengembalian'        => $this->request->getVar('id'),
                'nama_kerusakan'      => $this->request->getVar('nama'),
                'denda'       => $this->request->getVar('denda'),
                'keterangan'     => $this->request->getVar('ket'),
                // 'price'     => $this->request->getVar('price'),
            ]
        );
        echo $this->showCart();
    }

    public function kembalikan($id)
    {

        if (!$this->validate([
            'tanggal_kembali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal kembali harus diisi'
                ]
            ],
        ])) {
            return redirect()->to('/pengembalian/kembalikan/' . $id)->withInput();
        }

        // dd($this->request->getVar('tanggal_kembali'));
        $this->pengembalianModel->save([
            'id_pengembalian' => $id,
            'id_transaksi_sewa' => $this->request->getVar('id_transaksi_sewa'),
            'id_user' => $this->request->getVar('user'),
            'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
        ]);
        $detail = $this->detailsementara->getPengembalian();
        // dd($detail);
        foreach ($detail as $items) {
            $this->detailPengembalianModel->insert([
                'id_pengembalian' => $id,
                'nama_kerusakan' => $items['nama_kerusakan'],
                'denda' => $items['denda'],
                'keterangan' => $items['keterangan'],
                // 'total_price' => $items['subtotal'],
            ]);
        }
        // $detailp = $this->detailpengembalian->findAll();
        // dd($detailp);
        $idmotor = $this->transaksiModel->getSingleJoinTrans($this->request->getVar('id_transaksi_sewa'));
        $idpenyewa = $this->transaksiModel->getSingleJoinTrans($this->request->getVar('id_transaksi_sewa'));
        // dd($idmotor['id_motor']);
        // $motor = $this->motorModel->getmotorid($idmotor['id_motor']);

        $this->motorModel->save([
            'id_motor' => $idmotor['id_motor'],
            'status_motor' => 'Tersedia',
        ]);

        $this->penyewaModel->save([
            'id_penyewa' => $idpenyewa['id_penyewa'],
            'status' => 'Y',
        ]);

        $this->detailsementara->truncate();
        return redirect()->to('/pengembalian');
    }

    public function delete($id)
    {
        $dataPengembalian = $this->detailPengembalianModel->getDetailPengembalian($id);
        $this->detailPengembalianModel->delete($id);
        $this->pengembalianModel->save([
            'id_pengembalian' => $id,
            // 'id_transaksi_sewa' => $this->request->getVar('id_transaksi_sewa'),
            'id_user' => $this->request->getVar('user'),
            'tanggal_kembali' => ""
        ]);
        // $this->detailPengembalianModel->save([
        //     'id_pengembalian' => $id,
        //     'nama_kerusakan' => $items['nama_kerusakan'],
        //     'denda' => $items['denda'],
        //     'keterangan' => $items['keterangan'],
        //     // 'total_price' => $items['subtotal'],
        // ]);
        session()->setFlashdata("msg", "Data Pengembalian berhasil dihapus!");
        return redirect()->to('/pengembalian');
    }

    public function deleteCart($rowid)
    {
        $this->detailsementara->delete($rowid);
        echo $this->showCart();
    }

    public function nota($id)
    {
        $result = $this->pengembalianModel->getPengem($id)->first();
        $detail = $this->detailPengembalianModel->getDetailPengembalian($id)->get()->getResultArray();
        $denda = $this->detailPengembalianModel->getTotalDenda($id);
        // dd($denda);
        $harga = $result['harga_sewa'];
        $tglAkhir = strtotime($result['tanggal_akhir_sewa']);
        $tglKembali = strtotime($result['tanggal_kembali']);

        $difference = $tglKembali - $tglAkhir;
        if ($difference < 0) {
            $difference = 0;
        }
        $hours = ($difference / 3600);
        $hours = ceil($hours);
        // dd($hours);

        $overCharge = 0.1 * $harga * $hours;
        if ($overCharge == null) {
            $overCharge = 0;
        }
        // dd($overCharge);

        $data = [
            'title' => 'Cetak Nota',
            'patchTitle' => 'Cetak Nota',
            'result' => $result,
            'detail' => $detail,
            'denda' => $denda,
            'hours' => $hours,
            'harga' => 0.1 * $harga,
            'overcharge' => $overCharge,
        ];
        return view('pengembalian/nota', $data);
    }
    public function exportin($id)
    {
        $dataPengembalian = $this->pengembalianModel->getDenda($id_Pengembalian);
        $data = [
            'title' => 'Laporan Penjualan',
            'result' => $dataPengembalian,
        ];
        $html = view('pengembalian/export',$data);
        
        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8',false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('nota.pdf','I');
    }
    public function detail($id)
    {
        $dataPengembalian = $this->pengembalianModel->getSingleJoinPengembalian($id);
        $detail = $this->detailPengembalianModel->getPengembalian($id);
        // dd($detail);
        // $transaksi = $this->Transaksi->get($id_Pengembalian);
        // dd($dataPengembalian);
        $data = [
            'title' => 'Detail Pengembalian',
            'patchTitle' => 'Pengembalian / Detail Pengembalian',
            'validation' => \Config\Services::validation(),
            'result' => $dataPengembalian,
            'detail' => $detail
        ];
        return view('pengembalian/detail', $data);
    }
}
