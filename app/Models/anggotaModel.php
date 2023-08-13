<?php

namespace App\Models;

use CodeIgniter\Model;

class anggotaModel extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nomor', 'foto', 'nama', 'slug', 'kelas', 'gender', 'alamat', 'nomorhp'];

    public function getAnggota($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        //$builder = $this->table('anggota');
        //$builder->like('judul',$keyword);
        //return $builder;
        return $this->table('anggota')->like('nama', $keyword)->orLike('nomor', $keyword)->orLike('kelas', $keyword);
    }
}
