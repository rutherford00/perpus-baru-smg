<?php

namespace App\Controllers;

use App\Models\dataanggotaModel;

class Dataanggota extends BaseController
{
    protected $dataanggotaModel;
    public function __construct()
    {
        $this->dataanggotaModel = new dataanggotaModel();
    }

    public function index()
    {
        $keywork = $this->request->getVar('keywork');
        if ($keywork) {
            $anggota = $this->dataanggotaModel->search($keywork);
        } else {
            $anggota = $this->dataanggotaModel;
        }
        //$dataanggota = $this->dataanggotaModel->findAll();
        $data = [
            'title' => 'Daftar Anggota',
            'anggota' => $this->dataanggotaModel->getAnggota()
        ];

        return view('dataanggota/index', $data);
    }
}
