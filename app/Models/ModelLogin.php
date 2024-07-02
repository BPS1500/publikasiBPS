<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    public function LoginAdmin($username, $password)
    {
        return $this->db->table('tbl_admin')
            ->where([
                'username' => $username,
                'password' => $password,
            ])->get()->getRowArray();
    }

    public function add($data)
    {
        return $this->db->table('tbl_penyusun')->insert($data);
    }

    public function LoginPenyusun($username, $password)
    {
        return $this->db->table('tbl_penyusun')
            ->where([
                'username' => $username,
                'password' => $password,
            ])->get()->getRowArray();
    }
}
