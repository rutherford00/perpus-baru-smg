<?php

namespace App\Controllers;

use App\Models\datasimpanpinjamModel;
use App\Models\bukuModel;
use App\Models\anggotaModel;
use \DateTime;

class Datasimpanpinjam extends BaseController
{
    protected $simpanpinjamModel;
    protected $helpers = ['form'];
    protected $bukuModel;
    protected $anggotaModel;

    public function __construct()
    {
        $this->simpanpinjamModel = new datasimpanpinjamModel();
        $this->bukuModel = new bukuModel();
        $this->anggotaModel = new anggotaModel();
    }

    public function index()
    {
        $keywork = $this->request->getVar('keywork');
        if ($keywork) {
            $simpanpinjam = $this->simpanpinjamModel->search($keywork);
        } else {
            $simpanpinjam = $this->simpanpinjamModel;
        }
        // $simpanpinjamModel = new SimpanpinjamModel();

        // return view('simpanpinjam/index', $data);
        $data = [
            'title' => 'Transaksi Buku',
            'simpanpinjam' => $this->simpanpinjamModel->getSimpanPinjam(),
            'buku' => $this->bukuModel->getBuku(),
            'anggota' => $this->anggotaModel->getAnggota()
        ];

        // menampilkan view
        return view('datasimpanpinjam/index', $data);
    }


    public static function calculateDenda($tglKembali)
    {
        $tglKembali = new DateTime($tglKembali);
        $tglSekarang = new DateTime();

        // Menghitung selisih hari antara tanggal kembali dengan tanggal sekarang
        $selisih = $tglSekarang->diff($tglKembali)->days;

        // Jika tanggal kembali lebih besar dari atau sama dengan tanggal sekarang,
        // maka dendanya adalah 0
        if ($tglKembali >= $tglSekarang) {
            return "Rp 0";
        }

        $dendaPerHari = 500;
        $dendaTotal = $dendaPerHari * abs($selisih);

        return "Rp" . number_format($dendaTotal, 0, ',', '.');
    }
}
