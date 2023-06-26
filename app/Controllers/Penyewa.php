<?php

namespace App\Controllers;

use App\Models\PenyewaModel;

class Penyewa extends BaseController
{
    private $penyewaModel;
    public function __construct()
    {
        $this->penyewaModel = new PenyewaModel();
    }

    public function index()
    {
        $kunci = $this->request->getVar('cari');
        if ($kunci == null) {
            $query = $this->penyewaModel->getAllPenyewa();
        } else if ($kunci != null) {
            $query = $this->penyewaModel->pencarian($kunci);
        }

        $data['result'] = $query->get()->getResultArray();
        $data['patchTitle'] = 'Penyewa';
        $data['title'] = 'Data Penyewa';

        return view('penyewa/index-penyewa', $data);
    }

    public function detail($id_penyewa)
    {
        $datapenyewa = $this->penyewaModel->getPenyewa($id_penyewa);
        // dd($datapenyewa);
        $data = [
            'title' => 'Detail Penyewa',
            'patchTitle' => 'Penyewa / Detail Penyewa',
            'validation' => \Config\Services::validation(),
            'result' => $datapenyewa
        ];
        return view('penyewa/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Tambah Penyewa',
            'patchTitle' => 'Penyewa / Tambah Penyewa',
            'validation' => \Config\Services::validation()
        ];
        return view('penyewa/entry', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_penyewa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama penyewa harus diisi'
                ]
            ],
            'alamat_asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat asal harus diisi'
                ]
            ],
            'alamat_domisili' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat domisili harus diisi'
                ]
            ],
            'hp_penyewa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No HP harus diisi',
                    // 'integer' => 'hp_ortu hanya boleh angka'
                    // 'is_unique' => 'hp_penyewa sudah ada'
                ]
            ],
            'hp_ortu' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'HP Orang Tua/Wali harus diisi',
                    'integer' => 'Hanya boleh angka'
                ]
            ],
            'universitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Universitas harus diisi'
                ]
            ],
            'foto_penyewa' =>
            [
                'rules' => 'max_size[foto_penyewa,1024]|is_image[foto_penyewa]|mime_in[foto_penyewa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Extensi file harus .jpg, .jpeg, .png',
                ]
            ]

        ])) {
            return redirect()->to('penyewa/entry')->withInput();
        }

        $fileGambar = $this->request->getFile('foto_penyewa');
        if ($fileGambar->getError() == 4) {
            $namaFile = $this->defaultImage;
        } else {
            $namaFile = $fileGambar->getRandomName();
            $fileGambar->move('assets/img/penyewa', $namaFile);
        }

        $this->penyewaModel->insert([
            'nama_penyewa' => $this->request->getVar('nama_penyewa'),
            'alamat_asal' => $this->request->getVar('alamat_asal'),
            'alamat_domisili' => $this->request->getVar('alamat_domisili'),
            'hp_penyewa' => $this->request->getVar('hp_penyewa'),
            'hp_ortu' => $this->request->getVar('hp_ortu'),
            'universitas' => $this->request->getVar('universitas'),
            'foto_penyewa' => $namaFile
        ]);
        session()->setFlashdata("msg", "Data berhasil ditambahkan!");
        return redirect()->to('/penyewa');
    }

    public function edit($id_penyewa)
    {
        $datapenyewa = $this->penyewaModel->getpenyewa($id_penyewa);
        if (empty($datapenyewa)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("penyewa dengan No : $id_penyewa tidak ditemukan!");
        }
        $data = [
            'title' => 'Ubah penyewa',
            'patchTitle' => 'penyewa / Ubah penyewa',
            'validation' => \Config\Services::validation(),
            'result' => $datapenyewa
        ];
        return view('penyewa/edit', $data);
    }

    public function update($id)
    {
        $dataOld = $this->penyewaModel->getpenyewa($this->request->getVar('id_penyewa'));
        // dd($dataOld);
        if ($dataOld['hp_penyewa'] == $this->request->getVar('hp_penyewa')) {
            $rule_hp_penyewa = 'required';
        } else {
            $rule_hp_penyewa = 'required|is_unique[penyewa.hp_penyewa]';
        }

        if (!$this->validate([
            'nama_penyewa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama penyewa harus diisi'
                ]
            ],
            'alamat_asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat_asal harus diisi'
                ]
            ],
            'alamat_domisili' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat_domisili penyewa harus diisi'
                ]
            ],
            'hp_penyewa' => [
                'rules' => $rule_hp_penyewa,
                'errors' => [
                    'required' => 'hp_penyewa harus diisi',
                    // 'integer' => 'hp_ortu hanya boleh angka'
                    // 'is_unique' => 'hp_penyewa sudah ada'
                ]
            ],
            'hp_ortu' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'hp_ortu harus diisi',
                    'integer' => 'hp_ortu hanya boleh angka'
                ]
            ],
            'universitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'universitas harus diisi'
                ]
            ],
            'foto_penyewa' =>
            [
                'rules' => 'max_size[foto_penyewa,1024]|is_image[foto_penyewa]|mime_in[foto_penyewa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Extensi file harus .jpg, .jpeg, .png',
                ]
            ]

        ])) {
            return redirect()->to('/penyewa/edit/' . $this->request->getVar('id_penyewa'))->withInput();
        }

        $namaFileLama = $this->request->getVar('gambarLama');
        $fileGambar = $this->request->getFile('foto_penyewa');
        if ($fileGambar->getError() == 4) {
            $namaFile = $namaFileLama;
        } else {
            $namaFile = $fileGambar->getRandomName();
            $fileGambar->move('assets/img/penyewa', $namaFile);
            if ($namaFileLama != $this->defaultImage && $namaFileLama != "") {
                unlink('assets/img/penyewa/' . $namaFileLama);
            }
        }

        $this->penyewaModel->save([
            'id_penyewa' => $id,
            'nama_penyewa' => $this->request->getVar('nama_penyewa'),
            'alamat_asal' => $this->request->getVar('alamat_asal'),
            'alamat_domisili' => $this->request->getVar('alamat_domisili'),
            'hp_penyewa' => $this->request->getVar('hp_penyewa'),
            'hp_ortu' => $this->request->getVar('hp_ortu'),
            'universitas' => $this->request->getVar('universitas'),
            'foto_penyewa' => $namaFile
        ]);
        session()->setFlashdata("msg", "Data berhasil diubah!");
        return redirect()->to('/penyewa');
    }

    public function delete($id)
    {
        $datapenyewa = $this->penyewaModel->find($id);
        $this->penyewaModel->delete($id);

        if ($datapenyewa['foto_penyewa'] != $this->defaultImage) {
            unlink('assets/img/penyewa/' . $datapenyewa['foto_penyewa']);
        }

        session()->setFlashdata("msg", "Data penyewa berhasil dihapus!");
        return redirect()->to('/penyewa');
    }
}
