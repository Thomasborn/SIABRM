<?php

namespace App\Models;

use CodeIgniter\Model;

class IdentitasUserModel extends Model
{
    protected $table = "identitas_user";
    protected $primaryKey = "id_user";
    protected $returnType = "object";
    protected $allowedFields = ['id_user', 'nama_lengkap', 'tanggal_lahir', 'hp_user', 'alamat_asal', 'alamat_domisili', 'foto_user'];

    public function getIdentitasUser($id = false)
    {
        $query = $this->table('identitas_user')
            ->join('users', 'users.id = identitas_user.id_user', 'right');
        if ($id == false)
            return $query->get()->getResultArray();
        return $query->where(['users.id' => $id])->first();
    }

    public function getIden()
    {
        $query = $this->table('identitas_user')
            ->join('users a', 'id_user =a.id', 'right');
        // ->where('deleted_at is null');
        return $query;
    }
    public function pencarian($kunci)
    {
        return $this->table('users')->join('identitas_user', 'id = identitas_user.id_user', 'right')
            ->where('deleted_at', null)->like('nama_user', $kunci);
    }
}
