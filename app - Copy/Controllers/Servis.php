<?php

namespace App\Controllers;

use App\Models\ServisModel;
use App\Models\DetailServisModel;
use App\Models\MotorModel;
use App\Models\DetailServisModelTemproray;

class Servis extends BaseController
{
    private $servisModel;
    private $detailServisModel;
    private $detailsementara;
    public function __construct()
    {
        $this->servisModel = new ServisModel();
        $this->detailServisModel = new DetailServisModel();
        $this->motorModel = new MotorModel();
        $this->detailsementara = new DetailServisModelTemproray();
    }

    public function index()
    {
        $kunci = $this->request->getVar('cari');

        if ($kunci == null) {
            $query = $this->servisModel->getJoinServis();
        } else if ($kunci != null) {
            $query = $this->servisModel->pencarian($kunci);
        }

        $data['result'] = $query->get()->getResultArray();
        $data['patchTitle'] = 'Servis';
        $data['title'] = 'Data Servis';

        return view('servis/index-servis', $data);
    }
    // public function detail($plat)
    // {
    //     $datamotor = $this->motorModel->getmotor($plat);
    //     $data = [
    //         'title' => 'Detail Motor',
    //         'patchTitle' => 'Motor / Detail Motor',
    //         'validation' => \Config\Services::validation(),
    //         'result' => $datamotor
    //     ];
    //     return view('motor/detail', $data);
    // }

    public function create()
    {
        $query = $this->motorModel->motorAktif();
        $query1 = $this->servisModel->getid();
        // dd($query1);
        $data['result']= $query1;
        $data['motor'] = $query->paginate(5, 'motor');
        $data['pager'] = $this->motorModel->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['validation'] = \Config\Services::validation();
        $data['patchTitle'] = 'Servis';
        $data['title'] = 'Tambah Servis';
        return view('servis/entry', $data);
    }
    public function showCart()
    {
        $output = '';
        // $no = 1;
        $detail = $this->detailsementara->getdetail();
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
                        <h6 class="mb-0 ml-5 text-sm leading-normal dark:text-white">'  . $value['nama_servis'] . '</h6>
                            <div class="flex flex-col justify-center">
                        </div>
                    </div>
                </td>
                <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">' . $value['harga'] . '</p>
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
                // 'rowid'        => $this->request->getVar('rowid'),
                'id_servis'        => $this->request->getVar('id'),
                'nama_servis'      => $this->request->getVar('nama'),
                'harga'       => $this->request->getVar('harga'),
                'keterangan'     => $this->request->getVar('ket'),
                // 'price'     => $this->request->getVar('price'),
            ]
        );
        echo $this->showCart();
    }
    public function detail($id)
    {
        $dataPengembalian = $this->servisModel->getser($id);
        $detail = $this->detailServisModel->getSingleJoinServis($id);
        // 
        // dd($detail);
        $data = [
            'title' => 'Servis',
            'patchTitle' => 'Servis / Detail',
            'validation' => \Config\Services::validation(),
            'result' => $dataPengembalian,
            'detail' => $detail,
        ];
        return view('servis/detail', $data);
    }
    public function save($id)
    {

        if (!$this->validate([
            'tanggal_servis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal mulai harus diisi'
                ]
            ],'tanggal_selesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal selesai harus diisi'
                ]
            ],
            'nama_bengkel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama_bengkel harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat harus diisi'
                ]
            ],
        ])) {
            return redirect()->to('/servis/entry/' . $id)->withInput();
        }

        // dd($this->request->getVar('tanggal_kembali'));
        $this->servisModel->save([
            // 'id_servis' => $id,
            'nama_bengkel' => $this->request->getVar('nama_bengkel'),
            'alamat' => $this->request->getVar('alamat'),
            'telp' => $this->request->getVar('telp'),
            'tanggal_servis' => $this->request->getVar('tanggal_servis'),
            'tanggal_selesai' => $this->request->getVar('tanggal_selesai'),
        ]);
        $detail = $this->detailsementara->getdetail();
        // dd($id);
        foreach ($detail as $items) {
            $this->detailServisModel->insert([
                'id_servis' => $id,
                'nama_servis' => $items['nama_servis'],
                'harga' => $items['harga'],
                'keterangan' => $items['keterangan'],
                // 'total_price' => $items['subtotal'],
            ]);
        }
        // $detailp = $this->detailpengembalian->findAll();
        // dd($detailp);
        // $idmotor =  $this->motorModel->motorAktif();
        // $idpenyewa = $this->transaksiModel->getSingleJoinTrans($this->request->getVar('id_transaksi_sewa'));
        // dd($idmotor['id_motor']);
        // $motor = $this->motorModel->getmotorid($idmotor['id_motor']);

        $this->motorModel->save([
            'id_motor' =>  $this->request->getVar('id_motor'),
            'status_motor' => 'Diservis',
        ]);

        // $this->penyewaModel->save([
        //     'id_penyewa' => $idpenyewa['id_penyewa'],
        //     'status' => 'Y',
        // ]);

        $this->detailsementara->truncate();
        return redirect()->to('/servis');
    }

    public function delete($id)
    {
        // $dataPengembalian = $this->servisModel->find($id);
        $this->servisModel->delete($id);

        session()->setFlashdata("msg", "Data Pengembalian berhasil dihapus!");
        return redirect()->to('/pengembalian');
    }

    public function deleteCart($rowid)
    {
        $this->detailsementara->delete($rowid);
        echo $this->showCart();
    }

}
