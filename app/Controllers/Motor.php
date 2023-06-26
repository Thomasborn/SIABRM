<?php

namespace App\Controllers;

use \App\Models\MotorModel;

class Motor extends BaseController
{
    private $motorModel;
    public function __construct()
    {
        $this->motorModel = new MotorModel();
    }
    // public function caris(){
    //     echo $this->caris();
    // }
    public function cari()
    {
        $kunci = $this->request->getVar('query');
        // dd($kunci);
        // if ($kunci == null) {
        //     $query = $this->motorModel->getmotor();
        // } else if ($kunci) {
            $query = $this->motorModel->searchMotor($kunci);
            // dd($query);
        // }
        // dd($this->motorModel->searchMotor('sil')->get()->getResultArray());

        $data['result'] = $query;
        $data['patchTitle'] = 'Motor';
        $data['title'] = 'Data Motor';

        return $data;
    }
    public function index()
    {
        
        $kunci = $this->request->getVar('cari');
        if ($kunci == null) {
            $query = $this->motorModel->getmotor();
        } else if ($kunci != null) {
            $query = $this->motorModel->pencarian($kunci);
        }

        $data['result'] = $query->get()->getResultArray();
        $data['patchTitle'] = 'Motor';
        $data['title'] = 'Data Motor';

        return view('motor/index-motor', $data);
    }

    public function detail($plat)
    {
        $datamotor = $this->motorModel->getmotor($plat);
        $data = [
            'title' => 'Detail Motor',
            'patchTitle' => 'Motor / Detail Motor',
            'validation' => \Config\Services::validation(),
            'result' => $datamotor
        ];
        return view('motor/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Tambah Motor',
            'patchTitle' => 'Motor / Tambah Motor',
            'validation' => \Config\Services::validation()
        ];
        return view('motor/entry', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_motor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama motor harus diisi'
                ]
            ],
            'merk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Merk motor harus diisi'
                ]
            ],
            'warna' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Warna motor harus diisi'
                ]
            ],
            'no_polisi' => [
                'rules' => 'required|is_unique[daftar_motor.no_polisi]',
                'errors' => [
                    'required' => 'No Polisi harus diisi',
                    'is_unique' => 'No Polisi sudah ada'
                ]
            ],
            'harga_sewa' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Harga sewa harus diisi',
                    'integer' => 'Harga sewa hanya boleh angka'
                ]
            ],
            'gambar' =>
            [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Extensi file harus .jpg, .jpeg, .png',
                ]
            ],

        ])) {
            return redirect()->to('motor/entry')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaFile = $this->defaultImage;
        } else {
            $namaFile = $fileGambar->getRandomName();
            $fileGambar->move('assets/img', $namaFile);
        }
        $plat = url_title($this->request->getVar('no_polisi'), '-', true);
        $this->motorModel->save([
            'nama_motor' => $this->request->getVar('nama_motor'),
            'merk' => $this->request->getVar('merk'),
            'warna' => $this->request->getVar('warna'),
            'no_polisi' => $this->request->getVar('no_polisi'),
            'status_motor' => 'Tersedia',
            'harga_sewa' => $this->request->getVar('harga_sewa'),
            'plat' => $plat,
            'gambar' => $namaFile
        ]);
        session()->setFlashdata("msg", "Data berhasil ditambahkan!");
        return redirect()->to('/motor');
    }

    public function edit($plat)
    {
        $datamotor = $this->motorModel->getmotor($plat);
        if (empty($datamotor)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Motor dengan No Polisi: $plat tidak ditemukan!");
        }
        $data = [
            'title' => 'Ubah Motor',
            'patchTitle' => 'Motor / Ubah Motor',
            'validation' => \Config\Services::validation(),
            'result' => $datamotor
        ];
        return view('motor/edit', $data);
    }

    public function update($id)
    {
        $dataOld = $this->motorModel->getmotor($this->request->getVar('plat'));
        if ($dataOld['no_polisi'] == $this->request->getVar('no_polisi')) {
            $rule_plat = 'required';
        } else {
            $rule_plat = 'required|is_unique[daftar_motor.no_polisi]';
        }

        if (!$this->validate([
            'nama_motor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama motor harus diisi'
                ]
            ],
            'merk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Merk motor harus diisi'
                ]
            ],
            'warna' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Warna motor harus diisi'
                ]
            ],
            'no_polisi' => [
                'rules' => $rule_plat,
                'errors' => [
                    'required' => 'No Polisi harus diisi',
                    'is_unique' => 'No Polisi sudah ada'
                ]
            ],
            'harga_sewa' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Harga sewa harus diisi',
                    'integer' => 'Harga sewa hanya boleh angka'
                ]
            ],
            'gambar' =>
            [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Extensi file harus .jpg, .jpeg, .png',
                ]
            ],

        ])) {
            return redirect()->to('/motor/edit/' . $this->request->getVar('plat'))->withInput();
        }

        $namaFileLama = $this->request->getVar('gambarLama');
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaFile = $namaFileLama;
        } else {
            $namaFile = $fileGambar->getRandomName();
            $fileGambar->move('assets/img', $namaFile);
            if ($namaFileLama != $this->defaultImage && $namaFileLama != "") {
                unlink('assets/img/' . $namaFileLama);
            }
        }
        $plat = url_title($this->request->getVar('no_polisi'), '-', true);
        $this->motorModel->save([
            'id_motor' => $id,
            'nama_motor' => $this->request->getVar('nama_motor'),
            'merk' => $this->request->getVar('merk'),
            'warna' => $this->request->getVar('warna'),
            'no_polisi' => $this->request->getVar('no_polisi'),

            'harga_sewa' => $this->request->getVar('harga_sewa'),
            'plat' => $plat,
            'gambar' => $namaFile
        ]);
        session()->setFlashdata("msg", "Data berhasil diubah!");
        return redirect()->to('/motor');
    }

    public function delete($id)
    {
        $datamotor = $this->motorModel->find($id);
        $this->motorModel->delete($id);

        if ($datamotor['gambar'] != $this->defaultImage) {
            unlink('assets/img/' . $datamotor['gambar']);
        }

        session()->setFlashdata("msg", "Data motor berhasil dihapus!");
        return redirect()->to('/motor');
    }
}
