<?php

namespace App\Controllers;

use \Myth\Auth\Models\UserModel;
use App\Models\IdentitasUserModel;


class User extends BaseController
{
    private $UserModel;
    private $IdentitasUserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->IdentitasUserModel = new IdentitasUserModel();
    }

    public function index()
    {
        $kunci = $this->request->getVar('cari');
        if ($kunci == null) {
            $query = $this->UserModel->getIden();
        } else if ($kunci != null) {
            $query = $this->UserModel->pencarian($kunci);
        }
        // dd($query->get()->getResultArray());
        $data['result'] = $query->get()->getResultArray();
        $data['patchTitle'] = 'User';
        $data['title'] = 'Data User';

        return view('user/index-user', $data);
    }

    public function detail($id)
    {
        $dataJoinUser = $this->IdentitasUserModel->getIdentitasUser($id);
        $data = [
            'title' => 'Detail Data User',
            'patchTitle' => 'User / Detail Data User',
            'validation' => \Config\Services::validation(),
            'result' => $dataJoinUser,
        ];
        return view('user/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Tambah User',
            'patchTitle' => 'User \ Tambah',
            'validation' => \Config\Services::validation()
        ];
        return view('user/entry', $data);
    } public function regis()
    {
        session();
        $data = [
            'title' => 'Tambah User',
            'patchTitle' => 'User \ Tambah',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/register', $data);
    }

    public function edit($id)
    {
        $dataJoinUser = $this->IdentitasUserModel->getIdentitasUser($id);
        if (empty($dataJoinUser)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Id User: $id tidak ditemukan!");
        }
        $data = [
            'title' => 'Ubah Data User',
            'patchTitle' => 'User / Ubah Data User',
            'validation' => \Config\Services::validation(),
            'result' => $dataJoinUser,
        ];
        return view('user/edit', $data);
    }

    public function delete($id)
    {
        $datauser = $this->IdentitasUserModel->find($id);
        $this->UserModel->delete($id);
        $this->IdentitasUserModel->delete($id);

        if (isset($datauser['foto_user']) != $this->defaultImage && isset($datauser['foto_user']) != null) {
            unlink('assets/img/user/' . $datauser['foto_user']);
        }

        session()->setFlashdata("msg", "Data user berhasil dihapus!");
        return redirect()->to('/user');
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama lengkap harus diisi'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal lahir harus diisi'
                ]
            ],
            'hp_user' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Warna motor harus diisi',
                    'numeric' => 'No hp harus angka'
                ]
            ],
            'alamat_asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat asal harus diisi',
                ]
            ],
            'alamat_domisili' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat domisili harus diisi',
                ]
            ],
            'foto_user' =>
            [
                'rules' => 'max_size[foto_user,1024]|is_image[foto_user]|mime_in[foto_user,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Extensi file harus .jpg, .jpeg, .png',
                ]
            ],

        ])) {
            return redirect()->to('/user/edit/' . $id)->withInput();
        }

        $namaFileLama = $this->request->getVar('gambarLama');
        $fileGambar = $this->request->getFile('foto_user');
        if ($fileGambar->getError() == 4) {
            $namaFile = $namaFileLama;
        } else {
            $namaFile = $fileGambar->getRandomName();
            $fileGambar->move('assets/img/user', $namaFile);
            if ($namaFileLama != $this->defaultImage && $namaFileLama != "") {
                unlink('assets/img/user/' . $namaFileLama);
            }
        }

        $cek = $this->IdentitasUserModel->getIdentitasUser($id);
       dd($cek);
        if ($cek->id_user != null) {
            $this->IdentitasUserModel->save([
                'id_user' => $id,
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'hp_user' => $this->request->getVar('hp_user'),
                'alamat_asal' => $this->request->getVar('alamat_asal'),
                'alamat_domisili' => $this->request->getVar('alamat_domisili'),
                'foto_user' => $namaFile
            ]);
        } else {
            $this->IdentitasUserModel->insert([
                'id_user' => $id,
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'nama_user' => $this->request->getVar('nama_user'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'hp_user' => $this->request->getVar('hp_user'),
                'alamat_asal' => $this->request->getVar('alamat_asal'),
                'alamat_domisili' => $this->request->getVar('alamat_domisili'),
                'foto_user' => $namaFile
            ]);
        }
        session()->setFlashdata("msg", "Data berhasil diubah!");
        return redirect()->to('/user');
    }
}
