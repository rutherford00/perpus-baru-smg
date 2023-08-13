<?php

namespace App\Models;

use CodeIgniter\Model;

class anggotaModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'username', 'password'];

    public function getAdmin($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }
        return $this->where(['username' => $username])->first();
    }
    public function search($keyword)
    {
        //$builder = $this->table('anggota');
        //$builder->like('judul',$keyword);
        //return $builder;
        return $this->table('users')->like('username', $keyword);
    }
}
